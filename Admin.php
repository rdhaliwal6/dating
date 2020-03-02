<?php
$username = "rdhaliwa_dating";
$password = "veL@8ApB@9ta";
$hostname = "localhost";
$database = "rdhaliwa_dating";
$cnxn = mysqli_connect($hostname, $username, $password, $database);
?>
<!--/**-->
<!--* Rajpreet Dhaliwal-->
<!--* 1/16/20-->
<!--* /328/dating/views/Summary.html-->
<!--* summary page of the dating website-->
<!--*/-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../dating/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../dating/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../dating/favicon/favicon-16x16.png">
    <link rel="manifest" href="../dating/favicon/site.webmanifest">
    <link rel="mask-icon" href="../dating/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom stylesheet -->
    <link href="../dating/styles/dating.css" rel="stylesheet">
    <!-- Custom font -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <title>Profile</title>

</head>
<body>
<!-- Adding navbar -->
<nav class="navbar navbar-light bg-light">
    <a href="../dating" class="navbar-brand mb-0 h1">Dating PNW</a>
    <a href="Admin.php" class="navbar-brand">admin</a>
</nav>

<div class="container container-fluid">
    <table id="myTable" class="display table table-striped ">
        <thead class="thead-dark">
        <?php
        //Create Query that selects the column names
        $columnSQL = "SELECT * FROM member LIMIT 1";
        //Retrieve column names from database
        $columnResult = mysqli_query($cnxn, $columnSQL);
        //Iterate so long as we have data to pull
        while ($row = mysqli_fetch_assoc($columnResult)){
            //Construct the columns with the names
            echo "<tr>";
            //Iterate through the array and display each column name in a table head
            foreach ($row as $k => $v){
                echo "<th>$k</th>";
            }
            echo "</tr>";
        }
        ?>
        </thead>
        <tbody>
        <?php
        //Create query that selects data stored in each field and display the value each ethnicity rather than the key value
        $dataSQL ="SELECT * FROM `member`";
        //Retrieve the data from the database
        $dataResult = mysqli_query($cnxn, $dataSQL);
        //Iterate so long as we have data to pull
        while ($row2 = mysqli_fetch_assoc($dataResult)){
            //Construct rows to insert retrieved data
            echo "<tr>";
            //Iterate through the array to display each data set related to each column
            foreach ($row2 as $k => $v){
                echo "<td>$v</td>";
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    $('#myTable').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
</script>
</body>
</html>