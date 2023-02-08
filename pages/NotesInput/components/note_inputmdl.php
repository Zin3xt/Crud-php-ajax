<?php
require_once '../../../connection.php';

$noteId = $_POST['noteId'];

$selDetails = $conn->prepare("SELECT * from tblnotes where noteId = ?");
$selDetails->execute([$noteId]);
$noteDetails = $selDetails->fetch();
?>


<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="frminputnotemodl">
        <input id="title_Fieldedit" value="<?php echo $noteDetails['noteTitle'] ?>" class="col form-control form-control-lg" type="text" placeholder="Note" aria-label=".form-control-lg example" required>
        <input id="des_fliededit" value="<?php echo $noteDetails['noteDesc'] ?>" class="col form-control form-control-lg" type="text" placeholder="description" aria-label=".form-control-lg example" required>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" form="frminputnotemodl" class="btn btn-primary">Save changes</button>
</div>
<script>
    $('#frminputnotemodl').submit(function(e) {
        e.preventDefault();
        updateNote('<?php echo $noteId ?>')
    });
</script>