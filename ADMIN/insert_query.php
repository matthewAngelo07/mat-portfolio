<?php
if(isset($_POST['insertIntro'])) {
    include '../server.php';

    $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
    $flex = mysqli_real_escape_string($connect, $_POST['flex']);
    $socmed = mysqli_real_escape_string($connect, $_POST['socmed']);

    $upload_directory = "image/";

    $logo = $_FILES['logo']['name'];
    $logo_temp = $_FILES['logo']['tmp_name'];
    $logo_path = $upload_directory . $logo; 
    move_uploaded_file($logo_temp, $logo_path);

    $intro_img = $_FILES['intro_img']['name'];
    $intro_img_temp = $_FILES['intro_img']['tmp_name'];
    $intro_img_path = $upload_directory . $intro_img; 
    move_uploaded_file($intro_img_temp, $intro_img_path);

    $sql = "INSERT INTO intro (logo, intro_img, firstname, lastname, flex, socmed) VALUES ('$logo_path', '$intro_img_path', '$firstname', '$lastname', '$flex', '$socmed')";
    if(mysqli_query($connect, $sql)) {
        header("Location: portfolio.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>

