<?php
include '../server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateIntro'])) {
    $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
    $flex = mysqli_real_escape_string($connect, $_POST['flex']);
    $socmed = mysqli_real_escape_string($connect, $_POST['socmed']);

    $id = 1; 

    if (!empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $logoTargetFilePath = "image/" . $logo;
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logoTargetFilePath)) {
            $updateLogo = "UPDATE intro SET logo = '$logoTargetFilePath' WHERE id = $id";
            $connect->query($updateLogo);
        } else {
            echo '<div class="alert alert-danger fixed-top" role="alert">Error uploading logo.</div>';
        }
    }

    if (!empty($_FILES['intro_img']['name'])) {
        $introImg = $_FILES['intro_img']['name'];
        $introImgTargetFilePath = "image/" . $introImg;
        if (move_uploaded_file($_FILES["intro_img"]["tmp_name"], $introImgTargetFilePath)) {
            $updateIntroImg = "UPDATE intro SET intro_img = '$introImgTargetFilePath' WHERE id = $id";
            $connect->query($updateIntroImg);
        } else {
            echo '<div class="alert alert-danger fixed-top" role="alert">Error uploading intro image.</div>';
        }
    }

    $updateTextFields = "UPDATE intro SET 
                            firstname = '$firstname', 
                            lastname = '$lastname', 
                            flex = '$flex', 
                            socmed = '$socmed'
                        WHERE id = $id";
    if ($connect->query($updateTextFields) === TRUE) {
        header("Location: portfolio.php?updateSuccess=true");
        exit();
    } else {
        echo '<div class="alert alert-danger fixed-top" role="alert">Error updating record: ' . $connect->error . '</div>';
    }

    $connect->close();
}
?>
