<?php

$services_json = json_decode(getenv("VCAP_SERVICES"),true);

$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
$username = $mysql_config["username"];
$password = $mysql_config["password"];
$hostname = $mysql_config["hostname"];
$dbname = $mysql_config["name"];

$port = $mysql_config["port"];


//database server
define('DB_SERVER', $hostname);

//database login name
define('DB_USER', $username);
//database login password
define('DB_PASS', $password);

//database name
define('DB_DATABASE', $dbname);
define('DB_PORT', $port);

//smart to define your table names also
define('TABLE_CARS_KLASI', "cars_klasi");
define('TABLE_RENT_REZERVACII', "rent_rezervacii");
define("TABLE_RENT_DOGOVOR", "rent_dogovor");
define("TBL_ACTIVE_USERS",  "active_users");
define("TBL_ACTIVE_GUESTS", "active_guests");
define("TBL_BANNED_USERS",  "banned_users");
?>