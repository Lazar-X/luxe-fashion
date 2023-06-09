<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $userId = $_POST['userId'];
            $productId = $_POST['productId'];
            $quantity = $_POST['quantity'];

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            $productInCart = productInCart($productId, $userId);
            if($productInCart) {
                $response = ['message' => 'Product already in cart!'];
                $statusCode = 409;
            }
            else {
                $addProductToCart = addToCart($quantity, $productId, $userId);
                if($addProductToCart) {
                    $response = ['message' => 'Success! Product has been added to the cart.'];
                    $statusCode = 201;
                }
                else {
                    $response = ['message' => 'Oops! Something went wrong on our end and we are unable to complete your request at this time. Please try again later or contact our support team for assistance.'];
                    $statusCode = 500;
                }
            }
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>