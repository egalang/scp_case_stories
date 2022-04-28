<?php
// set the expiration date to one hour ago
setcookie("gatherer", "", time() - 3600);
header("Location: login");
?>