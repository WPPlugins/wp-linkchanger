<?php
$amztag = "hobbyheimkino"; // your amazon partner-id

$mm = str_replace(array("/","’","\"",";"),"",$_GET["mm"]);
$id = str_replace("&amp;","&",urldecode($_GET["id"]));

if	  ($mm=="zx") $URL = "http://ad.zanox.com/ppc/?".$id."&SIDE=[[BLOG]]";
elseif($mm=="an") $URL = "http://partners.webmasterplan.com/click.asp?ref=".$id;
elseif($mm=="td") $URL = "http://clkde.tradedoubler.com/click?p=".$id;
elseif($mm=="am") $URL = "http://www.amazon.de/gp/redirect.html?ie=UTF8&location=http%3A%2F%2Fwww.amazon.de%2F".urlencode($id)."&site-redirect=de&tag=".$amztag."";
elseif($mm=="a2") $URL = "http://www.amazon.de/gp/search?ie=UTF8&keywords=".$id."&tag=".$amztag."&index=blended&linkCode=ur2";
else			  $URL = "";

if(!empty($URL)) @header("Location: ".$URL."");
?>
<html>
	<head>
		<title></title>
		<meta name="robots" content="noindex,nofollow" />
		<?php if(!empty($URL)) echo '<meta http-equiv="refresh" content="0; url='.$URL.';" />'; ?>
	</head>
	<body style="margin:0 auto;">
		<b><a href="<?=$URL?>">Link &ouml;ffnen &gt;&gt;</a></b><br /><br />
		Sollte der Link nicht korrekt ge&ouml;ffnet werden wenden Sie sich bitte an den Webmaster.<br /><br />
		<div align="right">powered by <a href="http://blogger.hvbx.de/">HVBX</a></div>
	</body>
</html>
