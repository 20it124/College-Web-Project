<?php
ob_start();

// session start 
session_start();

  //include DBconnect
  include "Required/_DBconnect.php";

  $sqll = "SELECT cname, fee, address, phone, website FROM `collegename` WHERE cname LIKE 'Adani%'";
  $ans = mysqli_query($con, $sqll);
  $num = mysqli_fetch_assoc($ans);

  $sql = "SELECT * FROM `Adani institute`";
  $result = mysqli_query($con, $sql);

//Find the number of records returned
//   $num_rows = mysqli_num_rows($result);

// echo "Number: ".$num_rows;
  $results = [];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCUMENT</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Link  -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&family=Playfair+Display&display=swap"
        rel="stylesheet">

    <!-- <link rel="stylesheet" href="cssFile/DynamicCollege.css"> -->


    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .head{
            text-align: center;
        }

        /* @media screen and (max-width:520px) {
            .clgData{
                text-align: center;
            }
        } */

        .main .item a:hover {
            color: white;
        }

        .mt-2 {
            margin-top: 1.3rem !important;
        }

        .description {
            max-width: fit-content;
            background-color: #c1bdbd;
            font-family: 'Noticia Text', serif;
            border: 3px solid black !important;
        }

        .description .item {
            list-style: none;
        }

        .description .item a {
            text-decoration: none;
            color: black;
        }

        .super {
            background-image: linear-gradient(180deg, rgb(88, 88, 88), rgb(111, 143, 81));
            color: white;
        }

        .super .container {
            text-align: center;
            background-color: darkgray;
            border-style: dashed !important;
        }

        .foram {
            background-color: bisque;
            max-width: fit-content;
            margin-bottom: 2.0rem;
            padding-bottom: 0.2rem;
            font-weight: bolder;
        }

        td,
        tfoot,
        th,
        thead,
        tr {
            border-style: initial !important;
        }
    </style>
</head>

<body>

    <!-- navbar include  -->
    <?php 
        require "Required/_navbar.html"
    ?>

    <?php
        // echo $_SESSION['clgNmae'];
    ?>
    <!-- <input type="" id="Click" name="Click" value="" /> -->

    <div class="justify-content-center description container-fluid main border-4 rounded mt-2">
        <div class="row">
            <div class="col-12">
                <?php echo "<h1 class='head'>".$num['cname']."</h1>"?>
                <ul class="clgData">
                    <?php echo "<li class='item'>
                        <img src='./logo1x/location.png' alt='Location' width='19px' /> " .$num['address']."
                    </li>";?>

                    <?php echo "<li class='item'>
                        <img src='./logo1x/call.png' alt='Contact' width='17px' /> " .$num['phone']."
                    </li>";?>

                    <?php echo "<li class='item'>
                        <a href='https://aii.ac.in' target='_blank'><img src='./logo1x/web.png' alt='' width='16px' height='16px' /> " .$num['website']."</a>
                    </li>";?>

                    <?php echo "<li class='item' id='fees'>
                        <img src='./logo1x/rupee.png' alt='' width='19px' /> " .$num['fee']."</li>";?>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid data table-responsive ">
        <div class="row">
            <div class="col-12">
                <table id="intake" class="super table border border-dark border-2 rounded mt-4">
                    <thead>
                        <tr class="thead-color">
                            <th scope="col">Branch</th>
                            <th scope="col">Intake</th>
                            <th scope="col">SQ&emsp;</th>
                            <th scope="col">AIQG</th>
                            <th scope="col">AIQJ</th>
                            <th scope="col">Filled</th>
                            <th scope="col">Vacant</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                            // Display the rows returned by the sql query
                            while($row = mysqli_fetch_assoc($result)){
                                $results[][] = $row;
                                echo "                 
                                    <td>". $row['branch'] . "</td>
                                    <td>". $row['intake'] . "</td>
                                    <td>". $row['sq'] ."</td>
                                    <td>". $row['aiqg'] . "</td>
                                    <td>". $row['aiqj'] . "</td>
                                    <td>". $row['filled'] ."</td>
                                    <td>". $row['vacant'] ."</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container-fluid data table-responsive">
        <div class="row">
            <div class="col-12">
                <table id="cutoff" class="super table border border-dark border-2 rounded mt-4">
                    <thead>
                        <tr>
                            <th class="container" colspan="7">Cutoff</th>
                        </tr>
                        <tr class="thead-color">
                            <th scope="col">Branch</th>
                            <th scope="col">OPEN</th>
                            <th scope="col">EWS</th>
                            <th scope="col">SEBC</th>
                            <th scope="col">SC</th>
                            <th scope="col">ST</th>
                            <th scope="col">TFWS</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        foreach($results as $orientation => $rows){
                            foreach($rows as $row){
                                echo "                 
                                <td>". $row['branch'] . "</td>
                                <td>". $row['open'] . "</td>
                                <td>". $row['ews'] ."</td>
                                <td>". $row['sebc'] . "</td>
                                <td>". $row['sc'] . "</td>
                                <td>". $row['st'] ."</td>
                                <td>". $row['tfws'] ."</td>
                                </tr>";
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <footer id="foot">
        <pre class="foram container-fluid justify-content-center border border-dark border-2 rounded mt-4">
    Intake = Total Seats in 2021
    AIQG = All India Quota based on Gujcet
    AIQJ = All India Quota based on JEE(Main) Paper-1
    SQ = Seats to be filled by ACPC
</pre>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous">
        </script>

        <script>
            document.getElementById('Click').value = username; 
        </script>

        <?php
            // $_SESSION['clgName'] = "";
            // session_unset();
            // session_destroy();
            ob_end_flush();
        ?>
</body>

</html>