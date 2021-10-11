
<?php

class userArrayUnitTest {

    public function validateUserIsArray() {
        $addUser = array("user_id" => 1, "username" => "user1", "user_email" => "user1@example.com", "user_pass" => "p455w0rd");
        if (is_array($addUser)) {
            return true;
        } else
            return false;
    }

    public function validateUserKey() {
        $addUser = array("user_id" => 1, "username" => "user1", "user_email" => "user1@example.com", "user_pass" => "p455w0rd");
        return $addUser;
    }

}