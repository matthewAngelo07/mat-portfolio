<?php
include '../server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM account WHERE username = ? AND password = ?";
    $statement = $connect->prepare($query);
    $statement->bind_param('ss', $username, $password);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        header("Location: index.php");
        exit; 
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color:#0a4444;
    }
</style>
<body>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputUsername" name="username" type="text" placeholder="Username" required />
                                        <label for="inputUsername">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <input type="submit" class="btn btn-primary" value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
