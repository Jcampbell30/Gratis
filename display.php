<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Auto Wall</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>(423) 745-1962</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>LongofAthens@example.com</a>
                </div>
            </div>
            
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Long of Athens</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                       
                       
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <a href="login.php" class="nav-item nav-link">Cars</a>
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


<?php
// Retrieve the car details from the URL query parameters
$make = $_GET['make'];
$model = $_GET['model'];
$year = $_GET['year'];

// Database connection parameters
$host = 'localhost';
$dbname = 'gratis_db';
$username = 'root';
$password = '';

//image array
$images = [
    $imageOne = "img/car-rent-1.png",
    $imageTwo = "img/car-rent-2.png",
    $imageThree = "img/car-rent-3.png",
    $imageFour = "img/car-rent-4.png",
    $imageFive = "img/car-rent-5.png",
    $imageSix = "img/car-rent-6.png",
];



// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Database connection error: " . $mysqli->connect_error;
    exit();
}

// Prepare the car details for the database query
$make = $mysqli->real_escape_string($make);
$model = $mysqli->real_escape_string($model);
$year = $mysqli->real_escape_string($year);

// Query to check if the car exists in the database
$query = "SELECT color, price,details FROM cars WHERE make = '$make' AND model = '$model' AND year = '$year'";


// Execute the query
$result = $mysqli->query($query);

// Check if a matching car record exists
if ($result->num_rows > 0) {
    // Car found in the database, display the car details and images
    $car = $result->fetch_assoc();
    $price = $car['price'];
    $color = $car['color'];
    $details = $car['details'];

    
}
for($i=0; $i<sizeof($images);$i++){
    if($make == "Mercedez" && $model == "R3" && $year == "2015"){
        $my_image = $images[0];
    }
    if($make == "BMW" && $model == "i7" && $year == "2015"){
        $my_image = $images[1];
    }
    if($make == "AUDI" && $model == "Stingray" && $year == "2015"){
        $my_image = $images[2];
    }
    if($make == "AUDI" && $model == "Forester XL" && $year == "2015"){
        $my_image = $images[3];
    }
    if($make == "Mercedez" && $model == "Quatro" && $year == "2015"){
        $my_image = $images[4];
    }
    if($make == "AUDI" && $model == "Raptor" && $year == "2015"){
        $my_image = $images[5];
    }
}

// Close the database connection
$mysqli->close();

//dynamic display of the car details
echo "<div class='container-fluid bg-primary py-5'>";
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<img src='$my_image' alt='Image' class='img-fluid'>";
echo "<h1 class='text-white'>$year $make $model</h1>";
echo "<p class='text-light'>$details</p>";
echo "<ul class='list-group list-group-flush text-light'>";
echo "<li class='list-group-item bg-primary'><i class='fa fa-car mr-2'></i> $make</li>";
echo "<li class='list-group-item bg-primary'><i class='fa fa-car mr-2'></i> $model</li>";
echo "<li class='list-group-item bg-primary'><i class='fa fa-car mr-2'></i> $year</li>";
echo "<li class='list-group-item bg-primary'><i class='fa fa-car mr-2'></i> $price</li>";
echo "<li class='list-group-item bg-primary'><i class='fa fa-car mr-2'></i> $color</li>";
echo "</ul>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

?>   

<div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Long of Athens</a>. All Rights Reserved.</p>
    </div>