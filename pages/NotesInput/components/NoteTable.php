<?php
require_once '../../../connection.php';

$selNotes = $conn->prepare("SELECT * from tblnotes  order by dateTime ASC");
$selNotes->execute();
$count = 1;
?>
<?php foreach ($selNotes->fetchAll() as $row) : ?>
    <tr>
        <th scope="row"><?php echo $count++ ?></th>
        <td><?php echo $row['noteId'] ?></td>
        <td><?php echo $row['noteTitle'] ?></td>
        <td><?php echo $row['noteDesc'] ?></td>
        <td><?php echo $row['dateTime'] ?></td>
        <td> <button onclick="DeleteData('<?php echo $row['noteId'] ?>')" class="btn btn-danger btn-lg">delete</button>
            <button type="button" class="btn btn-primary" onclick="showNoteMdlInput('<?php echo $row['noteId'] ?>')">
                edit
            </button>
            <!-- Modal -->


        </td>
    </tr>


<?php endforeach; ?>