<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $countryId = $_POST['countryId'];
            $address = $_POST['address'];
            $postcode = $_POST['postcode'];
            $price = '333.92';

            $countries = tableSelectAll('countries');
            $countryIds = array();
            foreach ($countries as $country) {
                $countryIds[] = $country -> country_id;
            }

            $regexName = '/^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/';
            $regexEmail = '/^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/';
            $regexPhone = '/^\+(?:[0-9].?){6,14}[0-9]$/';
            $regexAddress = "/^[\w\s.,'-]{5,50}$/i";
            $regexPostcode = '/^[a-zA-Z0-9\s-]{3,12}$/';

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if(!preg_match($regexName, $name)) {
                $errorCounter++;
            }
            if(!preg_match($regexEmail, $email)) {
                $errorCounter++;
            }
            if(!preg_match($regexPhone, $phone)) {
                $errorCounter++;
            }
            if(!preg_match($regexAddress, $address)) {
                $errorCounter++;
            }
            if(!in_array($countryId, $countryIds)) {
                $errorCounter++;
            }
            if(!preg_match($regexPostcode, $postcode)) {
                $errorCounter++;
            }
            
            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $user = tableSelectByColumnValue('users', 'user_email', $email);
                $userId = $user -> user_id;
                $orderInsert = orderInsert($price, $address, $postcode, $countryId, $userId);
                if($orderInsert) {
                    $response = ['message' => 'Your order has been successfully processed and will be shipped to the address you provided.'];
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