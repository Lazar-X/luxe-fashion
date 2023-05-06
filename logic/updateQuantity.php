<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $userId = $_POST['userId'];
            $productId = $_POST['productId'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            $productInCart = productInCart($productId, $userId);
            if($productInCart) {
                $updateQuantity = updateQuantity($quantity, $productId, $userId, $price);
                $response = $updateQuantity;
                $statusCode = 201;
            }
            else {
                $response = ['message' => 'Product already in cart!'];
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