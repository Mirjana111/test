<?php

require 'db-config.php';
require 'db-connect.php';

ini_set('session.cookie_httponly',1);
ini_set('session.use_only_cookies',1);
ini_set('session.cookie_lifetime','900');

session_start();
session_regenerate_id();

?>