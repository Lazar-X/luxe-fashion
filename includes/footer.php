<?php
    $currentYear = date("Y");
    echo '<footer class="pt-5">
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-md-4 col-12 mb-md-0 mb-3">
                <h3 class="mb-4">Luxe Fashion</h3>
                <p class="text-md-left text-center">Shop with confidence - easy returns and fast shipping.</p>
                <ul class="mt-4 d-flex justify-content-md-start justify-content-center text-center list-social">
                    <li class="mr-2"><a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a></li>
                    <li class="mr-2"><a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li class="mr-2"><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <h3 class="mb-4">Information</h3>
                <ul>
                    <li class="mb-2"><a href="index.php">Home</a></li>
                    <li class="mb-2"><a href="shop.php">Shop</a></li>
                    <li class="mb-2"><a href="about-us.php">About us</a></li>
                    <li class="mb-2"><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <h3 class="mb-4">Additional Links</h3>
                <ul>
                    <li class="mb-2"><a href="../sitemap.xml" target="_blank">Sitemap</a></li>
                    <li class="mb-2"><a href="../docs.pdf" target="_blank">Documentation</a></li>
                    <li class="mb-2"><a href="author.php" target="_blank">Author</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 pt-3 border-top">
            <div class="col-12">
                <p class="text-center copyright">© Copyright '.$currentYear.'. Web design and development made by 
                    <a href="https://github.com/Lazar-X" target="_blank" class="shop-now-link">Lazar Jankovic</a>.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap include -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>';
?>