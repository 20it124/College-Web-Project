<!-- INSERT INTO `collegename` (`sno`, `cname`, `fee`, `ctype`) VALUES ('1', 'Adani Institute of infrastructure Engineering,  Ahmedabad', '1,65,000 / Year', 'Self Finance'); -->

<?php
ob_start();
session_start();
// $set = false;

  //include DBconnect
  include "Required/_DBconnect.php";
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font Link  -->
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&family=Playfair+Display&display=swap"
    rel="stylesheet">
  <title>Colleges</title>

  <!-- jQuery cdn  required for datatables-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

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
    }
  </style>

</head>

<body>

  <!-- navbar include  -->
  <?php 
        require "Required/_navbar.html"
  ?>

  <div class="container my-4">
    
    <input type="" id="btnClick" name="btnClick" value="" />

    <table class="table hover row-border"  id="myTable">
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
        <!-- <?php
            $sql = "SELECT * FROM `collegename`";
            $result = mysqli_query($con, $sql);
            //Display the rows returned by the sql query
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr class='data_fetch' id=d".$row['sno'].">                    
                    <td>". $row['name'] . "</td>
                    <td>". $row['fees'] . "</td>
                    <td>". $row['type'] ."</td>
                </tr>";
            }
        ?> -->
        
        
      </tbody>
    </table>
  </div>

  <!-- Footer include  -->
  <!-- <?php 
        // include "Required/_Footer.html"
  ?> -->

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
        // console.log(data);
        
        // document.cookie = "myVar = "+data1;


        document.getElementById("btnClick").value = data1;
        // console.log(document.getElementById("btnClick").value);
      });
    });

  </script>


  <?php
    // echo " value is: <script>document.writeln(data1);</script>";
    // $_SESSION['clgName'] = $_COOKIE['myVar'];
    // echo "value is: ".$_SESSION['clgName'];
  ?>


<?php        
    // if(isset($_SESSION['clgName'])){
    //     header("location : DynamicCollege.php");
    // }
    
    ob_end_flush();
?>

</body>

</html>