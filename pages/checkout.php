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
    <!-- Checkout -->
    <section id="checkout" class="py-5">
        <div class="container">
            <div class="row">
                <!-- Form -->
                <div class="col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="font-weight-bold border-bottom mb-3">Billing Details</h3>
                            <form id="checkoutForm">
                                <!-- Full name -->
                                <div class="form-group">
                                  <label for="checkoutName" class="font-weight-bold">Full Name:</label>
                                  <input type="text" class="form-control" id="checkoutName" placeholder="Enter full name">
                                  <small id="nameHelp" class="form-text">Example: Lazar Jankovic</small>
                                </div>
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="checkoutEmail" class="font-weight-bold">Email:</label>
                                    <input type="text" class="form-control" id="checkoutEmail" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text">Example: luxefashion@gmail.com</small>
                                </div>
                                <!-- Phone number -->
                                <div class="form-group">
                                    <label for="checkoutPhone" class="font-weight-bold">Phone: (optional)</label>
                                    <input type="text" class="form-control" id="checkoutPhone" placeholder="Enter phone">
                                    <small id="phoneHelp" class="form-text">Example: +381 555 555</small>
                                </div>
                                <!-- Country -->
                                <div class="form-group">
                                    <label for="checkoutCountry" class="font-weight-bold">Country</label>
                                    <select class="form-control" id="checkoutCountry">
                                        <option value="0">Select</option>
                                        <option value="1">Serbia</option>
                                        <option value="2">Bulgaria</option>
                                        <option value="3">Macedonia</option>
                                        <option value="4">Germany</option>
                                        <option value="5">Croatia</option>
                                    </select>
                                    <small id="countryHelp" class="form-text">If your country is not listed, we are unable to process orders to that location at this time.</small>
                                </div>
                                <!-- Address -->
                                <div class="form-group">
                                    <label for="checkoutAddress" class="font-weight-bold">Address:</label>
                                    <input type="text" class="form-control" id="checkoutAddress" placeholder="Enter address">
                                    <small id="addressHelp" class="form-text">Example: Belgrade, Street 22</small>
                                </div>
                                <!-- Post Code -->
                                <div class="form-group">
                                    <label for="checkoutPostcode" class="font-weight-bold">PostCode:</label>
                                    <input type="text" class="form-control" id="checkoutPostcode" placeholder="Enter postcode">
                                    <small id="postcodeHelp" class="form-text">Example: 11500</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Order -->
                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="col-12 border shadow p-3">
                            <h3 class="text-center text-uppercase pb-3 border-bottom">Your Order</h3>
                            <p class="font-weight-bold pt-3">Total: <span id="summary">$399.99</span></p>
                            <a href="cart.html" class="w-100 text-center shop-now-link">Review your cart</a>
                            <button type="button" id="checkoutButton" class="btn mt-3 button w-100">Place Order</button>
                            <div id="response">
                                <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <?php
        require_once '../includes/footer.php';
    ?>
    
    <!-- Help -->
    

    <!-- Bootstrap include -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>