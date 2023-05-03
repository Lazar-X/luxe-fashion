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
    $ratingValues = tableSelectAll('rating_values');
    $prices = tableSelectAll('prices');
    $sizes = tableSelectAll('sizes');
    $genders = tableSelectAll('genders');
    $minPrice = selectMinimumPrice() -> min_price;
    $maxPrice = selectMaximumPrice() -> max_price;
?>

<?php
    echo '<div class="py-5">
        <p>Ovde su var dumpovi</p>';
    var_dump($products);
    echo '</div>';
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
                        <?php
                            $categories = tableSelectAll('categories');
                            echo '<div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Categories</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseCategories">';
                                foreach ($categories as $category) {
                                    echo '<div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input type" id="check-categories-'.$category -> category_id.'" name="categories" value="'.$category -> category_id.'" autocomplete="off">
                                    <label class="custom-control-label" for="check-categories-'.$category -> category_id.'">
                                        '.ucfirst($category -> category_name).'
                                        (<span class="numberProductsCategory">20</span>)
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
                                <div class="collapse" id="collapseBrands">';
                                foreach($brands as $brand) {
                                    echo '<div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input type" id="check-brand-'.$brand -> brand_id.'" name="brands" value="'.$brand -> brand_id.'" autocomplete="off">
                                    <label class="custom-control-label" for="check-brand-'.$brand -> brand_id.'">
                                        '.$brand -> brand_name.'
                                        (<span class="numberProductsBrand">20</span>)
                                    </label>
                                </div>';
                                }
                                echo '</div>
                                </article>
                            </div>
                            <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Rating</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseRating" aria-expanded="false" aria-controls="collapseRating">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseRating">';
                                foreach ($ratingValues as $ratingValue) {
                                    echo '<div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="rating-'.$ratingValue -> rating_values_id.'" value="'.$ratingValue -> rating_values_id.'">
                                    <label class="form-check-label" for="rating-'.$ratingValue -> rating_values_id.'">';
                                    for($i = 1; $i <= $ratingValue -> rating_values_id; $i++) {
                                        echo '<i class="fa-solid fa-star star-filled"></i> ';
                                    }
                                        echo '(<span class="numberProductsRating">20</span>)
                                    </label>
                                </div>';
                                }
                                echo '</div>
                                </article>
                            </div>
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
                                        <input type="range" id="price" class="form-range" value="'.$maxPrice.'" min="'.$minPrice.'" max="'.$maxPrice.'">
                                        <output id="output" for="price">300</output>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="filter-group">
                            <div class="card-header d-flex mb-3 align-items-center justify-content-between">
                                <h6 class="title">Sizes</h6>
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseSizes" aria-expanded="false" aria-controls="collapseSizes">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                            <article class="card-group-item">
                                <div class="collapse" id="collapseSizes">
                                    <div class="d-flex flex-wrap" id="div-sizes">';
                                    foreach ($sizes as $size) {
                                        echo '<div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input type" id="check-sizes-'.$size -> size_id.'" name="sizes" value="'.$size -> size_id.'" autocomplete="off">
                                        <label class="custom-control-label size-label" for="check-sizes-1">'.$size -> size_name.'</label>
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
                                        '.$gender -> gender_name.'
                                        (<span class="numberProductsGender">20</span>)
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
                                    <option>Defaul</option>
                                    <option>Ascending</option>
                                    <option>Desc</option>
                                    <option>Price up</option>
                                    <option>Price down</option>
                                </select>
                                <small id="sortHelp" class="form-text text-muted">Sort by your preferences, shop with ease.</small>
                            </div>
                        </div>
                    </div>
                    <!-- Shop products -->
                    <div class="row">
                        <div class="col-12">
                            <!-- products -->
                            <div class="row">';
                            foreach ($products as $product) {
                                echo '<!-- Product -->
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="product m-1 p-md-3 p-1">
                                        <div style="background-image:url(../images/products/'.$product -> product_image.'.png);" class="product-image">
                                            <div class="overlay-product-image">
                                                <div class="product-icons">
                                                    <!-- Modal add to cart icon -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
                                                    <a href="single-product.php" data-toggle="tooltip" title="View Product"><i class="fa-solid fa-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <h3 class="my-2">'.$product -> product_name.'</h3>
                                            <p class="stars">';
                                            $avgRatingProduct = averageRatingProduct($product -> product_id);
                                            $avgValue = round($avgRatingProduct -> average_rating);
                                            for($i = 0; $i < $avgValue; $i++) {
                                                echo '<i class="fa-solid fa-star star-filled"></i> ';
                                            }
                                            echo '
                                            </p>
                                            <p class="price-text-old">$'.$product -> price_new.'</p>
                                            <p class="price-text-new">$'.$product -> price_old.'</p>
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