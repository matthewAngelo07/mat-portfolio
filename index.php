<?php
    include 'server.php';
?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($connect->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>

<?php
include 'server.php';

$sql = "SELECT * FROM intro WHERE id = 1"; 
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $logoPath = $row["logo"];
    $introImgPath = $row["intro_img"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $flex = $row["flex"];
    $socmed = $row["socmed"];
} else {
    $logoPath = "img/mat_logo.png"; 
    $introImgPath = "img/mypic.png"; 
    $firstname = "No data"; 
    $lastname = "No data"; 
    $flex = "No data"; 
    $socmed = "No data";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="style.css">
  
 
   
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Portfolio</title>
</head>

<body>

  
  <header>
   
    <ul class="navlist">
      <li class="active"><a href='#home'><i class="fa-solid fa-house"></i> Home</a></li>
      <li><a href='#about'><i class="fa-solid fa-user"></i> About</a></li>
      <li><a href='#portfolio'><i class="fa-solid fa-briefcase"></i> Portfolio</a></li>
      <li><a href='#contact'><i class="fa-solid fa-envelope"></i> Contact</a></li>
    </ul>
  </header>
  

  <main>
   
    <section id="home">
        <div class="home-text">
            <h1>I'm<span id="matt">
    <?php 
    include 'server.php'; 
    
    
    $sql = "SELECT * FROM nname";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<span>{$row['name']}</span>";
        }
    } else {
        echo "<p>No information available</p>";
    }
    ?></span></h1>
           
            <p> <?php 
    include 'server.php'; 
    
  
    $sql = "SELECT * FROM mydesc";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>{$row['contentdesc']}</p>";
        }
    } else {
        echo "<p>No information available</p>";
    }
    ?>
    </p>
        </div>
   <div id="profile">
  <a href="http://localhost/mat.portfolio/admin/login.php">
    <img src="img/matthew.png" id="pro" alt="Profile Image">
  </a>
</div>
    </section>
  
<section id="about">
    <h1 class="sub-heading">About Me</h1>

    <j2>
    <?php 
    include 'server.php'; 
    
    
    $sql = "SELECT * FROM about_desc";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>{$row['content']}</p>";
        }
    } else {
        echo "<p>No information available</p>";
    }
    ?>

    <div class="about-col">
       
        <div class="info-col">
          <j2>
            <?php 
            
            $sql = "SELECT * FROM prof";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h2>{$row['content1']}</h2>";
                }
            } else {
                echo "<h2>No information available</h2>";
            }
            
            
        
            $sql = "SELECT * FROM profdesc";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p>{$row['content2']}</p>";
                }
            } else {
                echo "<p>No information available</p>";
            }
            ?>
            </j2>
            
            <div class="icon-list-col">
    <div class="icon-list">
        <ul>
            <?php 
            include 'server.php'; 
           
            $sql = "SELECT * FROM basicinfo WHERE id = 1"; 
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><i class='fa-solid fa-angle-right'></i> <strong>Age:</strong> <span>{$row['age']}</span></li>";
                    echo "<li><i class='fa-solid fa-angle-right'></i> <strong>Birthday:</strong> <span>{$row['birth']}</span></li>";
                    echo "<li><i class='fa-solid fa-angle-right'></i> <strong>Phone:</strong> <span>{$row['phone']}</span></li>";
                }
            } else {
                echo "<li>No information available</li>";
            }
            ?>
        </ul>
    </div>

    <div class="icon-list">
        <ul>
            <?php 
          
            $sql = "SELECT * FROM basicinfo WHERE id = 1"; 
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><i class='fa-solid fa-angle-right'></i> <strong>School:</strong> <span>{$row['school']}</span></li>";
                    echo "<li><i class='fa-solid fa-angle-right'></i> <strong>Degree:</strong> <span>{$row['degree']}</span></li>";
                    echo "<li><i class='fa-solid fa-angle-right'></i> <strong>Address:</strong> <span>{$row['address']}</span></li>";
                }
            } else {
                echo "<li>No information available</li>";
            }
            ?>
        </ul>
    </div>
