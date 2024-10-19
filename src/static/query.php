<?php
class query
{
    public static function LOGIN_QUERY(){
        return "SELECT * FROM user WHERE username = ?";
    }

    public static function REGISTER_QUERY(){
        return "INSERT INTO user (username, password, role) VALUES (?, ?, 'user')";
    }
}
