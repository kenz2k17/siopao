<?php
$dsn = 'mysql:dbname=enrolement;host=localhost';
$user = 'root';
$password = '$tr@t1um2017';

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
<?php
/* 	$conn = new PDO('mysql:host=localhost;dbname=myexec_crps','myexec_linkup','executivemysql789'); */
?>