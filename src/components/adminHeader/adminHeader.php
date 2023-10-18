<?php
include '../components/connect.php';
if (isset($_POST['submit'])) {
    $id=generateUniqueId();
    
    $name=$_POST['name'];
    $name=filter_var($name, FILTER_UNSAFE_RAW);
   
    $email=$_POST['email'];
    $email=filter_var($email, FILTER_UNSAFE_RAW);

    $pass=sha1($_POST['pass']);
    $pass=filter_var($pass, FILTER_UNSAFE_RAW);

    $currentPass=sha1(($_POST['currentPass']));
    $currentPass=filter_var($currentPass, FILTER_UNSAFE_RAW);

    $image=$FILES['image']['name'];
    $image=filter_var($image, FILTER_UNSAFE_RAW);
    $ext=pathinfo($image, PATHINFO_EXTENSION);
    $rename=generateUniqueId().'.'.$ext;
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder='../../uploadedFiles/'.$rename;

    $select_seller=$conn->prepare("SELECT *FROM 'sellers' WHERE email=?");
    $select_seller->execute([$email]);

    if($select_seller->rowCount() > 0){
        $warning_msg[]='email already exist';
    }else{
        if($pass!=$currentPass){
            $warning_msg[]='confirm password not matched';
        }else{
            $insert_seller=$conn->prepare("INSERT INTO 'sellers' (id, name, email, password, image)")
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>

        </title>
        <link rel="stylesheet" type="text/css" href="adminHeader.css">
    </head>
    <body>

    </body>
</html>