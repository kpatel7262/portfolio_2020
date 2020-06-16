<?php
class Database
{
private static $username = "calorieUser";
private static $password = "calorie@123";
private static $dsn = 'mysql:host=localhost;dbname=calorie_tracker';
private static $dbconn;

private function __construct()
{
}

public static function getDatabase()
{
try {
if (!isset(self::$dbconn)) {
self::$dbconn = new PDO(self::$dsn, self::$username, self::$password);
}
} catch (PDOException $e) {
$msg = $e->getMesage();
echo $msg;
exit();
}
return self::$dbconn;
}
}