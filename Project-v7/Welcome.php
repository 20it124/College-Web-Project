<?php
ob_start();

//session start
session_start();

$_SESSION['meritNumber'] = "";
$_SESSION['category'] = "";
$_SESSION['collegeType'] = "";

if($_SERVER['REQUEST_METHOD']  == 'POST'){
    $_SESSION['meritNumber'] = $_POST['MeritNumber'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['collegeType'] = $_POST['CollegeType'];

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

            <div class="mb-3">
                <label for="Branch" class="form-label label-font">Category:</label>
                <select id="category" name="category" class="form-select form-input" aria-label="Default select example">
                    <option selected class="select">Select Category</option>
                    <!-- <option>CE</option>
                    <option>CSE</option>
                    <option>IT</option>
                    <option>ICT</option>
                    <option>EC</option>
                    <option>Civil</option>
                    <option>Chemical</option>
                    <option>Mechanical</option>
                    <option>Electrical</option>
                    <option>Automobile</option>
                    <option>Mechatronic</option> -->

                    <option>OPEN</option>
                    <option>EWS</option>
                    <option>SEBC</option>
                    <option>SC</option>
                    <option>ST</option>

                </select>
            </div>

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