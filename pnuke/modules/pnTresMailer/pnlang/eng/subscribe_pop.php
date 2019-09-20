<?php

include ("pnTresMailer.php");

	$output .= "<center>"._SUBSCRIBEANDSTAY."<br><br>";
	$output .= "<a href=\"/index.php?op=modload&name=pnTresMailer&file=index\" target=\"_blank\" title=\""._TSUBSCRIBENOW."\"><img src=\"/modules/pnTresMailer/images/subscribe.gif\" border=\"0\"></a><br><br>";
	$output .= ""._ORFINDOUT." <a href=\"/index.php?op=modload&name=pnTresMailer&file=index\" target=\"_blank\">"._MOREABOUTIT."</a>.<br><br></center>";
	echo $output;

?>