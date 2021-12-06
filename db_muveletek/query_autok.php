<?php
include "kapcsolat.php";
header("Content-type: application/json; charset=utf8");
$sql = "SELECT * FROM autok";
if (isset($conn)) {
    $result = mysqli_query($conn, $sql);
}

$kimenet=array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($kimenet,$row);
    }
    echo json_encode($kimenet, JSON_UNESCAPED_UNICODE);
}
else {
    echo 0;
}

mysqli_close($conn);