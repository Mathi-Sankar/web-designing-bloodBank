
<html>
    <head>
        <title>Find</title>
        <style>
            /* Add a black background color to the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #115990;
  }
  
  /* Style the links inside the navigation bar */
  .topnav a:not(.search) {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }
  
  /* Style the "active" element to highlight the current page */
  .topnav a.active {
    background-color: #1f6598;
    color: white;
  }
  
  /* Style the search box inside the navigation bar */
  .topnav input[type=text] {
    float: right;
    padding: 6px;
    border: none;
    margin-top: 8px;
    margin-right: 16px;
    font-size: 17px;
  }
  
  /* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
  @media screen and (max-width: 600px) {
    .topnav a, .topnav input[type=text] {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
    }
    .topnav input[type=text] {
      border: 1px solid #ccc;
    }
  }
  *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    margin-top: 100px;
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
        </style>
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="home page 2.html">Home</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
            <form method = "POST">
                <button id = "search" style="margin-left: 650px;text-align : center;background-color:cyan;border-radius:5px;
                border:black;padding:10px 15px;margin-top:5px">Search</button>
                <input type="text" placeholder="Blood type" maxlength="3" name = "bld">
                <input type="text" placeholder="Pincode" maxlength="6" type="number" name = "pin">
            </form>
          </div>
          <div class = "elements">
            
          </div>
    </body>
</html>
<?php
error_reporting(E_ERROR | E_PARSE);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bs_new";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
if(($_POST["bld"]) != NULL && ($_POST["pin"]) != NULL)
{
    $blood = $_POST['bld'];
    $pinc = $_POST['pin'];
    $result = mysqli_query($conn,"SELECT * FROM  bs_volunteer where Blood_type = '$blood' && pincode = '$pinc'");
}
else{
$result = mysqli_query($conn,"SELECT * FROM  bs_volunteer");
}
echo "<table class='fl-table'>
    <thead>
     <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>DOb</th>
        <th>Blood type</th>
        <th>Contact</th>
        <th>Pincode</th>
    </tr>
    </thead>";
    echo "<tbody>";
     while($row = $result->fetch_assoc())
     { 
        echo "<tr>
                <td>" . $row["First_Name"]. "</td>
                <td>" . $row["Last_Name"]. "</td>
                <td>" . $row["Email"]. "</td>
                <td>" . $row["Gender"]. "</td>
                <td>" . $row["Date_of_Birth"]. " </td>
                <td>" . $row["Blood_type"]. "</td>
                <td>" . $row["Contact"]. "</td>
                <td>" . $row["Pincode"]. "</td>
              </tr>";
     }
     echo "</tbody>";
    echo "</table>";
     

?>