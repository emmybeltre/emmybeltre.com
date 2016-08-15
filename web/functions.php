<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
*/

define("SITE_BASEPATH", dirname(__FILE__) . '/');
define("PORT_PATH", SITE_BASEPATH . "port/");

function getFolders($dir) {
	$hidden_files = array(".","..","config.php","setup.php","db.php","Connections","Data","TEMPLATE","_Text");
 	$imgsArr = array();
	if ($handle = opendir(PORT_PATH.$dir)) {
		while (false !== ($file = readdir($handle))) {
			if (!in_array($file, $hidden_files)) {
				if ($handle2 = opendir(PORT_PATH.$dir."/".$file)) {
					while (false !== ($file2 = readdir($handle2))) {
						if (!in_array($file2, $hidden_files)) {
							$path_info = pathinfo(PORT_PATH.$dir."/".$file."/".$file2);

							if ($path_info['extension'] == "jpg") {
								$img = 'port/'.$dir."/".$file."/".$file2;
								$imgsArr[] = $img;
							}

							if ($path_info['extension'] == "txt") {
								$info = file_get_contents(PORT_PATH.$dir."/".$file."/".$file2);
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
							}
						}
					}
					$imgcount = count($imgsArr);
				?>

					<a href="port.php?type=<?=$dir?>&amp;art=<?=$file?>#port"><span><img src="thumber.php?file=<?=urlencode($imgsArr[0])?>&sizex=125&sizey=500&quality=80&nocache=0" alt=""></span></a>

				<?php

					closedir($handle2);
					$imgsArr = array();

				} # end if ($handle2 = opendir())
			}
		}
		closedir($handle);
	}
}

function getArt($dir,$art){
	$hidden_files = array(".","..","config.php","setup.php","db.php","Connections","Data","TEMPLATE","_Text");
 	$imgsArr = array();

	if ($handle = opendir(PORT_PATH.$dir."/".$art)) {
		while (false !== ($file = readdir($handle))) {
			if (!in_array($file, $hidden_files)) {

				$path_info = pathinfo(PORT_PATH.$dir."/".$art."/".$file);

				if ($path_info['extension'] == "jpg") {
					$img = 'port/'.$dir."/".$art."/".$file;
					$imgsArr[] = $img;
				}

				if ($path_info['extension'] == "txt") {
					$info = file_get_contents(PORT_PATH.$dir."/".$art."/".$file);
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
				}

			}
		}

	?>
<div id="portDetailLeftImg">
	<img src="thumber.php?file=<?=urlencode($imgsArr[0])?>&sizex=535&sizey=1900&quality=80&nocache=0" alt="">
</div>
<div id="detailText">
	<div id="detailTextHead"><?=$title?></div>
	<div id="detailTextDesc"><?=$desc?></div>
	<div class="clearBoth"><!-- --></div>
</div>

<?php

		} # end if ($handle = opendir())

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


