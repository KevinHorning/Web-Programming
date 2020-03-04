<form method="post" action="index.php">
    Text Color:
    <select name = "color">
        <option value = "red"> Red </option>
        <option value = "blue"> Blue </option>
        <option value = "green"> Green </option>
        <option value = "yellow"> Yellow </option>
    </select>
    <br/>

    Font Family:
    <select name = "font">
        <option value = "arial"> Arial </option>
        <option value = "roman"> Roman </option>
        <option value = "helvetica"> Helvetica </option>
        <option value = "verdana"> Verdana </option>
    </select>
    <br/>

    Text Size:
    <select name = "size">
        <option value = "8"> 8 </option>
        <option value = "16"> 16 </option>
        <option value = "32"> 32 </option>
        <option value = "64"> 64 </option>
    </select>
    <br/>

    <textarea name = "text"> </textarea>
    <br/>

    <input type = "submit" value = "Sumbit"> </input> 
</form>

<p> <?php echo $_POST["text"] ?> </p>

<style>
    p {
        color: <?php echo $_POST["color"]; ?>;

        font-family: 
        <?php
            if ($_POST["font"] == "Roman")
                echo "Times New Roman";
            else   
                echo $_POST["font"];
        ?>;    

        font-size: <?php echo $_POST["size"]; ?>;
    }

    .evens {
        background-color: blue;
    }
    .odds {
        background-color: green;
    }
</style>


<?php 
        function get_hour_string($timestamp){
            return substr($timestamp, 0, 2).":00 ".substr($timestamp, 6, 8);
        }

        function get_hour_list($firstHour, $numHours){
            $hour = substr($firstHour, 0, 2);
            $AM_PM = substr($firstHour, 6, 8); 
            $hoursList = array();
            
            for ($i = 0; $i < $numHours; $i++){
                if ((int)$hour + $i >= 12){
                    if ((int)$hour + $i == 12){
                        if ($AM_PM == "AM")
                            $AM_PM = "PM";
                        else 
                            $AM_PM = "AM";
                    }
                    if ((int)$hour + $i == 12)
                        array_push($hoursList, "12:00 ".$AM_PM);
                    else
                        array_push($hoursList, (((int)$hour + $i) % 12).":00 ".$AM_PM);
                }
                else 
                    array_push($hoursList, ((int)$hour + $i).":00 ".$AM_PM);
            }
            
            return $hoursList;
        }
        
        echo "Today is ".date("l F j, Y");
        date_default_timezone_set("America/New_York");
        echo " <table> <tr> <td> Hour </td> <td> Person 1 </td> <td> Person 2 </td> <td> Person 3 </td> </tr>"; 

        $startHour = get_hour_string(date("h:i A"));
        $hours_to_show = 6;
        $hourList = get_hour_list($startHour, $hours_to_show);
        
        for ($i = 0; $i < sizeof($hourList); $i++){
            if ($i % 2 == 0)
                echo "<tr class = \"evens\"><td>".$hourList[$i]."</td><td></td><td></td><td></td></tr>";
            else
                echo "<tr class = \"odds\"><td>".$hourList[$i]."</td><td></td><td></td><td></td></tr>";
        }
?>
</table>