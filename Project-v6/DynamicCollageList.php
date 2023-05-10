
<?php

// session start
session_start();

$ctype = $_SESSION['collegeType'];
$branchRank = $_SESSION['branch'];
$rank = $_SESSION['meritNumber'];

// echo $branchRank;

//include DBconnect
include "Required/_DBconnect.php";


$sql = "SELECT * FROM `collegename` WHERE ctype = '{$ctype}' and branch_rank LIKE '%{$branchRank}%'";   // Please Complete the query
$result = mysqli_query($con, $sql);

//Find the number of records returned
// $num_rows = mysqli_num_rows($result);

// echo "Number: ".$num_rows;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collage Finder</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Link  -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&family=Playfair+Display&display=swap"
        rel="stylesheet">

    <!-- jQuery cdn  required for datatables-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- for data table cdn-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


    <!-- Written CSS  for data table-->
    <style>
        table.dataTable tbody th,
        table.dataTable tbody td {
            cursor: pointer;
        }


        .dataTables_wrapper .dataTables_filter input {
            /* padding: 3px; */
            border-radius: 0px;
        }

        @media screen and (max-width: 1190px) {

            .container,
            .container-sm {
                max-width: 95%;
            }
        }
    </style>


</head>

<body>


    <!-- navbar include  -->
    <?php 
        require "Required/_navbar.html"
    ?>

    <input type="" id="btnClick" name="btnClick" value="" />

    <div class="container my-4">
        <table class="table hover row-border" id="myTable">
            <thead>
                <tr>
                    <!-- <th scope="col">Sno</th> -->
                    <th scope="col">Collage Name</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Collage Type</th>
                </tr>
            </thead>
            <tbody>

            <!--  <th scope='row'>". $row['sno'] . "</th> -->
            <?php
      
            //Display the rows returned by the sql query
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr class='data_fetch' id=d".$row['sno'].">                    
                    <td>". $row['cname'] . "</td>
                    <td>". $row['fee'] . "</td>
                    <td>". $row['ctype'] ."</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


    <!-- data table javascript  -->
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {

            $('#myTable').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
            });
        });
    </script>


    <script language="javascript" type="text/javascript">
    // <!-- Selection Script  -->
    //Event listner
    var fetch = document.getElementsByClassName('data_fetch');
    Array.from(fetch).forEach((element) => {
      element.addEventListener("click", (e) => {
        // console.log("data_fetch", e.target);
        tr = e.target.parentNode;
        // console.log(tr);
        var data1 = tr.getElementsByTagName("td")[0].innerText;
        var data2 = tr.getElementsByTagName("td")[1].innerText;
        var data3 = tr.getElementsByTagName("td")[2].innerText;
        console.log(data1);
        
        document.getElementById("btnClick").value = data1;
        // console.log(document.getElementById("btnClick").value);
      });
    });

    <!-- <?php
        // echo $ctype;
        // echo $branch;
        // echo $rank;
    ?> -->

</body>

</html>