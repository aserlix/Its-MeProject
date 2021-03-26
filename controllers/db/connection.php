<?php

// Connecting to DB
define('_DBSERVER', '213.171.200.101');
define('_DBUSER', 'aserlix');
define('_DBPASS', 'MyPassword');
define('_DB', 'Its_Me');

try {
    $conn = new PDO("mysql:host=" . _DBSERVER . ";dbname=" . _DB . "", _DBUSER, _DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
