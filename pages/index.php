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
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        require_once '../includes/header.php';
        require_once '../includes/navigation.php';
    ?>
    <!-- Hero section -->
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 class="mb-3 font-weight-bold">Unleash Your Fashionista Side</h2>
                    <p class="mb-5">Welcome to our fashion store, where style meets luxury. Shop the latest trends and elevate your wardrobe with our curated collection.</p>
                    <a href="shop.html" class="shop-now-button">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Represent section -->
    <section id="represent" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 offset-lg-4">
                    <div class="filter d-flex flex-md-row justify-content-md-between align-items-md-center flex-column-reverse">
                        <div class="filter-text">
                            <h3 class="mb-3">Trending Categories</h3>
                            <a href="shop.html" class="shop-now-link">Shop Now</a>
                        </div>
                        <div class="filter-image">
                            <img src="../images/additional-images/categories.jpg" alt="Categories" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg-n3 mt-3">
                <div class="col-lg-8 col-12">
                    <div class="filter d-flex flex-md-row justify-content-md-between align-items-md-center flex-column">
                        <div class="filter-image">
                            <img src="../images/additional-images/brands.jpg" alt="Categories" />
                        </div>
                        <div class="filter-text ml-md-5">
                            <h3 class="mb-3">Premium Collections</h3>
                            <a href="shop.html" class="shop-now-link">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg-n3 mt-3">
                <div class="col-lg-8 col-12 offset-lg-4">
                    <div class="filter d-flex flex-md-row justify-content-md-between align-items-md-center flex-column-reverse">
                        <div class="filter-text">
                            <h3 class="mb-3">His & Hers Fashion</h3>
                            <a href="shop.html" class="shop-now-link">Shop Now</a>
                        </div>
                        <div class="filter-image">
                            <img src="../images/additional-images/couple.jpg" alt="Categories" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Products section -->
    <section id="products" class="py-md-5 py-2">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-center">
                    <h2>On Discount</h2>
                </div>
            </div>
            <div class="row">
                <!-- Product -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="product m-1 p-md-3 p-1">
                        <div class="product-image">
                            <div class="overlay-product-image">
                                <div class="product-icons">
                                    <a href="cart.html" data-toggle="tooltip" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="single-product.html" data-toggle="tooltip" title="View Product"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-text">
                            <h3 class="my-2">Product Name</h3>
                            <p class="stars">
                                <i class="fa-solid fa-star star-filled"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <p class="price-text-old">$33.69</p>
                            <p class="price-text-new">$22.99</p>
                        </div>
                    </div>
                </div>
                <!-- Product -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="product m-1 p-md-3 p-1">
                        <div class="product-image">
                            <div class="overlay-product-image">
                                <div class="product-icons">
                                    <a href="cart.html" data-toggle="tooltip" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="single-product.html" data-toggle="tooltip" title="View Product"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-text">
                            <h3 class="my-2">Product Name</h3>
                            <p class="stars">
                                <i class="fa-solid fa-star star-filled"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <p class="price-text-old">$33.69</p>
                            <p class="price-text-new">$22.99</p>
                        </div>
                    </div>
                </div>
                <!-- Product -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="product m-1 p-md-3 p-1">
                        <div class="product-image">
                            <div class="overlay-product-image">
                                <div class="product-icons">
                                    <a href="cart.html" data-toggle="tooltip" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="single-product.html" data-toggle="tooltip" title="View Product"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-text">
                            <h3 class="my-2">Product Name</h3>
                            <p class="stars">
                                <i class="fa-solid fa-star star-filled"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <p class="price-text-old">$33.69</p>
                            <p class="price-text-new">$22.99</p>
                        </div>
                    </div>
                </div>
                <!-- Product -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="product m-1 p-md-3 p-1">
                        <div class="product-image">
                            <div class="overlay-product-image">
                                <div class="product-icons">
                                    <a href="cart.html" data-toggle="tooltip" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="single-product.html" data-toggle="tooltip" title="View Product"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-text">
                            <h3 class="my-2">Product Name</h3>
                            <p class="stars">
                                <i class="fa-solid fa-star star-filled"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <p class="price-text-old">$33.69</p>
                            <p class="price-text-new">$22.99</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About us section -->
    <section id="about-us">
        <div class="overlay d-flex align-items-center py-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-12 text-center">
                        <p>We are a fashion store dedicated to providing the latest trends with a touch of luxury. Our mission is to make fashion accessible to everyone while maintaining quality and style.</p>
                        <a href="about-us.html" class="shop-now-button">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        require_once '../includes/services.php';
        require_once '../includes/footer.php';
    ?>

    <!-- Help -->
    

    <!-- Bootstrap include -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>