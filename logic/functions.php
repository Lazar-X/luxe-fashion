<?php
    function navigationSelect($navigation_group_id) {
        global $conn;
        $query = 'SELECT * FROM navigation WHERE navigation_group_id = :navigation_group_id';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':navigation_group_id', $navigation_group_id);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function contactInsert($name, $email, $message) {
        global $conn;

        $query = 'INSERT INTO contact(contact_name, contact_email, contact_message, contact_created_at) VALUES(:contactName, :email, :contactMessage, NOW())';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':contactName', $name);
        $prepare -> bindParam(':email', $email);
        $prepare -> bindParam(':contactMessage', $message);

        $result = $prepare -> execute();
        return $result;
    }

    function userInsert($firstName, $lastName, $username, $email, $hashedPassword, $gender, $verificationCode, $roleId) {
        global $conn;

        $query = 'INSERT INTO users(user_firstname, user_lastname, user_username, user_email, user_password, gender_id, role_id, user_verification_code, user_created_at, user_updated_at) VALUES(:firstName, :lastName, :username, :email, :hashedPassword, :gender, :roleId, :verificationCode, NOW(), NULL)';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':firstName', $firstName);
        $prepare -> bindParam(':lastName', $lastName);
        $prepare -> bindParam(':username', $username);
        $prepare -> bindParam(':email', $email);
        $prepare -> bindParam(':hashedPassword', $hashedPassword);
        $prepare -> bindParam(':gender', $gender);
        $prepare -> bindParam(':roleId', $roleId);
        $prepare -> bindParam(':verificationCode', $verificationCode);

        $result = $prepare -> execute();
        return $result;
    }
    
    function phoneInsert($userId, $phone) {
        global $conn;

        $query = 'INSERT INTO phones(user_id, phone_number) VALUES(:userId, :phone)';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);
        $prepare -> bindParam(':phone', $phone);

        $result = $prepare -> execute();
        return $result;
    }

    function phoneSelect($userId) {
        global $conn;

        $query = 'SELECT * FROM phones WHERE user_id = :userId';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function usersSelectAll() {
        global $conn;
        $query = 'SELECT * FROM users';

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function userEmailSelect($email) {
        global $conn;

        $query = 'SELECT * FROM users WHERE user_email = :email';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':email', $email);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function userUsernameSelect($username) {
        global $conn;

        $query = 'SELECT * FROM users WHERE user_username = :username';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':username', $username);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function userSelect($username, $hashedPassword) {
        global $conn;

        $query = 'SELECT * FROM users u JOIN roles r ON u.role_id = r.role_id WHERE u.user_username = :username AND u.user_password = :hashedPassword';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':username', $username);
        $prepare -> bindParam(':hashedPassword', $hashedPassword);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function verifyUser($username, $verificationCode) {
        global $conn;

        $query = 'UPDATE users SET user_verified = 1 WHERE user_username = :username AND user_verification_code = :verificationCode';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':username', $username);
        $prepare -> bindParam(':verificationCode', $verificationCode);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function countriesSelect() {
        global $conn;
        $query = 'SELECT * FROM countries';

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }
    
    function orderInsert($orderPrice, $orderAddress, $orderPostcode, $countryId, $userId) {
        global $conn;

        $query = 'INSERT INTO orders(order_price, order_address, order_postcode, order_created_at, country_id, user_id) VALUES(:orderPrice, :orderAddress, :orderPostcode, NOW(), :countryId, :userId)';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':orderPrice', $orderPrice);
        $prepare -> bindParam(':orderAddress', $orderAddress);
        $prepare -> bindParam(':orderPostcode', $orderPostcode);
        $prepare -> bindParam(':countryId', $countryId);
        $prepare -> bindParam(':userId', $userId);

        $result = $prepare -> execute();
        return $result;
    }

    function activePollsSelect() {
        global $conn;
        $query = 'SELECT * FROM polls WHERE poll_active = 1';

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function pollSelect($pollId) {
        global $conn;

        $query = 'SELECT * FROM polls WHERE poll_id = :pollId AND poll_active = 1';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':pollId', $pollId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function pollQuestionSelect($pollId) {
        global $conn;

        $query = 'SELECT * FROM poll_questions WHERE poll_id = :pollId';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':pollId', $pollId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function pollAnswersSelect($pollQuestionId) {
        global $conn;
        $query = 'SELECT * FROM poll_answers WHERE question_id = :pollQuestionId';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':pollQuestionId', $pollQuestionId);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function insertUserPollAnswer($pollUserId, $pollQuestionId, $pollAnswerId) {
        global $conn;

        // INSERT INTO `poll_user_answers` (`poll_user_answer_id`, `user_id`, `question_id`, `answer_id`) VALUES (NULL, '28', '1', '1');

        $query = 'INSERT INTO poll_user_answers(user_id, question_id, answer_id) VALUES(:pollUserId, :pollQuestionId, :pollAnswerId)';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':pollUserId', $pollUserId);
        $prepare -> bindParam(':pollQuestionId', $pollQuestionId);
        $prepare -> bindParam(':pollAnswerId', $pollAnswerId);

        $result = $prepare -> execute();
        return $result;
    }

?>