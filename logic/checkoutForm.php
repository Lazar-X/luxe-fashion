<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $countryId = $_POST['countryId'];
            $address = $_POST['address'];
            $postcode = $_POST['postcode'];

            // this will be from database
            $arrayCountry = [1, 2, 3];

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
            if(!in_array($countryId, $arrayCountry)) {
                $errorCounter++;
            }
            if(!preg_match($regexPostcode, $postcode)) {
                $errorCounter++;
            }
            
            if($errorCounter != 0) {
                $response = ['message' => 'There is error on server side with data from client side'];
                $statusCode = 422;
            }
            else {
                // Upis u bazu
                // $insert ce da vrati true/false
                // $insert = $insertInBase($name, $email, $message);
                $insert = true;
                if($insert) {
                    $response = ['message' => 'Everything good, data sent in base'];
                    $statusCode = 201;
                }
                else {
                    $response = ['message' => 'Not good, there is error with sending data in base'];
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