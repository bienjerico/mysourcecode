<?php

function random_password() {
    $chars1 = "abcdefghijklmnopqrstuvwxyz";
    $password = substr( str_shuffle( $chars1 ), 0, 2 );// 2 small letters
    $chars4 = "@#$%&=+?";
    $password .= substr( str_shuffle( $chars4 ), 0, 2 );// 2 special characters
    $chars2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $password .= substr( str_shuffle( $chars2 ), 0, 2 );// 2 capital letters
    $chars3 = "0123456789";
    $password .= substr( str_shuffle( $chars3 ), 0, 2 );// 2 number
    return $password;
}

?>