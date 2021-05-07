<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "capstone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
            <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>


<!-- Custom styles for this template -->
<link href="mainmenu.css" rel="stylesheet">
<body>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
<symbol id="check" viewBox="0 0 16 16">
<title>Check</title>
<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</symbol>
</svg>

<div class="container py-3">
<header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
<a href="/" class="d-flex align-items-center text-dark text-decoration-none">
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
  <span class="fs-4">Search Records</span>
</a>

<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
  <a class="me-3 py-2 text-dark text-decoration-none" href="mainmenu.php">Main Menu</a>
  <a class="py-2 text-dark text-decoration-none" href="#">Logout</a>
</nav>
</header>
      <title></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      
    </head>
    <body>

    <div class="container">
        <br><br>
        <div class="col-md-5">
      <form action="" method="get">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search Resturant Name"/>
        </div>
        <div class="form-group">
            <input type="submit" name="search_btn" class="btn btn-default" value="Search"/>
        </div>
      </form>

      <?php
        if(isset($_GET['search_btn'])){

            $search_var = $_GET['search'];

            $sql = "SELECT * FROM application WHERE resturant_name LIKE '%".$search_var."%'";
            if($res = $conn->query($sql)){
        ?>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Resturant id</th>
                    <th>Resturant Name</th>
                  </tr>
                </thead>
                <tbody>
        <?php
            if($res->num_rows > 0){

                while($row = $res->fetch_assoc()){
        ?>
                    <tr>
                        <td><?php echo $row['resturant_id'];?></td>
                        <td><?php echo $row['resturant_name'];?></td>
                    </tr>
        <?php   
                }   
            }
            else
            {
        ?>
                <tr>
                    <td colspan="2">Not Found<?php echo $conn->error;?></td>
                </tr>   
        <?php       
            }
        ?>
                </tbody>
            </table>
        <?php
            }
            else
            {
                echo "Failed".$sql;
            }
        }
      ?>
      </div>
    </div>

    </body>