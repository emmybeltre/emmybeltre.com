<?php
  include('functions.php');

	$type = $_REQUEST['type'];
  echo getFolders($type);
?>

