<?php
require_once '../../../connection.php';
$id = $_POST['noteId'];
try {

    $conn->beginTransaction();



    $qryInsert = $conn->prepare("DELETE FROM tblnotes WHERE noteid= ?");
    $qryInsert->execute([$id]);



    echo 'success';
    $conn->commit();
} catch (\Throwable $th) {

    echo $th;
    $conn->rollBack();
}
