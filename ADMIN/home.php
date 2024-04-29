<?php

include '../server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);

    $update_query = "UPDATE nname SET name='$name' WHERE id = 1";

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contentdesc'])) {
    $contentdesc = mysqli_real_escape_string($connect, $_POST['contentdesc']);

    $update_query = "UPDATE mydesc SET contentdesc='$contentdesc' WHERE id = 1"; 

   
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
        <h1>Home</h1>

        <div class="form-container">
            <label for="myWorksTitle" class="form-label">Name</label>
            <form method="post">
                <input type="text" name=name id="myWorksTitle" class="form-control" placeholder="Enter form title">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


   
        <div class="form-container">
            <label for="uploadWorksTitle" class="form-label">My Description</label>
            <form method="post">
                <input type="text" name=contentdesc id="uploadWorksTitle" class="form-control" placeholder="Enter form title">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
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
