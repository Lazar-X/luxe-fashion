<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    $products = productsForIndex();

    echo '<section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 class="mb-3 font-weight-bold">Unleash Your Fashionista Side</h2>
                    <p class="mb-5">Welcome to our fashion store, where style meets luxury. Shop the latest trends and elevate your wardrobe with our curated collection.</p>
                    <a href="shop.php" class="shop-now-button">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
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
                            <a href="shop.php" class="shop-now-link">Shop Now</a>
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
                            <a href="shop.php" class="shop-now-link">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg-n3 mt-3">
                <div class="col-lg-8 col-12 offset-lg-4">
                    <div class="filter d-flex flex-md-row justify-content-md-between align-items-md-center flex-column-reverse">
                        <div class="filter-text">
                            <h3 class="mb-3">His & Hers Fashion</h3>
                            <a href="shop.php" class="shop-now-link">Shop Now</a>
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
            <div class="row">';
                    foreach ($products as $product) {
                        echo '<div class="col-lg-3 col-sm-6 col-12">
                        <div class="product m-1 p-md-3 p-1">
                            <div style="background-image:url(../images/products/'.$product -> product_image.'.png);" class="product-image">
                                <div class="overlay-product-image">
                                    <div class="product-icons">
                                        <a href="single-product.php?product_id='.$product -> product_id.'" data-toggle="tooltip" title="View Product"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-text">
                                <h3 class="my-2">'.$product -> product_name.'</h3>
                                <p class="stars">';
                                            $avgRatingProduct = averageRatingProduct($product->product_id);
                                            $avgValue = round($avgRatingProduct->average_rating);
                                            if($avgValue != 0) {
                                                for($i = 0; $i < $avgValue; $i++) {
                                                    echo '<i class="fa-solid fa-star star-filled"></i> ';
                                                }
                                            }
                                            else {
                                                for($i = 0; $i < 5; $i++) {
                                                    echo '<i class="fa-solid fa-star"></i> ';
                                                }
                                            }
                                            echo '
                                            </p>
                                            ';
                                            if($product -> price_old != null) {
                                                echo '<p class="price-text-old mr-2">$'.$product -> price_old.'</p>';
                                            }
                                            else {
                                                echo '<p class="price-text-old"></p>';
                                            }
                                            echo '<p class="price-text-new">$'.$product -> price_new.'</p>
                            </div>
                        </div>
                    </div>';
                    }
            echo '</div>
        </div>
    </section>
    <!-- About us section -->
    <section id="about-us">
        <div class="overlay d-flex align-items-center py-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-12 text-center">
                        <p>We are a fashion store dedicated to providing the latest trends with a touch of luxury. Our mission is to make fashion accessible to everyone while maintaining quality and style.</p>
                        <a href="about-us.php" class="shop-now-button">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>';

    require_once '../includes/services.php';
    require_once '../includes/footer.php';
?>