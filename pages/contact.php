<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Fashion | Homepage</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap include -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Other includes -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        require_once '../includes/header.php';
        require_once '../includes/navigation.php';
    ?>
    <!-- Contact -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-5">Contact Us</h2>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-md-6 col-12">
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="contactName">Name</label>
                            <input type="text" class="form-control" id="contactName" aria-describedby="nameHelp" placeholder="Enter name">
                            <small id="contactNameHelp" class="form-text">Example: Lazar</small>
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email address</label>
                            <input type="text" class="form-control" id="contactEmail" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="contactEmailHelp" class="form-text">Example: luxefashion@gmail.com</small>
                        </div>
                        <div class="form-group">
                            <label for="contactMessage">Message</label>
                            <textarea class="form-control" id="contactMessage" rows="5" placeholder="Enter message"></textarea>
                            <small id="contactMessageHelp" class="form-text">Example: This is message</small>
                        </div>
                        <button type="button" id="contactButton" class="btn button w-100">Send Message</button>
                        <div id="response">
                            <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                        </div>         
                    </form>
                </div>
                <div class="col-md-5 col-12 mt-md-0 mt-5">
                    <div class="address-holder mb-3">
                        <h3><i class="fa-solid fa-phone"></i> Phone</h3>
                        <p>+381 64-098-4199</p>
                    </div>
                    <div class="address-holder mb-3">
                        <h3><i class="fa-solid fa-envelope"></i> Email</h3>
                        <p>luxefashion@gmail.com</p>
                    </div>
                    <div class="address-holder">
                        <h3><i class="fa-solid fa-location-dot"></i> Location</h3>
                        <p>Belgrade, Serbia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map -->
    <section id="map" class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d181139.85102770833!2d20.422596999999996!3d44.81524535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2z0JHQtdC-0LPRgNCw0LQ!5e0!3m2!1ssr!2srs!4v1682421381416!5m2!1ssr!2srs" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php
        require_once '../includes/footer.php';
    ?>
    
    <!-- Help -->
    

    <!-- Bootstrap include -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>