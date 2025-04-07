import {showToast} from "./toast.js";

$(document).ready(function() {
    $("#btn-menu").click(function() {
        $("#admin-content").toggleClass("closed");
    });

    function load_users() {
        $.ajax({
            url: "ajax/user.ajax.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_users",
            },
            success: function(response) {
                if (response.data.length > 0) {
                    response.data.forEach((user, index) => {
                        let userHtml = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>
                                    ${user.image ? `<img src="${user.image}" />` : 'No Image'}
                                </td>
                                <td>${user.username}</td>
                                <td>${user.email}</td>
                                <td>${user.role.toUpperCase()}</td>
                                <td><button>View</button></td>
                            </tr>
                        `;
                        $('#users-list').append(userHtml);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error loading users:", error);
            }
        });
    }
    load_users();

    let filters = {
        sort: null,
        keyword: null,
        limit: null,
        offset: null,
        subjects: null,
    }

    function loadCourses() {
        $.ajax({
            url: "ajax/courses.ajax.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_courses",
                ...filters,
            },
            success: function (response) {
                if (response.data.length > 0) {
                    response.data.forEach((course) => {
                        let courseHtml = `
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="course-item h-100 d-flex flex-column">
                                    <img src="${course.image}" alt="" class="thumb" />
                                    <div class="info">
                                        <div class="head">
                                            <h3 class="title">${course.title}</h3>
                                        </div>
                                        <p class="desc">${course.description}</p>
                                        <div class="foot">
                                            <span class="price">$${course.price}</span>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="?page=course-create&course-id=${course.id}" class="button">
                                                    <i class='bx bxs-edit-alt'></i>
                                                </a>
                                                <div class="button button-delete" id="course-delete" data-course-id="${course.id}">
                                                    <i class='bx bx-trash'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        $('#courses-list').append(courseHtml);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error loading courses:", error);
            }
        });
    }
    loadCourses();

    $(document).on("click", ".button-delete", function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#0179FE",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            customClass: {
                popup: 'swal-wide'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const courseId = $(this).data('course-id');

                $.ajax({
                    url: 'ajax/courses.ajax.php',
                    method: "POST",
                    dataType: "json",
                    data: {
                        action: 'delete_course',
                        id: courseId,
                    },
                    success: async function(response) {
                        if (response.status === 'success') {
                            await Swal.fire({
                                title: "Deleted!",
                                text: "Your course has been deleted.",
                                icon: "success",
                                customClass: {
                                    popup: 'swal-wide'
                                }
                            });
                            window.location.reload();
                        } else {
                            showToast("error", response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting course:", error);
                    }
                });
            }
        });
    });
});