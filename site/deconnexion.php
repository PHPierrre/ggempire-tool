<?php
session_start();
setcookie ("pseudo", " ", time() - 10000000000000000000000000000000000000000);
setcookie ("password", " ", time() - 10000000000000000000000000000000000000);
setcookie ("id", " ", time() - 10000000000000000000000000000000000000000);
session_destroy();

echo'<SCRIPT LANGUAGE="JavaScript">
document.location.href="http://x" 
</SCRIPT>';


?>