</div>
        </div>
    </div>


        <div class="skills-col">
    <h2>Skills</h2>
    <ul>
        <?php 
        include 'server.php';
        
        
        $sql = "SELECT * FROM skills WHERE id = 1"; 
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li><i class='fa-solid fa-angle-right'></i>{$row['content11']}</li>";
                echo "<li><i class='fa-solid fa-angle-right'></i>{$row['content22']}</li>";
                echo "<li><i class='fa-solid fa-angle-right'></i>{$row['content33']}</li>";
             
            }
        } else {
            echo "<li>No skills available</li>";
        }
        ?>
    </ul>
</div>

      </div>
    </section>
  
<section id="portfolio">
  <div class="heading">
    <h3>Portfolio</h3>
    <h2>My Works</h2>
    <p> 
    <?php 
  
    $sql = "SELECT * FROM myworksdesc";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>{$row['content4']}</p>";
        }
    } else {
        echo "<h2>No information available</h2>";
    }
    ?>
    </p>
  </div>

  <div class="portfolio-content">
    <div class="carousel">
        <?php 
        $sql = "SELECT * FROM intro";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $colCount = 1; 
            while($row = $result->fetch_assoc()) {
                $id = 'item_' . $colCount; 
                echo "<div class='col' id='$id'>"; 
                echo "<img src='ADMIN/{$row['intro_img']}'>";
                echo "<div class='layer'>";
                echo "<h3>{$row['lastname']}</h3>";
                echo "</div>";
                echo "</div>";
                $colCount++; 
            }
        }
        ?>
    </div>
</div>


    <button class="carousel-nav prev"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="carousel-nav next"><i class="fa-solid fa-chevron-right"></i></button>
  
  </div>
</section>

    <section id="contact">
    <h1 class="sub-heading">Contact</h1>
    <h>
        <?php 

        $sql = "SELECT * FROM cantactdesc";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p>{$row['content5']}</p>";
            }
        } else {
            echo "<h>No information available</h>";
        }
        ?>
    </h>
    <div style="margin-bottom: 30px;"></div> 
  
    <div class="icon-list">
        <ul>
            <?php 
            include 'server.php';
            
            $sql = "SELECT * FROM cantactinfo WHERE id = 1"; 
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><i class='fa-solid fa-angle-right'></i><strong>Email:</strong> <span>{$row['Email']}</span></li>";
                    echo "<li><i class='fa-solid fa-angle-right'></i><strong>Phone:</strong> <span>{$row['Phone']}</span></li>";
                    echo "<li><i class='fa-solid fa-angle-right'></i><strong>Address:</strong> <span>{$row['Address']}</span></li>";
                 
                }
            } else {
                echo "<li>No contact information available</li>";
            }
            ?>

          
<?php

$query = "SELECT fb AS facebook_link, insta AS instagram_link, git AS github_link FROM socials";
$result = mysqli_query($connect, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    echo '<div class="social-media">
            <ul>
                <li><i class="fa-brands fa-facebook"></i> <a href="' . $row['facebook_link'] . '">Facebook</a></li>
                <li><i class="fa-brands fa-instagram"></i> <a href="' . $row['instagram_link'] . '">Instagram</a></li>
                <li><i class="fa-brands fa-github"></i> <a href="' . $row['github_link'] . '">GitHub</a></li>
            </ul>
          </div>';
} else {
    echo "Error retrieving social media links: " . mysqli_error($connect);
}

mysqli_close($connect);
?>

        </ul>
    </div>
   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea><br>

    <button type="submit" class="btn btn-primary" style="background-color: #1e7e34; color: white; float: right;">Submit</button>

</form>
</section>

  </main>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.carousel').slick({
        slidesToShow: 3, 
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });

      $('.carousel-nav.prev').on('click', function() {
        $('.carousel').slick('slickPrev');
      });

      $('.carousel-nav.next').on('click', function() {
        $('.carousel').slick('slickNext');
      });

      $('.portfolio-content').show();
    });
  </script>

  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/aa5f332820.js" crossorigin="anonymous"></script>
</body>
</html>
