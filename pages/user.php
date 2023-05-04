<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if($user -> role_name == 'user') {
            echo '<div class="container py-5">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="text-center">Welcome '.$user -> user_firstname.'</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <!-- Form -->
                            <div class="col-12 shadow py-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="font-weight-bold border-bottom mb-3">Update your data:</h3>
                                        <form id="userDataForm">
                                            <!-- Full name -->
                                            <div class="form-group">
                                            <label for="checkoutName" class="font-weight-bold">First Name:</label>
                                            <input type="text" class="form-control" id="updateFirstName" placeholder="Enter full name" value="'.$user -> user_firstname.'">
                                            <small id="updateFirstNameHelp" class="form-text">Example: Lazar Jankovic</small>
                                            </div>
                                            <!-- Full name -->
                                            <div class="form-group">
                                            <label for="checkoutName" class="font-weight-bold">Last Name:</label>
                                            <input type="text" class="form-control" id="updateLastName" placeholder="Enter full name" value="'.$user -> user_lastname.'">
                                            <small id="updateLastNameHelp" class="form-text">Example: Lazar Jankovic</small>
                                            </div>
                                            <input type="hidden" id="userId" value="'.$user -> user_id.'">
                                            <!-- Update Button -->
                                            <button type="button" id="updateUserDataButton" class="btn mt-3 button w-100">Update</button>
                                            <div id="response">
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-12 mb-3">
                            <h3 class="text-center">Orders:</h3>
                        </div>
                    </div>
                    <div class="row mt-2 text-center">
                        <div class="col-12 mb-3">
                            <div id="orders">
                            <div class="row">
                                            <div class="col-6">
                                                <h3>Date</h3>
                                            </div>
                                            <div class="col-6">
                                                <h3>Price</h3>
                                            </div>
                                        </div>';
                            $orders = tableSelectAllByColumnValue('orders', 'user_id', $user -> user_id);
                            foreach ($orders as $order) {
                                $orderDate = strtotime($order -> order_created_at);
                                $orderPrice = $order -> order_price;
                                echo '<div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3>'.date('m/d/Y', $orderDate).'</h3>
                                            </div>
                                            <div class="col-6">
                                                <h3>'.$orderPrice.'</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo '</div>
                        </div>
                    </div>
                </div>';
        }
        else {
            echo '<div class="container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">Oops, it looks like you are administartor!</h3>
                    </div>
                </div>
            </div>';
        }
    }
    else {
        echo '<div class="container">
            <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <h3 class="text-danger">Oops, it looks like you are not logged in!</h3>
                </div>
            </div>
        </div>';
    }
    require_once '../includes/footer.php';
?>