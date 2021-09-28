<?php
 date_default_timezone_set('Europe/Madrid');
 $currenttime = date("m-d-Y H:i:s");
 list($ddd,$ttt) = explode(' ',$currenttime);
 echo "$ddd/$ttt\n";
?>