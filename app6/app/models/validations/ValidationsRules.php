<?php

class ValidationsRules {

    public static function test_input($data) {
        //Removes whitespace and other predefined characters from both sides of a string
        $data = trim($data);
        //This PHP function returns a string with backslashes in front of each character that needs to be quoted in a database query
        $data = addslashes($data);
        //The htmlspecialchars() function converts some predefined characters to HTML entities.
        $data = htmlspecialchars($data);
        return $data;
    }

}
    