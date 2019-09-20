<?php 

modules_get_language();

function pntresmailer() {
  pnRedirect('index.php?op=modload&name=pnTresMailer&file=index');
}

switch ($op) {
 case "pntresmailer":
   pntresmailer();
   break;
}
?>