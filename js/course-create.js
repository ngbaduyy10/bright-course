import {showToast} from "./toast.js";

$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const courseId = urlParams.get('course-id');

    function get_course_detail() {
        $.ajax({
            url: 'ajax/courses.ajax.php',
            method: 'GET',
            dataType: "json",
            data: {
                action: 'get_course_detail',
                id: courseId
            },
            success: function(response) {
                if (response.status === 'success') {
                    const course = response.data;
                    console.log(course.subject_id);
                    $('#courseTitle').val(course.title);
                    $('#courseDescription').val(course.description);
                    $('#coursePrice').val(course.price);
                    setTimeout(() => {
                        $('#courseSubject').val(course.subject_id);
                    }, 100);
                    $('#preview-image').attr('src', course.image);
                }
            },
            error: function() {
                console.log('error');
            }
        });
    }
    if (courseId) {
        get_course_detail();
    }

    $.ajax({
        url: "ajax/courses.ajax.php",
        method: "GET",
        dataType: "json",
        data: {
            action: "get_subjects",
        },
        success: function(response) {
            if (response.data.length > 0) {
                response.data.forEach((subject) => {
                    $('#courseSubject').append(`
                          <option value="${subject.id}">${subject.name}</option>
                     `);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("Error loading subjects:", error);
        }
    });

    $('#courseImage').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    $('#courseForm').on('submit', async function(event) {
        event.preventDefault();
        let image = $('#preview-image').attr('src');
        const file = $('#courseImage')[0].files[0];
        if (file) {
            image = await uploadToCloudinary(file);
        }

        const data = {
            action: courseId ? 'update_course' : 'create_course',
            id: courseId,
            title: $('#courseTitle').val(),
            description: $('#courseDescription').val(),
            price: $('#coursePrice').val(),
            subject_id: $('#courseSubject').val(),
            image: image,
        };

        $.ajax({
            url: 'ajax/courses.ajax.php',
            method: "POST",
            dataType: "json",
            data: data,
            success: function(response) {
                if (response.status === 'success') {
                    window.location.href = "index.php?page=admin-courses";
                } else {
                    showToast("error", response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error registering user:", error);
            }
        });
    });
});

const uploadToCloudinary = async (file) => {
    let imageUrl = "";
    let formData = new FormData();
    formData.append('file', file);
    formData.append('upload_preset', 'cv_avatar');

    await $.ajax({
        url: `https://api.cloudinary.com/v1_1/doxm7rnpk/upload`,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            imageUrl = response.secure_url;
        },
        error: function(error) {
            console.error("Error uploading image:", error);
        }
    });

    return imageUrl;
}