$(document).ready(function () {
    let filters = {
        sort: null,
        keyword: null,
        limit: 4,
        offset: 0,
        subjects: null
    }

    function loadCourses(append) {
        $.ajax({
            url: "ajax/courses.ajax.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_courses",
                ...filters,
            },
            success: function (response) {
                if (!append) {
                    $('#courses-list').empty();
                }

                if (response.data.length > 0) {
                    response.data.forEach((course) => {
                        let courseHtml = `
                            <a href="?page=detail&id=${course.id}" class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="course-item h-100 d-flex flex-column">
                                    <img src="${course.image}" alt="" class="thumb" />
                                    <div class="info">
                                        <h3 class="title">${course.title}</h3>
                                        <p class="desc">${course.description}</p>
                                        <div class="foot">
                                            <span class="price">$${course.price}</span>
                                            <div class="rating">
                                                <img src="assets/icon/Star 6.svg" alt="" class="star" />
                                                <span class="value">${course.rating}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `;

                        $('#courses-list').append(courseHtml);
                    });
                } else {
                    $(window).off('scroll');
                }
            },
            error: function (xhr, status, error) {
                console.error("Error loading courses:", error);
            }
        });
    }
    loadCourses(false);

    $(".courses-sort").click(function (e) {
        e.preventDefault();

        filters.sort = $(this).data("sort");
        filters.offset = 0;
        scrollEvent();
        loadCourses(false);

        $(".courses-sort").removeClass("active");
        $(this).addClass("active");
    });

    $("#search-box").on("keyup", function () {
        filters.keyword = $(this).val();
        filters.offset = 0;
        scrollEvent();
        loadCourses(false);
    });

    const scrollEvent = () => {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 350) {
                filters.offset += filters.limit;
                loadCourses(true);
            }
        });
    }
    scrollEvent();

    function loadSubjects() {
        $.ajax({
            url: "ajax/courses.ajax.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_subjects",
            },
            success: function (response) {
                response.data.forEach((subject) => {
                    let subjectHtml = `
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="${subject.id}" id="${subject.name}">
                            <label class="form-check-label" for="${subject.name}">
                                ${subject.name}
                            </label>
                        </div>
                    `;

                    $('#subjects-list').append(subjectHtml);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error loading subjects:", error);
            }
        });
    }
    loadSubjects();

    // Filter subjects
    $('#subjects-list').on('change', '.form-check-input', function() {
        let selectedSubjects = [];
        $('#subjects-list .form-check-input:checked').each(function() {
            selectedSubjects.push($(this).val());
        });

        if (selectedSubjects.length > 0) {
            filters.subjects = selectedSubjects.join(',');
        } else {
            filters.subjects = null;
        }

        filters.offset = 0;
        scrollEvent();
        loadCourses(false);
    });
});