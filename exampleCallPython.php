<?php
 $param1 = "Somchai";
 $param2 = "Jaidee";
 $param3 = 56;
 $param4 = "bonus_seaw@hotmail.com";
 $command = "exampleCallByPHP.py";
 $command .= " $param1 $param2 $param3 $param4";
 header('Content-Type: text/html; charset=utf-8');
 echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
 $pid = popen($command,"r");
 echo "<body><pre>";
 while( !feof( $pid ) ) {
  echo fread($pid, 256);
 }
 pclose($pid);
 echo "</pre>";
 echo "Script final";
?>
