</div>


		<div id="footer">
			<div class="sep"></div>
			<div id="footerNav">
				<a href="port.php?type=illustration&art=chopin">ILLUSTRATION</a>
				<a href="port.php?type=logos&art=RemnantRenaissance">LOGOS</a>
				<a href="port.php?type=tshirts&art=brownbearshirt">TSHIRTS</a>
				<a href="port.php?type=print&art=Space">PRINT</a>
				<a href="port.php?type=photography&art=Ben">PHOTOGRAPHY</a>
				<a href="about.php" style="margin-right:0px;">ABOUTME</a>
			</div>
			<div id="credits">
				Copyright &copy; <?php echo date("Y"); ?> Emmy Beltre. All rights reserved.<br> Site Design by Emmy Beltre. Development by <a target="_blank" href="http://create.tisity.com">create.tisity</a>.
			</div>
			<div class="clearBoth"><!-- --></div>
		</div> <!-- footer -->

	</div> <!-- content -->



<?php
if($_SERVER["QUERY_STRING"]) {
 	$var = $_SERVER["QUERY_STRING"];
 	if ($var == "thanks") {
 		echo '<script type="text/javascript">alert("Thanks for contacting me.");</script>';
 	}
 } else {
 	
 } 
?>
</body>
</html>