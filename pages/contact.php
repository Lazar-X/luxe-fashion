<?php
    session_start();
    require_once '../includes/head.php';
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

<?php
    require_once '../includes/footer.php';
?>