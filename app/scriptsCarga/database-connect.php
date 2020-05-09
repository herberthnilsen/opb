<?php
// echo json_encode(PDO::getAvailableDrivers());
try {
    $db = new PDO("oci:dbname=pocbank_high;charset=utf8", "atpc_user", "0Teste123#456789");
    // foreach($db->query('select * from atpc_user.customers') as $row) {
    //     echo json_encode($row);
    //     echo "<br/>";
    // }
    // $dbh = null;
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// echo "<br/>success!!";

?>
