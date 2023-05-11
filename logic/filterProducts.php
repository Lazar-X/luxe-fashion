<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $categoryIds = $_POST['categoryIds'];
            $brandIds = $_POST['brandIds'];
            $colorIds = $_POST['colorIds'];
            $genderIds = $_POST['genderIds'];
            $discountIds = $_POST['discountIds'];
            $discountId = array_values($discountIds)[0];
            $search = $_POST['search'];
            $sort = $_POST['sort'];

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

            $products = filterProducts($categoryIds, $brandIds, $genderIds, $colorIds, $discountId, $search, $sort);
            $statusCode = 200;

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