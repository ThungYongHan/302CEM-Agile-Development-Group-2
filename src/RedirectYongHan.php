<?php

class RedirectYongHan
{

    public function redirect200()
    {
        return 'HTTP/1.1 200 OK';
    }

    public function validateUserSessionIsEmptyTrue()
    {
        $_SESSION['username'] = array();
        return $_SESSION['username'];
    }
}
