<?php
declare(strict_types=1);

    require_once 'db_config.php';

function getConnection(): mysqli
{
    $conn = new mysqli($hostname, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// database function
require_once DATABASES_DIR . '/Event_creator.php';
require_once DATABASES_DIR . '/Event_user.php';