<p> <i> "Good morning, Dave," said HAL </i> </p>

<?php
	$radius = 5;
	print "Radus = ".(2*pi()*$radius);
?>

<br/>
<br/>

<?php
	$celfahr = 5.0;
	$cel = (5/9) * ($celfahr - 32);
	print "Farenheit = ".$celfahr;
	print "Celcius = ".$cel;
?>

<br/>
<br/>

<?php
	$string = "  PHP is fun  ";
	print "String has ".strlen($string)."characters";
?>

<br/>
<br/>

<?php
	$string = "WDWWLWWWLDDWDLL";
	$index = strpos("$string", "WWW");
	print "After 'WWW' is ".$string[$index + 3]
?>

<br/>
<br/>

<?php
	$string = "Some men interpret nine memos";
  	$letters = preg_replace('/\s+/', '', $string);
  	$isPalendrome = TRUE;
  
  	for ($i = 0; $i < strlen($letters) / 2; $i++){
      		if (strcasecmp($letters[$i], $letters[strlen($letters) - $i - 1]) != 0){
        		$isPalendrome = FALSE;
        		break;
      		}
  	}
  
    print "'".$string;
  	if ($isPalendrome)
      		print "' is a Palendrome";
  	else
      		print "' is not a Palendrome";
?>

<br/>
<br/>

<?php
	$num = 7;
        if ($num % 2 == 0){
        	print $num." is even";
    	}
    	else{
        	echo $num." is odd";
    	}
?>

<br/>
<br/>

<strong>
<?php
	if (date("L") ==1)
	    print "This year is a leap year";
	else
	    print "This year is not a leap year";
?>
</strong>