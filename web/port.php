<?php include 'header.php'; ?>
<?php
	if (isset($_REQUEST['type'])) {
	    $type=$_REQUEST['type'];
	} else{
	    $type="print";
	}
	if (isset($_REQUEST['art'])) {
	    $art=$_REQUEST['art'];
	} else{
	    $art="";
	}
?>

<div id="portDetail">
	<div id="portDetailLeft">
		<?php echo getArt($type,$art); ?>
	</div>
	<div id="portDetailRight">
		<?php echo getFolders($type); ?>
		<div class="clearBoth"><!-- --></div>
	</div>
	<div class="clearBoth"><!-- --></div>
</div>

<?php include 'footer.php'; ?>