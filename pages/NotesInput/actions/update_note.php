<?php
require_once '../../../connection.php';

$noteId = $_POST['noteId'];
$title = $_POST['title'];
$description = $_POST['description'];

try {
    $conn->beginTransaction();


    $qryInsert = $conn->prepare("UPDATE `tblnotes` SET noteTitle=?,noteDesc=? WHERE noteId = ?");
    $qryInsert->execute([$title, $description, $noteId]);




    echo 'success';
    $conn->commit();
} catch (\Throwable $th) {
    // echo $th;
    echo $th;
    $conn->rollBack();
}
