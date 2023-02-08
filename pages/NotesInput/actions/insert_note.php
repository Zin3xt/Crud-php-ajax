<?php
require_once '../../../connection.php';

$title = $_POST['title'];
$description = $_POST['description'];

try {
    $conn->beginTransaction();


    $qryInsert = $conn->prepare("INSERT INTO tblnotes(noteTitle,noteDesc) VALUES (?,?)");
    $qryInsert->execute([$title, $description]);




    echo 'success';
    $conn->commit();
} catch (\Throwable $th) {
    // echo $th;
    echo $th;
    $conn->rollBack();
}
