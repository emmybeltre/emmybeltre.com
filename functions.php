<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
*/



function getFolders($dir){
	$i="";

	$hidden_files = array(".","..","config.php","setup.php","db.php","Connections","Data","TEMPLATE","_Text");
 	$imgsArr = array();
	if ($handle = opendir('port/'.$dir)) {
		while (false !== ($file = readdir($handle))) {
			if (!in_array($file, $hidden_files)) {



				if ($handle2 = opendir('port/'.$dir."/".$file)) {
					while (false !== ($file2 = readdir($handle2))) {
						if (!in_array($file2, $hidden_files)) {

							$path_info = pathinfo('port/'.$dir."/".$file."/".$file2);

							//echo $file2."<br>";

							if ($path_info['extension'] == "jpg") {
								$img ='port/'.$dir."/".$file."/".$file2;
								  $imgsArr[] = $img;
							}

							if ($path_info['extension'] == "txt") {
								$info = file_get_contents('port/'.$dir."/".$file."/".$file2);
								$type = explode('type:', $info);
								$type = explode('title:', $type[1]);
								$type = $type[0];
								$type = qoute_replacment($type);

								$title = explode('title:', $info);
								$title = explode('desc:', $title[1]);
								$title = $title[0];
								$title = qoute_replacment($title);

								$desc = explode('desc:', $info);
								$desc = $desc[1];
								$desc = qoute_replacment($desc);



							$i++;
							}

						}



					}
					$imgcount = count($imgsArr);
					?>

					<a href="port.php?type=<?php echo $dir; ?>&amp;art=<?php echo $file; ?>#port"><span><img src="thumber.php?file=<?php echo $imgsArr[0]; ?>&sizex=125&sizey=500&quality=80&nocache=0" alt=""></span></a>


					<?php

					closedir($handle2);
					$imgsArr = array();

				}

			}
		}
		closedir($handle);
	}
}

function getArt($dir,$art){
	$i="";

	$hidden_files = array(".","..","config.php","setup.php","db.php","Connections","Data","TEMPLATE","_Text");
 	$imgsArr = array();
	if ($handle = opendir('port/'.$dir."/".$art)) {


				while (false !== ($file = readdir($handle))) {
						if (!in_array($file, $hidden_files)) {

							$path_info = pathinfo('port/'.$dir."/".$art."/".$file);

							if ($path_info['extension'] == "jpg") {
								$img ='port/'.$dir."/".$art."/".$file;
								  $imgsArr[] = $img;

							}

							if ($path_info['extension'] == "txt") {
								$info = file_get_contents('port/'.$dir."/".$art."/".$file);
								$type = explode('type:', $info);
								$type = explode('title:', $type[1]);
								$type = $type[0];
								$type = qoute_replacment($type);

								$title = explode('title:', $info);
								$title = explode('desc:', $title[1]);
								$title = $title[0];
								$title = qoute_replacment($title);

								$desc = explode('desc:', $info);
								$desc = $desc[1];
								$desc = qoute_replacment($desc);



							$i++;
							}

						}



					}

					?>
<div id="portDetailLeftImg">
	<img src="thumber.php?file=<?php echo $imgsArr[0]; ?>&sizex=535&sizey=1900&quality=80&nocache=0" alt="">
</div>
<div id="detailText">
	<div id="detailTextHead"><?php echo $title; ?></div>
	<div id="detailTextDesc"><?php echo $desc; ?></div>
	<div class="clearBoth"><!-- --></div>
</div>

					<?php

		}
		closedir($handle);

}



function qoute_replacment($phrase){
	//define what to look for in the phrase
	$find =    array("\’", "’", "\‘", "‘", "\'", "'", "—", '\”', '”', '\“', '“', '\"', '"',"\n","\r","…");
	//defince what to replace the find array with
	$replace   = array("&apos;", "&apos;", "&apos;", "&apos;", "&apos;", "&apos;", "-", "&quot;", "&quot;", "&quot;", "&quot;", "&quot;", "&quot;","&nbsp;","&nbsp;","...");
	//html entities code incase you want that
	#$replace   = array("&#39", "&#39", "&#39", "&#39", "&#39", "&#39","—", "&#34", "&#34", "&#34", "&#34", "&#34", "&#34");
	//do the replacing
	$newphrase = str_replace($find, $replace, $phrase);
 	//return the replacing for output
	return $newphrase;
}
?>
