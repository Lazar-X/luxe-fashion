<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    require_once '../config/connection.php';
    require_once '../logic/functions.php';

    $products = selectAllProducts();
    $categories = tableSelectAll('categories');
    $brands = tableSelectAll('brands');
    $prices = tableSelectAll('prices');
    $colors = tableSelectAll('colors');
    $genders = tableSelectAll('genders');
    $minPrice = selectMinimumPrice() -> min_price;
    $maxPrice = selectMaximumPrice() -> max_price;

    echo '<div class="py-5">';
    var_dump($products);
    echo '</div>';

    echo '
    <!-- Shop section -->
    <section id="shop" class="my-5">
        <div class="container">
            <!-- Shop heading -->
            <div class="row mb-3 border-bottom">
                <div class="col-12">
                    <h2>Shop With Us</h2>
                    <p>Browse from <span id="product-count">';
                    echo count($products);
                    echo '</span> latest products</p>
                </div>
            </div>
            <div class="row">
                <!-- Shop filters -->
                <div class="col-lg-3 col-12">
                    <!-- Filters -->
                    <div class="card card-body">
                        <!-- Filter group -->
                        <!-- Categories -->';
                            $categories = tableSelectAll('categories');
                            echo '<div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Categories</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse change-class" id="collapseCategories">';
                                foreach ($categories as $category) {
                                    echo '<div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input type" id="check-categories-'.$category -> category_id.'" name="categories" value="'.$category -> category_id.'" autocomplete="off">
                                    <label class="custom-control-label" for="check-categories-'.$category -> category_id.'">
                                        '.ucfirst($category -> category_name).'
                                        (<span class="numberProductsCategory">';
                                        echo countProducts('category_id', $category -> category_id);
                                        echo '</span>)
                                    </label>
                                </div>';
                                }
                                    echo '
                                </div>
                            </article>
                        </div>
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Brands</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseBrands" aria-expanded="false" aria-controls="collapseBrands">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse change-class" id="collapseBrands">';
                                foreach($brands as $brand) {
                                    echo '<div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input type" id="check-brand-'.$brand -> brand_id.'" name="brands" value="'.$brand -> brand_id.'" autocomplete="off">
                                    <label class="custom-control-label" for="check-brand-'.$brand -> brand_id.'">
                                        '.$brand -> brand_name.'
                                        (<span class="numberProductsBrand">';
                                        echo countProducts('brand_id', $brand -> brand_id);
                                        echo '</span>)
                                    </label>
                                </div>';
                                }
                                echo '</div>
                                </article>
                            </div>';
                            echo '<div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Discount</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseDiscount" aria-expanded="false" aria-controls="collapseDiscount">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseDiscount">
                                    <div class="form-group d-flex">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="discount" id="discount" value="1">
                                            <label class="form-check-label" for="discount">
                                                Discount
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Colors</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseColors" aria-expanded="false" aria-controls="collapseColors">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="product-colors collapse" id="collapseColors">
                                <div class="d-flex flex-wrap">';
                                foreach ($colors as $color) {
                                    echo '<div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input custom-control-input" type="checkbox" name="colors" id="color-check-'.$color -> color_id.'" value="'.$color -> color_id.'" autocomplete="off">
                                    <label style="background-color: '.$color -> color_value.'" class="form-check-label size-label" for="color-check-'.$color -> color_id.'"></label>
                                    </div>
                                </div>';
                                }
                                    echo '</div>
                                </div>
                            </article>
                        </div>
                            <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Gender</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseGender" aria-expanded="false" aria-controls="collapseGender">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseGender">';
                                foreach ($genders as $gender) {
                                    echo '<div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender-'.$gender -> gender_id.'" value="'.$gender -> gender_id.'">
                                    <label class="form-check-label" for="gender-'.$gender -> gender_id.'">
                                        '.ucfirst($gender -> gender_name).'
                                        (<span class="numberProductsGender">';
                                        echo countProducts('gender_id', $gender -> gender_id);
                                        echo '</span>)
                                    </label>
                                </div>';
                                }
                                echo '</div>
                                </article>
                            </div>
                            <button class="btn button-clear" id="clear">Clear Filters</button>
                            </div>
                </div>
                <div class="col-lg-9 col-12">
                    <!-- Shop search and sort -->
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <!-- search -->
                            <div class="form-group" id="searchDiv">
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
                                    <option value="0">Default</option>
                                    <option value="1">Asc</option>
                                    <option value="2">Desc</option>
                                    <option value="3">Price up</option>
                                    <option value="4">Price down</option>
                                </select>
                                <small id="sortHelp" class="form-text text-muted">Sort by your preferences, shop with ease.</small>
                            </div>
                        </div>
                    </div>
                    <!-- Shop products -->
                    <div class="row">
                        <div class="col-12">
                            <!-- products -->
                            <div class="row" id="productsResult">';
                            foreach ($products as $product) {
                                echo '<!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div style="background-image:url(../images/products/'.$product -> product_image.'.png);" class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
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
                        </div>';
                        ?>
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