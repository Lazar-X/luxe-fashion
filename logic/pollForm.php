<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $pollAnswerId = $_POST['pollAnswerId'];
            $pollUserId = $_POST['pollUserId'];
            $pollQuestionId = $_POST['pollQuestionId'];

            $users = tableSelectAll('users');
            $userIds = array();
            foreach ($users as $user) {
                $userIds[] = $user -> user_id;
            }

            $pollAnswers = tableSelectAll('poll_answers');
            $pollAnswerIds = array();
            foreach ($pollAnswers as $pollAnswer) {
                $pollAnswerIds[] = $pollAnswer -> poll_answer_id;
            }

            $pollQuestions = tableSelectAll('poll_questions');
            $pollQuestionIds = array();
            foreach ($pollQuestions as $pollQuestion) {
                $pollQuestionIds[] = $pollQuestion -> poll_question_id;
            }

            $errorCounter = 0;
            $response = '';
            $statusCode = '';   
            
            if(!in_array($pollUserId, $userIds)) {
                $errorCounter++;
            }
            if(!in_array($pollAnswerId, $pollAnswerIds)) {
                $errorCounter++;
            }
            if(!in_array($pollQuestionId, $pollQuestionIds)) {
                $errorCounter++;
            }
            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $insertUserPollAnswer = insertUserPollAnswer($pollUserId, $pollQuestionId, $pollAnswerId);
                if($insertUserPollAnswer) {
                    $response = ['message' => 'Success! Your vote has been sent to the database. Redirecting to home page...'];
                    $statusCode = 201;
                }
                else {
                    $response = ['message' => 'Oops! Something went wrong on our end and we are unable to complete your request at this time. Please try again later or contact our support team for assistance.'];
                    $statusCode = 500;
                }

                echo json_encode($response);
                http_response_code($statusCode);
            }
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>