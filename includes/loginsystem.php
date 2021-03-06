<?php
    function isLoggedIn($userid = null, $seckey = null) {
        global $db;

        if($userid == null || $seckey == null) {
            if(!isset($_SESSION['itd_userid']) || !isset($_SESSION['itd_seckey'])) {
                return false;
            }

            $userid = $_SESSION['itd_userid'];
            $seckey = $_SESSION['itd_seckey'];
        }

        // Get User from DB
        $existingUserQuery = $db->prepare("SELECT COUNT(*) FROM user WHERE ID = ? AND security_key = ?");
        $existingUserQuery->bind_param("is", $userid, $seckey);
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
        $newUserQuery = $db->prepare("INSERT INTO user VALUES(NULL, ?, ?, ?, ?, ?, NULL, NULL, NULL, NULL)");
        $newUserQuery->bind_param("sssss", $username, hashPassword($password), $email, $forename, $lastname);
        $newUserQuery->execute();
        $newUserQuery->close();

        // Login User
        login($username, $password);
    }

    function hashPassword($password) {
        return sha1("ITD".$password);
    }

    function getUserData($userID, $userData, $unsafemode = false) {
        global $db;

        // Security Measures, make it overrideable for internal functions
        if(!$unsafemode) {
            if ($userData == "password" || $userData == "security_key") {
                throw new Exception("Access Violation: Tried to change Password/SecKey in Safemode!");
            }
        }

        // Get user data from DB
        $userDataQuery = $db->prepare("SELECT * FROM user WHERE ID = ?");
        $userDataQuery->bind_param("i", $userID);
        $userDataQuery->execute();
        $userDataResults = $userDataQuery->get_result()->fetch_assoc();

        return $userDataResults[$userData];
    }

    function changeUserPassword($userID, $security_key, $old_password, $new_password) {
        global $db;

        // Check if User is allowed to change password
        if(!isLoggedIn($userID, $security_key)) {
            throw new Exception("Deine Login-Session ist fehlerhaft! (UserID oder SecurityKey stimmen nicht)");
        }

        // Get old password and check it against user data
        if(getUserData($userID, "password", true) != hashPassword($old_password)) {
            throw new Exception("Das eingegebene Password war falsch");
        }

        // Change password to new password
        $userDataQuery = $db->prepare("UPDATE `user` SET `password` = ? WHERE `id` = ?");
        $userDataQuery->bind_param("si", hashPassword($new_password), $userID);
        $userDataQuery->execute();

        return $userDataQuery;
    }

    function changeUserData($userID, $security_key, $field, $data, $unsafemode = false) {
        global $db;

        // Check if User is allowed to change email
        if(!isLoggedIn($userID, $security_key)) {
            throw new Exception("Deine Login-Session ist fehlerhaft! (UserID oder SecurityKey stimmen nicht)");
        }

        // Security Measures, make it overrideable for internal functions
        if(!$unsafemode) {
            if ($field == "password" || $field == "security_key") {
                throw new Exception("Access Violation: Tried to change Password/SecKey in Safemode!");
            }
        }

        // Get correct Query
        $userDataQuery = null;
        switch($field) {
            case "forename":
                $userDataQuery = $db->prepare("UPDATE `user` SET `forename` = ? WHERE `id` = ?");
                break;
            case "lastname":
                $userDataQuery = $db->prepare("UPDATE `user` SET `lastname` = ? WHERE `id` = ?");
                break;
            case "adress":
                $userDataQuery = $db->prepare("UPDATE `user` SET `adress` = ? WHERE `id` = ?");
                break;
            case "zip":
                $userDataQuery = $db->prepare("UPDATE `user` SET `zip` = ? WHERE `id` = ?");
                break;
            case "city":
                $userDataQuery = $db->prepare("UPDATE `user` SET `city` = ? WHERE `id` = ?");
                break;
            case "email":
                $userDataQuery = $db->prepare("UPDATE `user` SET `email` = ? WHERE `id` = ?");
                break;
        }

        // Change data
        $userDataQuery->bind_param("si", $data, $userID);
        $userDataQuery->execute();

        return $userDataQuery;
    }
?>