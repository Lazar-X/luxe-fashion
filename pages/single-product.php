<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    if (!isset($_GET['product_id'])) {
        echo '<div class=container">
            <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <h3 class="text-danger">You are not allowed to access this page directly. Please click on a poll to participate.</h3>
                </div>
            </div>
        </div>';
        header("Refresh:2; url=index.php");
    }
    else {
        $productId = $_GET['product_id'];
        $product = selectProductById($productId);
        $sizesForProduct = selectSizesForProduct($productId);
        echo '<div class="py-5">
            <p>ovde dump</p>';
            // var_dump($sizesForProduct);
        echo '</div>';

        echo '<!-- Product section -->
        <div id="single-product" class="py-5">
            <div class="container">
                <div class="row">
                    <div style="background-image: url(../images/products/'.$product -> product_image.'.png);" class="col-md-4 col-12 single-product-background">
                    </div>
                    <div class="col-md-8 col-12 mt-md-0 mt-3 border">
                        <!-- Product heading -->
                        <div class="product-heading">
                            <h2 class="text-uppercase">'.$product -> product_name.'</h2>
                        </div>
                        <!-- Product price -->
                        <div class="product-price">';
                        if($product -> price_old != null) {
                            echo '<p class="price-text-old mr-2">$'.$product -> price_old.'</p>';
                        }
                        else {
                            echo '<p class="price-text-old"></p>';
                        }
                            echo '<p class="price-text-new">'.$product -> price_new.'</p>
                        </div>
                        <!-- Product brand -->
                        <div class="product-brand d-flex mb-2">
                            <h3>Brand:</h3>
                            <p class="ml-2">'.$product -> brand_name.'</p>
                        </div>
                        <!-- Product description -->
                        <div class="product-description">
                            <h3>Description:</h3>
                            <p>'.$product -> product_description.'</p>
                        </div>
                        <!-- Product sizes -->
                        <div class="product-sizes d-flex align-items-center mb-2 flex-wrap" id="div-sizes">
                            <h3>Sizes:</h3>';
                            foreach ($sizesForProduct as $size) {
                                echo '<div class="custom-control custom-checkbox mb-2">
                                <input type="radio" class="custom-control-input type" id="check-sizes-'.$size -> product_size_id.'" name="sizes" value="'.$size -> size_id.'" autocomplete="off">
                                <label class="custom-control-label size-label" for="check-sizes-'.$size -> product_size_id.'">'.$size -> size_name.'</label>
                            </div>';
                            }
                        echo ' <small class="form-text text-danger font-weight-bold ml-2" id="sizeHelp"></small></div>
                        <!-- Product colors -->
                        <div class="product-colors d-flex align-items-center mb-2" id="div-colors">
                            <h3>Color:</h3>
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input type" id="check-colors-'.$product -> color_id.'" name="colors" value="'.$product -> color_id.'" autocomplete="off" disabled>
                                <label style="background-color: '.$product -> color_value.';" class="custom-control-label size-label" for="'.$product -> color_id.'"></label>
                            </div>
                        </div>
                        <!-- Product Quantity -->
                        <div class="product-quantity d-flex align-items-center mb-2">
                            <h3>Quantity:</h3>
                            <span class="button-operator ml-2 button-operator-minus">-</span>
                            <input type="text" class="button-quantity button-operator-result" id="quantity" value="1" readonly />
                            <span class="button-operator button-operator-plus">+</span>
                            <small class="form-text text-muted ml-2 quantity-help"></small>
                        </div>
                        <input type="hidden" id="productId" value="'.$productId.'">';
                        if(isset($_SESSION['user'])) {
                            $user = $_SESSION['user'];
                            echo '<input type="hidden" id="userId" value="'.$user -> user_id.'">';
                        }
                        echo '<!-- Product Add to Cart -->
                        <div class="product-add-to-cart">
                            <!-- Adding product to Cart Modal with Button -->
                            <button type="button" id="addToCartButton" class="btn" data-target="#add-to-cart">
                                Add To Cart
                            </button>
                            <div id="response"></div>
                            <small class="form-text text-danger ml-2" id="addToCartHelp"></small>
                            <!-- Modal -->
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
                                            <a href="cart.php" class="btn go-to-cart">Go To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        echo '<div class="container my-3 py-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ratings" class="font-weight-bold">Rate this product:</label>
                                    <select class="form-control" id="ratings">';
                                    $ratingValues = tableSelectAll('rating_values');
                                    foreach ($ratingValues as $rv) {
                                        echo '<option value="'.$rv -> rating_values_id.'">'.$rv -> rating_values_id.'</option>';
                                    }
                                    echo '</select>
                                    <small class="form-text text-danger ml-2" id="rateProductHelp"></small>
                                </div>
                                <button type="button" id="rateProductButton" class="btn mt-3 button">Rate product</button>
                                <div id="responseRate">
                                    <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                                </div>
                            </div>
                        </div>
        </div>';
    }
    require_once '../includes/footer.php';
?>