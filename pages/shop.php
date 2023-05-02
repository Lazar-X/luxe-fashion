<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    require_once '../config/connection.php';
    require_once 'functions.php';
?>
    <!-- Shop section -->
    <section id="shop" class="my-5">
        <div class="container">
            <!-- Shop heading -->
            <div class="row mb-3 border-bottom">
                <div class="col-12">
                    <h2>Shop With Us</h2>
                    <p>Browse from <span id="product-count">25</span> latest products</p>
                </div>
            </div>
            <div class="row">
                <!-- Shop filters -->
                <div class="col-lg-3 col-12">
                    <!-- Filters -->
                    <div class="card card-body">
                        <!-- Filter group -->
                        <!-- Categories -->
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Categories</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseCategories">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-categories-1" name="categories" value="1" autocomplete="off">
                                        <label class="custom-control-label" for="check-categories-1">
                                            Jeans
                                            (<span class="numberProductsCategory">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-categories-2" name="categories" value="2" autocomplete="off">
                                        <label class="custom-control-label" for="check-categories-2">
                                            Pants
                                            (<span class="numberProductsCategory">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-categories-3" name="categories" value="3" autocomplete="off">
                                        <label class="custom-control-label" for="check-categories-3">
                                            Shirts
                                            (<span class="numberProductsCategory">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-categories-4" name="categories" value="4" autocomplete="off">
                                        <label class="custom-control-label" for="check-categories-4">
                                            Hoodies
                                            (<span class="numberProductsCategory">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-categories-5" name="categories" value="5" autocomplete="off">
                                        <label class="custom-control-label" for="check-categories-5">
                                            Shorts
                                            (<span class="numberProductsCategory">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-categories-6" name="categories" value="6" autocomplete="off">
                                        <label class="custom-control-label" for="check-categories-6">
                                            Dresses
                                            (<span class="numberProductsCategory">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-categories-7" name="categories" value="7" autocomplete="off">
                                        <label class="custom-control-label" for="check-categories-7">
                                            Jackets
                                            (<span class="numberProductsCategory">20</span>)
                                        </label>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Filter group -->
                        <!-- Brands -->
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Brands</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseBrands" aria-expanded="false" aria-controls="collapseBrands">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseBrands">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-brand-1" name="brands" value="1" autocomplete="off">
                                        <label class="custom-control-label" for="check-brand-1">
                                            Brand-1
                                            (<span class="numberProductsBrand">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-brand-2" name="brands" value="2" autocomplete="off">
                                        <label class="custom-control-label" for="check-brand-2">
                                            Brand-2
                                            (<span class="numberProductsBrand">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-brand-3" name="brands" value="3" autocomplete="off">
                                        <label class="custom-control-label" for="check-brand-3">
                                            Brand-3
                                            (<span class="numberProductsBrand">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-brand-4" name="brands" value="4" autocomplete="off">
                                        <label class="custom-control-label" for="check-brand-4">
                                            Brand-4
                                            (<span class="numberProductsBrand">20</span>)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input type" id="check-brand-5" name="brands" value="5" autocomplete="off">
                                        <label class="custom-control-label" for="check-brand-5">
                                            Brand-5
                                            (<span class="numberProductsBrand">20</span>)
                                        </label>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Filter group -->
                        <!-- Rating -->
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Rating</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseRating" aria-expanded="false" aria-controls="collapseRating">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseRating">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-1" value="1">
                                        <label class="form-check-label" for="rating-1">None (<span class="numberProductsRating">20</span>)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-1" value="1">
                                        <label class="form-check-label" for="rating-1">
                                            <i class="fa-solid fa-star star-filled"></i> 
                                            (<span class="numberProductsRating">20</span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-2" value="2">
                                        <label class="form-check-label" for="rating-2">
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                             (<span class="numberProductsRating">20</span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-3" value="3">
                                        <label class="form-check-label" for="rating-3">
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                             (<span class="numberProductsRating">20</span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-4" value="4">
                                        <label class="form-check-label" for="rating-4">
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                             (<span class="numberProductsRating">20</span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-5" value="5">
                                        <label class="form-check-label" for="rating-5">
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                            <i class="fa-solid fa-star star-filled"></i>
                                             (<span class="numberProductsRating">20</span>)
                                        </label>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Filter group -->
                        <!-- Price -->
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Price</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapsePrice" aria-expanded="false" aria-controls="collapsePrice">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapsePrice">
                                    <div class="form-group d-flex justify-content-center">
                                        <input type="range" id="price" class="form-range" value="40" min="4" max="40">
                                        <output id="output" for="price">40$</output>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Filter group -->
                        <!-- Sizes -->
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Sizes</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseSizes" aria-expanded="false" aria-controls="collapseSizes">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseSizes">
                                    <div class="d-flex flex-wrap" id="div-sizes">
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input type" id="check-sizes-1" name="sizes" value="1" autocomplete="off">
                                            <label class="custom-control-label size-label" for="check-sizes-1">S</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input type" id="check-sizes-2" name="sizes" value="2" autocomplete="off">
                                            <label class="custom-control-label size-label" for="check-sizes-2">M</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input type" id="check-sizes-3" name="sizes" value="3" autocomplete="off">
                                            <label class="custom-control-label size-label" for="check-sizes-3">L</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input type" id="check-sizes-4" name="sizes" value="4" autocomplete="off">
                                            <label class="custom-control-label size-label" for="check-sizes-4">XL</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input type" id="check-sizes-5" name="sizes" value="5" autocomplete="off">
                                            <label class="custom-control-label size-label" for="check-sizes-5">XXL</label>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Filter group -->
                        <!-- Gender -->
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Gender</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseGender" aria-expanded="false" aria-controls="collapseGender">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseGender">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-1" value="1">
                                        <label class="form-check-label" for="gender-1">
                                            Male
                                            (<span class="numberProductsGender">20</span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-2" value="2">
                                        <label class="form-check-label" for="gender-2">
                                            Female
                                            (<span class="numberProductsGender">20</span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-3" value="3">
                                        <label class="form-check-label" for="gender-3">
                                            Unisex
                                            (<span class="numberProductsGender">20</span>)
                                        </label>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Clear filters -->
                        <button class="btn button-clear" id="clear">Clear Filters</button>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <!-- Shop search and sort -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <!-- search -->
                            <div class="form-group">
                                <label for="search" class="font-weight-bold">Search</label>
                                <input type="text" class="form-control" id="search" aria-describedby="search" placeholder="Enter keywords">
                                <small id="searchHelp" class="form-text text-muted">Are you looking for a specific item?</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <!-- sort -->
                            <div class="form-group">
                                <label for="sort" class="font-weight-bold">Sort by</label>
                                <select class="form-control" id="sort">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <small id="sortHelp" class="form-text text-muted">Sort by your preferences, shop with ease.</small>
                            </div>
                        </div>
                    </div>
                    <!-- Shop products -->
                    <div class="row">
                        <div class="col-12">
                            <!-- products -->
                            
                            <div class="row">
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                    <!-- Modal Add To Cart -->
                                    <div class="product-add-to-cart">
                                        <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                                        <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Product added to cart successfully!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <ul class="d-flex pagination-list">
                                <li><a href="" class="p-3 pagination-active-link mr-1">1</a></li>
                                <li><a href="" class="p-3 mr-1">2</a></li>
                                <li><a href="" class="p-3 mr-1">3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php
    require_once '../includes/footer.php';
?>