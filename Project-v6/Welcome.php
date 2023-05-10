<?php
ob_start();

//session start
session_start();

$_SESSION['meritNumber'] = "";
$_SESSION['branch'] = "";
$_SESSION['collegeType'] = "";

if($_SERVER['REQUEST_METHOD']  == 'POST'){
    $_SESSION['meritNumber'] = $_POST['MeritNumber'];
    $_SESSION['branch'] = $_POST['Branch'];
    $_SESSION['collegeType'] = $_POST['CollegeType'];

    // Set connection variable
    // $server = "localhost";
    // $username = "root";
    // $password = "";

    // Create a database connection
    // $con = mysqli_connect($server, $username, $password);

    // Check for connection success 
    // if(!$con){
    //     die("Connection to this database failed due to". mysqli_connect());
    // }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Link  -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&family=Playfair+Display&display=swap"
        rel="stylesheet">

    <!-- form css link  -->
    <link href="cssFile/_form.css" rel="stylesheet">

    <!-- footer css link  -->
    <!-- <link href="Required/_footer.css" rel="stylesheet"> -->

    <title>Welcome</title>
</head>

<body>

    <!-- navbar include  -->
    <?php 
        require "Required/_navbar.html"
    ?>

    <!-- form include  -->
    <div class="container ">
        <form action="Welcome.php" method="post">
            <div class="mb-3 merit">
                <label for="MeritNumber" class="form-label label-font">Merit Number:</label>
                <input type="number" class="form-control form-input" id="MeritNumber" name="MeritNumber"
                    placeholder="Enter Merit Number">
            </div>

            <!-- <div class="mb-3">
                <label for="Branch" class="form-label label-font">Branch:</label>
                <select id="Branch" name="Branch" class="form-select form-input" aria-label="Default select example">
                    <option selected class="select">Select Branch</option>
                    <option>CE</option>
                    <option>CSE</option>
                    <option>IT</option>
                    <option>ICT</option>
                    <option>EC</option>
                    <option>Civil</option>
                    <option>Chemical</option>
                    <option>Mechanical</option>
                    <option>Electrical</option>
                    <option>Automobile</option>
                    <option>Aircraft Maintanance</option>
                    <option>Aeronautical</option>
                    <option>Agricultural</option>
                    <option>Bio-medical</option>
                    <option>Bio-Technology</option>
                    <option>Dairy Technology</option>
                    <option>Electronics</option>
                    <option>Environmental</option>
                    <option>Fire and Safety Engineering</option>
                    <option>Food Processing Technology</option>
                    <option>IC</option>
                    <option>Industrial</option>
                    <option>Infrastructure</option>
                    <option>IOT</option>
                    <option>Manufacturing</option>
                    <option>Marine</option>
                    <option>Mechatronics</option>
                    <option>Metallurgical</option>
                    <option>Mining</option>
                    <option>Nano</option>
                    <option>Petrochemical</option>
                    <option>Petroleum</option>
                    <option>Pharmaceutical</option>
                    <option>Plastic</option>
                    <option>Power Wlectronics</option>
                    <option>Production</option>
                    <option>Robotics & Automation</option>
                    <option>Rootics & Artificial Intelligence</option>
                    <option>Rubber</option>
                    <option>Textile</option>
                    <option>Water Management</option>
                </select>
            </div> -->

            <div class="mb-3">
                <label for="CollegeType" class="form-label label-font">College Type:</label>
                <select id="CollegeType" name="CollegeType" class="form-select form-input"
                    aria-label="Default select example">
                    <option selected>Select College Type</option>
                    <option>ALL</option>
                    <option>Government</option>
                    <option>Self Finance</option>
                </select>
            </div>

            <div class="btn-container">
                <button class="form-btn" type="submit" name="submit" value="submit" onclick="description()">Show</button>
                <button class="form-btn" type="reset">Reset</button>
            </div>

    </div>

    <?php
        if(isset($_POST['submit'])){
            // $merit = $_POST['MeritNumber'];
            // $branch = $_POST['Branch'];
            // $tpe = $_POST['CollegeType'];
            header("location:DynamicCollageList.php");
        }
    ?>


    <!-- Footer include  -->
    <!-- <?php 
        require "Required/_footer.html"
    ?> -->


    <?php
    // his typically occurs when there is unintended output from the script before you start the session. With your current code, you could try to use output buffering to solve it. try adding a call to the ob_start(); function at the very top of your script and ob_end_flush(); at the very end of the document.
        ob_end_flush();
    ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        
</body>
</html>