<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $productId = $_POST['productId'];
            $productPriceNew = $_POST['productPriceNew'];
            $productPriceOld = $_POST['productPriceOld'];

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            $regexPrice = '/^\d+(?:\.\d{1,2})?$/';

            if(!preg_match($regexPrice, $productPriceNew)) {
                $errorCounter++;
            }
            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $prices = tableSelectByColumnValue('prices', 'product_id', $productId);
                if($prices) {
                    $response = ['message' => 'The product already has its price!'];
                    $statusCode = 409;
                }
                else {
                    $priceInsertNew = priceInsertNew($productId, $productPriceNew);
                    if($priceInsertNew) {
                        if($productPriceOld !== '') {
                            $priceInsertOld = priceInsertOld($productId, $productPriceNew, $productPriceOld);
                        }
                        $response = ['message' => 'Success! Price has been added to the product.'];
                        $statusCode = 201;
                    }
                    else {
                        $response = ['message' => 'Oops! Something went wrong on our end and we are unable to complete your request at this time. Please try again later or contact our support team for assistance.'];
                        $statusCode = 500;
                    }
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