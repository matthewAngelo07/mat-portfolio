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
        <div id="layoutSidenav_content">
            <main>


<section id="dashboard" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
                                <h5 class="card-title">MESSAGES</h5>
                                <form method="POST" action="delete.php">
                                    <table class="table" style="color:white">
                                        <thead>
                                            <tr style="color:white">
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    
                                            include '../server.php';

                                            $sql = "SELECT id, name, email, message FROM message";
                                            $result = $connect->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td><input type='checkbox' name='message_ids[]' value='" . $row["id"] . "'></td>";
                                                    echo "<td>" . $row["name"] . "</td>";
                                                    echo "<td>" . $row["email"] . "</td>";
                                                    echo "<td>" . $row["message"] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td class='text-center' colspan='4'>No messages found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="card-footer">
                                        <?php
                                        $sql_count = "SELECT COUNT(*) AS message_count FROM message";
                                        $result_count = $connect->query($sql_count);
                                        $row_count = $result_count->fetch_assoc();
                                        $message_count = $row_count['message_count'];

                                        if ($message_count > 0) {
                                            echo '<button type="submit" class="btn btn-danger" name="delete_messages">Delete</button>';
                                        }
                                        ?>
                                    </div>
                                </form>
                            </section>
    


                    </div>
                </div>
            </main>
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
