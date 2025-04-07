$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    $.ajax({
        url: '/bright-course/ajax/courses.ajax.php',
        method: 'GET',
        dataType: "json",
        data: {
            action: 'get_course_detail',
            id: id
        },
        success: function(response) {
            console.log(response);
            if (response.status === 'success') {
                const course = response.data;
                let courseHtml = `
                    <div class="col-5 d-flex flex-column p-0 left">
                        <img src="${course.image}" alt="" class="w-100 image" />
                        <span class="price px-4 py-1">$${course.price}</span>
                        <div class="rating p-4">
                            <img src="assets/icon/Star 6.svg" alt="" class="star" />
                            <img src="assets/icon/Star 6.svg" alt="" class="star" />
                            <img src="assets/icon/Star 6.svg" alt="" class="star" />
                            <img src="assets/icon/Star 6.svg" alt="" class="star" />
                            <img src="assets/icon/Star 6.svg" alt="" class="star" />
                            <span class="value">${course.rating}</span>
                        </div>
                    </div>
        
                    <div class="col-7 d-flex flex-column p-0 right">
                        <h1 class="title px-4 my-4">${course.title}</h1>
                        <p class="desc px-4">${course.description}</p>
                        <a class="button mx-4 my-3">Book Now</a>
                    </div>
                `;
                $('#course-detail').append(courseHtml);
            }
        },
        error: function() {
            console.log('error');
        }
    });
});