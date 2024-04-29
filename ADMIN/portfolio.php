<?php
   
    include '../server.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content4'])) {
        $content4 = mysqli_real_escape_string($connect, $_POST['content4']);

     
        $update_query = "UPDATE myworksdesc SET content4='$content4' WHERE id = 1"; 

 
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
            text-align: center; 
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid rgba(255, 255, 255, 0.5); 
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.3);
            color: black; 
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

        .section {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background-color: #0a4444; 
        }

        .card {
            text-align: center;
        }

        .card-header {
            background-color: rgba(255, 255, 255, 0.1);
            border-bottom: none;
        }

        .card-body {
            overflow: auto;
            font-size: 0.8rem;
        }

        .card-footer {
          
        }

        .nav-tabs {
            border-bottom: none;
        }

        .nav-link {
            color: white;
            border: none;
        }

        .nav-link.active {
            border-bottom: 2px solid white;
            font-weight: bold;
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
    <h1>Portfolio</h1>

    <div class="form-container" style="background-color: rgba(255, 255, 255, 0.1);"> 
        <label for="myWorksTitle" class="form-label">My Works</label>
        <form method="post">
            <input type="text" name="content4" id="myWorksTitle" class="form-control" placeholder="Enter form title">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="row">
    <div class="col-md-12 mb-3">
        <section id="intro" class="section position-relative overflow-hidden mx-auto">
            <div class="card text-center" style="background-color: rgba(255, 255, 255, 0.1);">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <label for="myWorksTitle" class="form-label">My Works</label>
                        </li>
                    </ul>
                </div>
                <div class="card-body overflow-auto" style="font-size: 0.8rem;">
                    <form method="post" id="introForm" action="insert_query.php" enctype="multipart/form-data">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><label for="lastname" style="font-weight: bold; color: white;">Project name</label></td>
                                    <td><input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo isset($lastName) ? $lastName : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><label for="introImg" class="form-label" style="font-weight: bold; color: white;">Projects</label></td>
                                    <td>
                                        <?php if(isset($savedIntroImg)) : ?>
                                            <img src="<?php echo $savedIntroImg; ?>" alt="Intro Image Preview" width="100"><br>
                                        <?php endif; ?>
                                        <input type="file" class="form-control-file" id="introImg" name="intro_img" onchange="previewImage('introImg', 'introImgPreview')">
                                        <img id="introImgPreview" src="#" alt="Preview" width="100" style="display: none;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary btn-sm" name="insertIntro">Submit</button>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </section>
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
                </div>
            </nav>
        </div>
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
