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
    <link rel="stylesheet" href="css/user/contact.css" />
    <title>Bright</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include __DIR__ . '/../../layouts/user/header.php';
?>

<div class="container py-5">
    <div class="row g-4 align-items-center">
        <!-- Form liên hệ -->
        <div class="col-lg-5">
            <div class="contact-form text-white p-5 shadow-lg">
                <h2 class="fw-bold mb-2">Get In Touch</h2>
                <p class="text-white mb-4">Call or email us regarding question or issues</p>
                <form>
                    <div class="mb-4">
                        <input type="text" id="fullName" class="form-control form-control-lg bg-transparent text-white border-0 border-bottom rounded-0" placeholder="Full Name" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" id="email" class="form-control form-control-lg bg-transparent text-white border-0 border-bottom rounded-0" placeholder="Email" required>
                    </div>
                    <div class="mb-4">
                        <textarea id="message" class="form-control form-control-lg bg-transparent text-white border-0 border-bottom rounded-0" rows="3" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-light btn-lg w-100 fw-bold text-dark">SEND</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="map-container rounded-3 overflow-hidden shadow-lg">
                <iframe
                    src=""
                    class="map-container address_iframe"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../../layouts/user/footer.php';
?>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'ajax/info.ajax.php',
            method: 'GET',
            data: { action: 'get_address_iframe' },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('.address_iframe').attr('src', response.data.address_iframe);
                } else {
                    console.error('Error fetching address iframe:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    });
</script>

</body>
</html>
