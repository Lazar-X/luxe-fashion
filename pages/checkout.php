<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $userPhone = phoneSelect($user -> user_id);
        $countries = countriesSelect();
        if($userPhone !== false) {
            $number = $userPhone -> phone_number;
        }
        else {
            $number = '';
        }
        echo '<!-- Checkout -->
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
                                      <input type="text" class="form-control" id="checkoutName" placeholder="Enter full name" value="'.$user -> user_firstname.' '.$user -> user_lastname.'">
                                      <small id="nameHelp" class="form-text">Example: Lazar Jankovic</small>
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="checkoutEmail" class="font-weight-bold">Email:</label>
                                        <input type="text" class="form-control" id="checkoutEmail" placeholder="Enter email" value="'.$user -> user_email.'">
                                        <small id="emailHelp" class="form-text">Example: luxefashion@gmail.com</small>
                                    </div>
                                    <!-- Phone number -->
                                    <div class="form-group">
                                        <label for="checkoutPhone" class="font-weight-bold">Phone: (optional)</label>
                                        <input type="text" class="form-control" id="checkoutPhone" placeholder="Enter phone" value="'.$number.'">
                                        <small id="phoneHelp" class="form-text">Example: +381 555 555</small>
                                    </div>
                                    <!-- Country -->
                                    <div class="form-group">
                                        <label for="checkoutCountry" class="font-weight-bold">Country</label>
                                        <select class="form-control" id="checkoutCountry">
                                            <option value="0">Select</option>
                                            '; foreach ($countries as $country) {
                                                echo '<option value="'.$country -> country_id.'">'.$country -> country_name.'</option>';
                                            } echo '
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
        </section>';
    }
    else {
        echo '<div class=container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">Oops, it looks like you are not logged in!</h3>
                    </div>
                </div>
            </div>';
    }
    require_once '../includes/footer.php';
?>