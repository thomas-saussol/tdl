<?php

session_start();
require "config.php";


session_destroy();
echo "Déconnecté";
?>