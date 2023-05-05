<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if($user -> role_name == 'admin') {
            $products = tableSelectAll('products');
            $categories = tableSelectAll('categories');
            $brands = tableSelectAll('brands');
            $colors = tableSelectAll('colors');
            $genders = tableSelectAll('genders');
            $sizes = tableSelectAll('sizes');
            $users = tableSelectAll('users');
            $messages = tableSelectAll('contact');

            echo '
            <div class="container py-5">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center font-weight-bold">Welcome '.$user -> user_firstname.'</h3>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <h3 class="font-weight-bold">Add product:</h3>
                    </div>
                </div>
                    <div class="row shadow p-3">
                        <div class="col-12">
                            <form id="productForm">
                            <div class="form-group">
                                <label for="productName" class="font-weight-bold">Product Name:</label>
                                <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                                <small id="productNameHelp" class="form-text">Example: Product</small>
                            </div>
                            <div class="form-group">
                                <label for="productDescription">Product Description:</label>
                                <textarea class="form-control" id="productDescription" rows="5" placeholder="Enter product description"></textarea>
                                <small id="productDescriptionHelp" class="form-text">Example: This is product description</small>
                            </div>
                            <div class="form-group">
                                <label for="productImage" class="font-weight-bold">Product Image:</label>
                                <input type="text" class="form-control" id="productImage" placeholder="Enter name of product image">
                                <small id="productImageHelp" class="form-text">Example: image</small>
                            </div>
                            <div class="form-group">
                                <label for="category" class="font-weight-bold">Select Category</label>
                                <select class="form-control" id="category">';
                                foreach ($categories as $category) {
                                    echo '<option value="'.$category -> category_id.'">'.$category -> category_name.'</option>';
                                }
                                echo '</select>
                            </div>
                            <div class="form-group">
                                <label for="brand" class="font-weight-bold">Select Brand</label>
                                <select class="form-control" id="brand">';
                                foreach ($brands as $brand) {
                                    echo '<option value="'.$brand -> brand_id.'">'.$brand -> brand_name.'</option>';
                                }
                                echo '</select>
                            </div>
                            <div class="form-group">
                                <label for="color" class="font-weight-bold">Select Color</label>
                                <select class="form-control" id="color">';
                                foreach ($colors as $color) {
                                    echo '<option value="'.$color -> color_id.'">'.$color -> color_name.'</option>';
                                }
                                echo '</select>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="font-weight-bold">Select Gender</label>
                                <select class="form-control" id="gender">';
                                foreach ($genders as $gender) {
                                    echo '<option value="'.$gender -> gender_id.'">'.$gender -> gender_name.'</option>';
                                }
                                echo '</select>
                            </div>

                            <button type="button" id="addProductButton" class="btn mt-3 button">Add product</button>
                            <div id="response">
                                <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row my-3 mt-5">
                    <div class="col-12">
                        <h3 class="font-weight-bold">Add sizes for product</h3>
                    </div>
                </div>
                <div class="row shadow p-3">
                        <div class="col-12">
                            <form id="sizesForm">
                            <div class="form-group">
                                <label for="product" class="font-weight-bold">Select Product</label>
                                <select class="form-control" id="product">';
                                foreach ($products as $product) {
                                    echo '<option value="'.$product -> product_id.'">'.$product -> product_id.' '.$product -> product_name.'</option>';
                                }
                                echo '</select>
                            </div>
                                <div id="sizes d-flex">';
                                foreach ($sizes as $size) {
                                    echo '<div class="custom-control custom-checkbox d-inline-block w-50">
                                    <input type="checkbox" class="custom-control-input type" id="size-'.$size -> size_id.'" name="sizes" value="'.$size -> size_id.'" autocomplete="off">
                                    <label class="custom-control-label" for="size-'.$size -> size_id.'"></label>
                                    '.$size -> size_name.'
                                    </div>';
                                }
                                echo '<small id="sizesHelp" class="form-text">Select size</small></div>

                            <button type="button" id="addSizesButton" class="btn mt-3 button">Add sizes</button>
                            <div id="responseSizes">
                                <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">
                <div class="row my-3 d-flex flex-column">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="font-weight-bold">Users:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                                <h4>First name:</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4>Username:</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4>Email:</h4>
                        </div>
                    </div>';
                    foreach ($users as $user) {
                        echo '<div class="row border">
                        <div class="col-md-4 col-12">
                                <h4 class="font-weight-bold">'.$user -> user_firstname.'</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4 class="font-weight-bold">'.$user -> user_username.'</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4 class="font-weight-bold">'.$user -> user_email.'</h4>
                        </div>
                    </div>';
                    }
                echo '</div>
                <div class="row my-3 d-flex flex-column">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="font-weight-bold">Users:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                                <h4>First name:</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4>Username:</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4>Email:</h4>
                        </div>
                    </div>';
                    foreach ($messages as $message) {
                        echo '<div class="row border">
                        <div class="col-md-4 col-12">
                                <h4 class="font-weight-bold">'.$message -> contact_name.'</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4 class="font-weight-bold">'.$message -> contact_email.'</h4>
                        </div>
                        <div class="col-md-4 col-12">
                                <h4 class="font-weight-bold">'.$message -> contact_message.'</h4>
                        </div>
                    </div>';
                    }
                echo '</div>
            </div></div>
            ';
        }
        else {
            echo '<div class="container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">Oops, it looks like you are not administrator!</h3>
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