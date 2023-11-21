<?php
$db_name='mysql:host=localhost;dbname=foodies_db';
$user_name='foodies';
$user_password='foodies';

$conn=new PDO($db_name, $user_name, $user_password);

if (!$conn){
    echo "not connected";
}

function generateUniqueId() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($characters);
    $uniqueId = '';

    for ($i = 0; $i < 20; $i++) { // Generating a 20-character ID
        $randomIndex = mt_rand(0, $charLength - 1);
        $uniqueId .= $characters[$randomIndex];
    }

    return $uniqueId;
}

?>