<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&family=Sen:wght@400..800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/user/style.css" />
    <link rel="stylesheet" href="css/user/layout.css" />
    <title>Bright</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include __DIR__ . '/../../layouts/user/header.php';
?>
<main>
    <div class="hero">
        <div class="container">
            <div class="body row align-items-center">
                <div class="col-6 col-xl-4 media-block d-none d-lg-block">
                    <img
                        src="assets/img/hero.jpg"
                        alt="Learn without limits and spread knowledge."
                        class="img"
                    />
                </div>

                <div class="col-lg-6 col-xl-8 col-12 content-block px-5">
                    <h1 class="heading">
                        Learn without limits and spread knowledge.
                    </h1>
                    <p class="desc">
                        Whether you're looking to advance in your career, switch industries, or simply expand your knowledge, now is the perfect time to invest in yourself. Build valuable skills, gain recognized credentials, and stay ahead in a competitive job market—all while experiencing that empowering “this is my year” feeling.
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <a href="#!" class="button button-cta">See Courses</a>
                        <a href="#!" class="button button-sign-up">Sign Up</a>
                    </div>
                    <p class="desc desc1">Recent engagement</p>
                    <p class="desc desc2">
                        <strong>800</strong>Students<strong>50+</strong>Courses
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="popular">
        <div class="container">
            <div class="popular-top">
                <div class="info">
                    <h2 class="heading-lv2">Our popular courses</h2>
                    <p class="desc">
                        Build new skills with new trendy courses and shine for the next
                        future career.
                    </p>
                </div>
            </div>

            <div class="course-list row g-3 align-items-stretch">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="course-item">
                        <img src="assets/img/course-1.jpg" alt="" class="thumb" />
                        <div class="info">
                            <div class="head">
                                <h3 class="title">Basic web design</h3>
                                <div class="rating">
                                    <img src="assets/icon/Star%206.svg" alt="" class="star" />
                                    <span class="value">4.5</span>
                                </div>
                            </div>
                            <p class="desc">
                                Get the best course, gain knowledge and shine for your future
                                career.
                            </p>
                            <div class="foot">
                                <span class="price">$120.75</span>
                                <button class="button">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="course-item">
                        <img src="assets/img/course-2.jpg" alt="" class="thumb" />
                        <div class="info">
                            <div class="head">
                                <h3 class="title">UI/UX design</h3>
                                <div class="rating">
                                    <img src="assets/icon/Star%206.svg" alt="" class="star" />
                                    <span class="value">4.5</span>
                                </div>
                            </div>
                            <p class="desc">
                                Get the best course, gain knowledge and shine for your future
                                career.
                            </p>
                            <div class="foot">
                                <span class="price">$120.75</span>
                                <button class="button">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="course-item">
                        <img src="assets/img/course-3.jpg" alt="" class="thumb" />
                        <div class="info">
                            <div class="head">
                                <h3 class="title">Web App design</h3>
                                <div class="rating">
                                    <img src="assets/icon/Star%206.svg" alt="" class="star" />
                                    <span class="value">4.5</span>
                                </div>
                            </div>
                            <p class="desc">
                                Get the best course, gain knowledge and shine for your future
                                career.
                            </p>
                            <div class="foot">
                                <span class="price">$120.75</span>
                                <button class="button">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feedback">
        <div class="container">
            <div class="feedback-list">
                <div class="d-flex flex-column flex-lg-row gap-4">
                    <div class="info">
                        <img
                            src="assets/icon/Ellipse%202649.svg"
                            alt=""
                            class="avatar"
                        />
                        <p class="name">Peter Moor</p>
                        <p class="desc">Student of Web Design</p>
                    </div>
                    <div class="quotes">
                        <img
                            src="assets/icon/Vector.svg"
                            alt=""
                            class="open-quotes"
                        />
                        <blockquote>
                            Not only does my resume look impressive—filled with the names
                            and logos of world-class institutions—but these certificates
                            also bring me closer to my career goals by validating the
                            skills I've learned."
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature2">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row gap-5">
                <div class="content">
                    <h2 class="heading-lv2">
                        Take the next step toward your personal and professional goals
                        with Lesson.
                    </h2>
                    <p class="desc">
                        Take the next step toward. Join now to receive personalized and
                        more recommendations from the full Coursera catalog.
                    </p>
                    <a href="#!" class="button">Join Now</a>
                </div>
                <img src="assets/img/Learn3.jpg" alt="" class="img" />
            </div>
        </div>
    </div>
<!--    <div class="blog">-->
<!--        <div class="container">-->
<!--            <div class="body">-->
<!--                <h2 class="heading-lv2">Our blog</h2>-->
<!--                <p class="desc">-->
<!--                    Read our regular travel blog and know the latest update of tour-->
<!--                    and travel-->
<!--                </p>-->
<!--                <div class="base-list">-->
<!--                    <div class="base">-->
<!--                        <img src="./assets/img/blog1.jpg" alt="" />-->
<!--                        <div class="text">-->
<!--                            <div class="head">-->
<!--                                <div class="icon"></div>-->
<!--                                <p class="desc1">21 November 2021</p>-->
<!--                            </div>-->
<!--                            <hr />-->
<!--                            <h3 class="label">-->
<!--                                How to become a pro web designer in 2022 and get remote job?-->
<!--                            </h3>-->
<!--                            <a href="#!" class="button">Read More</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="base">-->
<!--                        <img src="./assets/img/blog2.jpg" alt="" />-->
<!--                        <div class="text">-->
<!--                            <div class="head">-->
<!--                                <div class="icon"></div>-->
<!--                                <p class="desc1">21 November 2021</p>-->
<!--                            </div>-->
<!--                            <hr />-->
<!--                            <h3 class="label">-->
<!--                                How to become a pro web designer in 2022 and get remote job?-->
<!--                            </h3>-->
<!--                            <a href="#!" class="button">Read More</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="base">-->
<!--                        <img src="./assets/img/blog3.jpg" alt="" />-->
<!--                        <div class="text">-->
<!--                            <div class="head">-->
<!--                                <div class="icon"></div>-->
<!--                                <p class="desc1">21 November 2021</p>-->
<!--                            </div>-->
<!--                            <hr />-->
<!--                            <h3 class="label">-->
<!--                                How to become a pro web designer in 2022 and get remote job?-->
<!--                            </h3>-->
<!--                            <a href="#!" class="button">Read More</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</main>
<?php
include __DIR__ . '/../../layouts/user/footer.php';
?>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
