<?php

include '../server.php';


if (isset($_POST['age']) && isset($_POST['birth']) && isset($_POST['phone']) && isset($_POST['school']) && isset($_POST['degree']) && isset($_POST['address'])) {

    $age = $_POST['age'];
    $birth = $_POST['birth'];
    $phone = $_POST['phone'];
    $school = $_POST['school'];
    $degree = $_POST['degree'];
    $address = $_POST['address'];


    $update_query = "UPDATE basicinfo SET age='$age', birth='$birth', phone='$phone', school='$school', degree='$degree', address='$address' WHERE id = 1"; 


    if(mysqli_query($connect, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }

    mysqli_close($connect);
} else {
    echo "Form fields are not set";
}
?>

<?php

include '../server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content'])) {
    $content = mysqli_real_escape_string($connect, $_POST['content']);

    $update_query = "UPDATE about_desc SET content='$content' WHERE id = 1"; 

    if(mysqli_query($connect, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
} else {
    echo "Form fields are not set";
}

mysqli_close($connect);
?>

<?php


include '../server.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content1'])) {

    $content1 = mysqli_real_escape_string($connect, $_POST['content1']);


    $update_query = "UPDATE prof SET content1='$content1' WHERE id = 1"; 


    if(mysqli_query($connect, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
} else {
    echo "Form fields are not set";
}

mysqli_close($connect);
?>

<?php


include '../server.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content2'])) {

    $content2 = mysqli_real_escape_string($connect, $_POST['content2']);

  
    $update_query = "UPDATE profdesc SET content2='$content2' WHERE id = 1"; 


    if(mysqli_query($connect, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
} else {
    echo "Form fields are not set";
}


mysqli_close($connect);
?>

<?php

include '../server.php';


if (isset($_POST['content11']) && isset($_POST['content22']) && isset($_POST['content33'])) {
 
    $content11 = $_POST['content11'];
    $content22 = $_POST['content22'];
    $content33 = $_POST['content33'];


 
    $update_query = "UPDATE skills SET content11='$content11', content22='$content22', content33='$content33' WHERE id = 1"; 

    if(mysqli_query($connect, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }


    mysqli_close($connect);
} else {
    echo "Form fields are not set";
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMS Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #0a4444;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto 0; 
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .btn-primary {
            background-color: #1e7e34;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #135827;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">Matt CMS</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1>About</h1>

        <div class="form-container">
            <label for="myWorksTitle" class="form-label">About me</label>
            <form method="post">
                <input type="text" name=content id="myWorksTitle" class="form-control" placeholder="Enter form title">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="form-container">
            <label for="uploadWorksTitle" class="form-label">Profession</label>
            <form method="post">
                <input type="text" name=content1 id="uploadWorksTitle" class="form-control" placeholder="Enter form title">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="form-container">
            <label for="uploadWorksTitle" class="form-label">Profession Description</label>
            <form method="post">
                <input type="text" name=content2 id="uploadWorksTitle" class="form-control" placeholder="Enter form title">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        <div class="basic-information">
    <h2>Basic Information</h2>

    <form method="post">
        <div class="form-container">
            <label for="age" class="form-label">Age</label>
            <input type="text" name=age id="age" class="form-control" placeholder="Enter age">
        </div>

        <div class="form-container">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="text" name=birth id="birthday" class="form-control" placeholder="Enter birthday">
        </div>
        
        <div class="form-container">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name=phone id="phone" class="form-control" placeholder="Enter phone number">
        </div>

        <div class="form-container">
            <label for="school" class="form-label">School</label>
            <input type="text" name=school id="school" class="form-control" placeholder="Enter school name">
        </div>

        <div class="form-container">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" name=degree id="degree" class="form-control" placeholder="Enter degree">
        </div>

        <div class="form-container">
            <label for="address" class="form-label">Address</label>
            <input type="text" name=address id="address" class="form-control" placeholder="Enter address">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<div class="skills">
    <h2>Skills</h2>

    <form method="post">
        <div class="form-container">
            <label for="skill1" class="form-label">Skill 1</label>
            <input type="text" name=content11 name=degree id="skill1" name="skill1" class="form-control" placeholder="Enter skill 1">
        </div>
        
        <div class="form-container">
            <label for="skill2" class="form-label">Skill 2</label>
            <input type="text" name=content22 id="skill2" name="skill2" class="form-control" placeholder="Enter skill 2">
        </div>

        <div class="form-container">
            <label for="skill3" class="form-label">Skill 3</label>
            <input type="text" name=content33 id="skill3" name="skill3" class="form-control" placeholder="Enter skill 3">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Home
                            </a>
                
                            <a class="nav-link" href="About.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                About
                            </a>

                            <a class="nav-link" href="portfolio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Portfolio
                            </a>


                            <a class="nav-link" href="Contact.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Contact
                            </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
