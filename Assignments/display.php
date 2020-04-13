<head>
  <title> Purchase Table </title>
</head>
<style>
  ul {
    font-family: helvetica;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }
  li {
    display: inline;
    float: left;
    font-family: helvetica;
  }
  li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-family: helvetica;
  }
  .center {
    margin: auto;
    width: 60%;
    border: 3px #ffffff;
    padding: 10px;
  }
  #leftside {
    position: absolute;
    left:20px;
    top:10px;
  }
  #otherside {
    float: right;
    margin-top: 0px;
    margin-right: 20px;
  }
  .rightcolumn {
    float: left;
    width: 100%;
    background-color: #f1f1f1;
    padding-left: 20px;
    font-family: helvetica;
  }
  body {
    font-family: helvetica;
    padding: 10px;
    background: #f1f1f1;
  }
  .card {
    background-color: white;
    padding: 20px;
    margin-top: 20px;
  }
  #headers {
    border-collapse: collapse;
    width: 100%;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: rgb(27, 27, 27);
    color: white;
  }
  #headers tr:nth-child(even){
    background-color: #f2f2f2;
  }
  #headers tr:hover {
    background-color: #ddd;
  }  
  #headers td, #headers th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  table, th, td {
    border: 1px solid black;
  }
  th, td {
    padding: 15px;
    text-align: left;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  h1 {
      text-align: center;
  }
</style>
<body>
  <div id="leftside">
    <ul>
      <li><a href="index.html">HOME</a></li>
    </ul>
  </div>
  <div id="otherside">
    <ul>
      <li><a href="display.php">TABLE</a></li>
      <li><a href="newPurchase.html">NEW PURCHASE</a></li>
      <li><a href="query.html">SEARCH</a></li>
      <li><a href="http://codd.cs.gsu.edu/~khorning2/index.html">INDEX</a></li>
    </ul>
  </div>
  <br>
  <br>
  <br>
  <div class="center">
    <div class="row">
      <div class="leftcolumn">
        <div class="card">
          <h1> Purchases Table</h1>
          
          <table>
            <tr id = "headers">
              <td> Purchase Number </td>
              <td> Supplier Number </td>
              <td> Date </td>
              <td> Quantity </td>
              <td> Description </td>
              <td> Price </td>
            </tr>
          
            <?php

              $conn = new mysqli("localhost", "khorning2", "khorning2");

              if ($conn->connect_error) 
                die("Connection failed: " . $conn->connect_error);

              $conn->query("USE khorning2");

              $result = $conn->query("SELECT * FROM Purchases");

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) 
                  echo "<tr><td>" . $row["PurchaseNo"] . "</td><td>" . $row["SupplierID"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["Quantity"] . "</td><td>" . $row["Description"] . "</td><td>" . $row["Price"] . "</td></tr>";
              } 
              else 
                echo "<br> 0 results";

              $conn->close();
            ?>

    </table>

</body>

        </div>
      </div>
    </div>
</body>