<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $userId = $_POST['userId'];
            $productId = $_POST['productId'];

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            $productInCart = productInCart($productId, $userId);
            if($productInCart) {
                $deleteProductFromCart = deleteFromCart($userId, $productId);
                if($deleteProductFromCart) {
                    $products = selectProductsFromCart($userId);
                    $response = array($products, $deleteProductFromCart);
                    $statusCode = 200;
                }
                else {
                    $response = ['message' => 'Oops! Something went wrong on our end and we are unable to complete your request at this time. Please try again later or contact our support team for assistance.'];
                    $statusCode = 500;
                }   
            }
            else {
                $response = ['message' => 'Product is not in cart!'];
                $statusCode = 409;
            }
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>