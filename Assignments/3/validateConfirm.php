<?php
    include 'validationUtilities.php';

    $vDate = isValidDate($_POST["birthday"]);
    $vAge = flsValidRange($_POST["age"], 10, 80);
    $vZip = flsValidZipcode($_POST["zip"]);

    if ($vDate && $vAge && $vZip)
        echo "Verification complete, no errors";

    echo "<br/>";
    echo '<a href = "http://codd.cs.gsu.edu/~khorning2/Assignments/Assignment3/validate.html"> Go Back </a>';
?>
