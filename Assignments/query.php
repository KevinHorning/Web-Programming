<?php include "query.html"; ?>

<table align = "center">
    <tr id = "headers">
        <td> Date </td>
        <td> Description </td>
        <td> Price </td>
    </tr>

<?php

    $conn = new mysqli("localhost", "khorning2", "khorning2");

    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);

    $conn->query("USE khorning2");

    $result = $conn->query("SELECT * FROM Purchases WHERE SupplierID = \"{$_POST['supplierID']}\"");

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) 
            echo "<tr><td>" . $row["Date"] . "</td><td>" . $row["Description"] . "</td><td>" . $row["Price"] . "</td></tr>";
    } 
    else 
        echo "<br> <h2> 0 results </h2>";

    $conn->close();
?>

</div></div></div></div>  
</body>
</table>
