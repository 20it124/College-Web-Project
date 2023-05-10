<?php
ob_start();
session_start();

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

    /* anchor tag in datatable */
    .listName{
      text-decoration: none;
      color: black;
    }

    @media screen and (max-width: 1190px) {
      .container, .container-sm {
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


  <!-- Data Table -->
  <div class="container my-4">
    <table class="table hover row-border"  id="myTable">

      <thead>
        <tr>
          <th scope="col">Collage Name</th>
          <th scope="col">Fees(₹)</th>
          <th scope="col">Collage Type</th>
        </tr>
      </thead>


      <tbody>
        <?php
            $sql = "SELECT * FROM `collegename`";
            $result = mysqli_query($con, $sql);
            //Display the rows returned by the sql query
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr class='data_fetch' onclick='my_function()' id=d".$row['sno'].">                    
                    <td> <a href='DynamicCollege.php?id=".$row['id']."' class='listName'>".$row['cname']. "</a> </td>
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


  <!-- <script language="javascript" type="text/javascript">
    var fetch = document.getElementsByClassName('data_fetch');
    Array.from(fetch).forEach((element) => {
      element.addEventListener("click", (e) => {

        tr = e.target.parentNode;
        var data1 = tr.getElementsByTagName("td")[0].innerText;
        var data2 = tr.getElementsByTagName("td")[1].innerText;
        var data3 = tr.getElementsByTagName("td")[2].innerText;
        
        // document.cookie = "myVar = "+data1;


        document.getElementById("btnClick").value = data1+data2+data3;
      });
    });

  </script> -->




<?php        
    ob_end_flush();
?>

</body>

</html>