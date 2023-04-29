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
        require_once '../includes/navigation.php';
    ?>
    <!-- Cart -->
    <div id="cart-section" class="padding-150">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row col-12 d-flex flex-column shadow border p-3">
                <div class="col-12 border-bottom">
                    <h2 class="text-center text-uppercase">Cart</h2>
                    <p class="text-center">You have <span id="product-count-cart">3</span> items in your cart</p>
                </div>
                <!-- Single Product Heading Cart -->
                <div class="col-12 row d-lg-flex d-none border-bottom mt-3 align-items-center">
                    <div class="col-lg-1 col-12">
                        <h3>Image</h3>
                    </div>
                    <div class="col-lg-4 col-12">
                        <h3>Product Name</h3>
                    </div>
                    <div class="col-lg-4 col-12">
                        <h3>Quantity</h3>
                    </div>
                    <div class="col-lg-2 col-12">
                        <h3>Price</h3>
                    </div>
                    <div class="col-lg-1 col-12">
                        <h3>Remove</h3>
                    </div>
                </div>
                <!-- Single Product in Cart -->
                <div class="col-12 row d-flex align-items-center justify-content-center border-bottom single-product-cart py-2">
                    <!-- Single Product Image -->
                    <div class="col-lg-1 col-12">
                        <div class="cart-background-image">
                        </div>
                    </div>
                    <!-- Single Product Name -->
                    <div class="col-lg-4 col-12">
                        <h3>Product Name</h3>
                    </div>
                    <!-- Single Product Quantity -->
                    <div class="col-lg-4 col-12">
                        <div class="product-quantity d-flex align-items-center mb-2">
                            <span class="button-operator ml-2 button-operator-minus">-</span>
                            <input type="text" class="button-quantity button-operator-result" value="1" />
                            <span class="button-operator button-operator-plus">+</span>
                            <small class="form-text text-muted ml-2 quantity-help"></small>
                        </div>
                    </div>
                    <!-- Single Product Price -->
                    <div class="col-lg-2 col-12">
                        <p class="price-text-new">$22.99</p>
                    </div>
                    <!-- Single Product Delete -->
                    <div class="col-lg-1 col-12">
                        <button class="cart-button-delete">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
                <!-- Single Product in Cart -->
                <div class="col-12 row d-flex align-items-center justify-content-center border-bottom single-product-cart py-2">
                    <!-- Single Product Image -->
                    <div class="col-lg-1 col-12">
                        <div class="cart-background-image">
                        </div>
                    </div>
                    <!-- Single Product Name -->
                    <div class="col-lg-4 col-12">
                        <h3>Product Name</h3>
                    </div>
                    <!-- Single Product Quantity -->
                    <div class="col-lg-4 col-12">
                        <div class="product-quantity d-flex align-items-center mb-2">
                            <span class="button-operator ml-2 button-operator-minus">-</span>
                            <input type="text" class="button-quantity button-operator-result" value="1" />
                            <span class="button-operator button-operator-plus">+</span>
                            <small class="form-text text-muted ml-2 quantity-help"></small>
                        </div>
                    </div>
                    <!-- Single Product Price -->
                    <div class="col-lg-2 col-12">
                        <p class="price-text-new">$22.99</p>
                    </div>
                    <!-- Single Product Delete -->
                    <div class="col-lg-1 col-12">
                        <button class="cart-button-delete">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
                <!-- Single Product in Cart -->
                <div class="col-12 row d-flex align-items-center justify-content-center border-bottom single-product-cart py-2">
                    <!-- Single Product Image -->
                    <div class="col-lg-1 col-12">
                        <div class="cart-background-image">
                        </div>
                    </div>
                    <!-- Single Product Name -->
                    <div class="col-lg-4 col-12">
                        <h3>Product Name</h3>
                    </div>
                    <!-- Single Product Quantity -->
                    <div class="col-lg-4 col-12">
                        <div class="product-quantity d-flex align-items-center mb-2">
                            <span class="button-operator ml-2 button-operator-minus">-</span>
                            <input type="text" class="button-quantity button-operator-result" value="1" />
                            <span class="button-operator button-operator-plus">+</span>
                            <small class="form-text text-muted ml-2 quantity-help"></small>
                        </div>
                    </div>
                    <!-- Single Product Price -->
                    <div class="col-lg-2 col-12">
                        <p class="price-text-new">$22.99</p>
                    </div>
                    <!-- Single Product Delete -->
                    <div class="col-lg-1 col-12">
                        <button class="cart-button-delete">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
                <!-- Single Product Footer -->
                <div class="col-12 row mt-3 d-flex align-items-center">
                    <div class="col-md-10 col-12 mb-md-0 mb-2">
                        <h3 class="text-uppercase font-weight-bold">Summary: <span id="summary">$399.99</span></h3>
                    </div>
                    <div class="col-md-2 col-12">
                        <a href="checkout.html" class="font-weight-bold shop-now-link">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        require_once '../includes/footer.php';
    ?>


    <!-- Bootstrap include -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>