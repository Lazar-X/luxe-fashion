<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $categoryIds = $_POST['categoryIds'];
            $brandIds = $_POST['brandIds'];
            $categories = tableSelectAll('categories');
            $categoryIdsBase = array();
            foreach ($categories as $c) {
                $categoryIdsBase[] = $c -> category_id;
            }
            $errorCounter = 0;
            $statusCode = '';   
            foreach ($categoryIds as $categoryId) {
                if(!in_array($categoryId, $categoryIdsBase)) {
                    $errorCounter++;
                }
            }
            if($errorCounter != 0) {
                $statusCode = 422;
            }
            else {
                (object)$products = filterProducts($categoryIds, $brandIds);
                $statusCode = 200;
            }
            
            $averageRatings = array();
            $productIds = array();
            foreach ($products as $product) {
                $avgRatingProduct = averageRatingProduct($product -> product_id);
                $avgValue = round($avgRatingProduct -> average_rating);
                $averageRatings[] = $avgValue;
                $productIds[] = $product -> product_id;
            }
            
            $response = array($products, $averageRatings, $productIds);
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>