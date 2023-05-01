<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
?>
    <!-- Product section -->
    <div id="single-product" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 single-product-background">
                </div>
                <div class="col-md-8 col-12 mt-md-0 mt-3 border">
                    <!-- Product heading -->
                    <div class="product-heading">
                        <h2 class="text-uppercase">Product Name</h2>
                    </div>
                    <!-- Product price -->
                    <div class="product-price">
                        <p class="price-text-old">$33.69</p>
                        <p class="price-text-new">$22.99</p>
                    </div>
                    <!-- Product brand -->
                    <div class="product-brand d-flex mb-2">
                        <h3>Brand:</h3>
                        <p class="ml-2">Brand-1</p>
                    </div>
                    <!-- Product description -->
                    <div class="product-description">
                        <h3>Description:</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis quaerat vitae praesentium, enim temporibus laboriosam facere autem ratione et sit. Tempora commodi voluptate, ad exercitationem sint omnis inventore tenetur consectetur a doloribus odio? Saepe dolor, voluptatibus sint amet quasi beatae.</p>
                    </div>
                    <!-- Product sizes -->
                    <div class="product-sizes d-flex align-items-center mb-2" id="div-sizes">
                        <h3>Sizes:</h3>
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
                    </div>
                    <!-- Product colors -->
                    <div class="product-colors d-flex align-items-center mb-2" id="div-colors">
                        <h3>Colors:</h3>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input type" id="check-colors-1" name="colors" value="1" autocomplete="off">
                            <label class="custom-control-label size-label color-black" for="check-colors-1"></label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input type" id="check-colors-2" name="colors" value="2" autocomplete="off">
                            <label class="custom-control-label size-label color-white" for="check-colors-2"></label>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input type" id="check-colors-3" name="colors" value="3" autocomplete="off">
                            <label class="custom-control-label size-label color-blue" for="check-colors-3"></label>
                        </div>
                    </div>
                    <!-- Product Quantity -->
                    <div class="product-quantity d-flex align-items-center mb-2">
                        <h3>Quantity:</h3>
                        <span class="button-operator ml-2 button-operator-minus">-</span>
                        <input type="text" class="button-quantity button-operator-result" value="1" />
                        <span class="button-operator button-operator-plus">+</span>
                        <small class="form-text text-muted ml-2 quantity-help"></small>
                    </div>
                    <!-- Product Add to Cart -->
                    <div class="product-add-to-cart">
                        <!-- Adding product to Cart Modal with Button -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#add-to-cart">
                            Add To Cart
                        </button>
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
    
<?php
    require_once '../includes/footer.php';
?>