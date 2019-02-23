<?php
    function isLoggedIn() {
        global $db;

        // Get User from DB
        $existingUserQuery = $db->prepare("SELECT COUNT(*) FROM user WHERE ID = ? AND security_key = ?");
        $existingUserQuery->bind_param("is", $_SESSION['itd_userid'], $_SESSION['itd_seckey']);
        $existingUserQuery->execute();
        $existingUserResult = $existingUserQuery->get_result()->fetch_assoc();

        if($existingUserResult['COUNT(*)'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    function login($username, $password) {
        global $db;

        // Get User from DB
        $existingUserQuery = $db->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $existingUserQuery->bind_param("ss", $username, hashPassword($password));
        $existingUserQuery->execute();
        $existingUserResult = $existingUserQuery->get_result()->fetch_assoc();

        // Check Password
        if($existingUserResult['password'] == hashPassword($password)) {
            // Set SecurityKey
            $newSecKey = uniqid();
            $setSecurityKeyQuery = $db->query("UPDATE user SET security_key = '".$newSecKey."' WHERE id = ".$existingUserResult['id']);

            if(!$setSecurityKeyQuery) {
                throw new Exception("Security Key could not be set.");
            }

            // Set Session
            $_SESSION['itd_userid'] = $existingUserResult['id'];
            $_SESSION['itd_seckey'] = $newSecKey;

            header('Location: userarea.php');
        } else {
            throw new Exception("Password was not correct.");
        }
    }

    function logout() {
        global $db;

        // Destroy Session
        session_destroy();
    }

    function register($username, $password, $email, $forename, $lastname) {
        global $db;

        // Check if username already exist
        $existingUserQuery = $db->prepare("SELECT COUNT(*) FROM user WHERE username = ? OR email = ?");
        $existingUserQuery->bind_param("ss", $username, $email);
        $existingUserQuery->execute();
        $existingUserResult = $existingUserQuery->get_result()->fetch_assoc();

        if($existingUserResult['COUNT(*)'] > 0) {
            throw new Exception("Username or Email is already in use.");
        }

        $existingUserQuery->close();

        // Register User
        $newUserQuery = $db->prepare("INSERT INTO user VALUES(NULL, ?, ?, ?, ?, ?, NULL)");
        $newUserQuery->bind_param("sssss", $username, hashPassword($password), $email, $forename, $lastname);
        $newUserQuery->execute();
        $newUserQuery->close();

        // Login User
        login($username, $password);
    }

    function hashPassword($password) {
        return sha1("ITD".$password);
    }
?>