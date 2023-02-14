<div class="row p-3">
    <form id="frmnote">
        <input id="title_Field" class="col form-control form-control-lg" type="text" placeholder="Note" aria-label=".form-control-lg example" required>
        <input id="des_flied" class="col form-control form-control-lg" type="text" placeholder="description" aria-label=".form-control-lg example" required>
        <button type="submit" class=" col btn btn-success btn-lg">Save</button>
    </form>
</div>
<div class="InputTable container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Note ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date </th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="Notes">
            <!-- LOAD DATA -->
        </tbody>
    </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- LOAD DATA -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        showTable();

        $('#frmnote').submit(function(e) {
            e.preventDefault();

            SaveData();
        });
    });

    function showTable() {
        $.post("pages/NotesInput/components/NoteTable.php", {},
            function(data) {
                $("#Notes").html(data);
            },

        );
    }

    function showNoteMdlInput(noteId) {
        $.post("pages/NotesInput/components/note_inputmdl.php", {
                noteId: noteId
            },
            function(data) {
                $("#exampleModal .modal-content").html(data);
                $("#exampleModal").modal('show');
            },

        );
    }

    function SaveData() {
        $.post("pages/NotesInput/actions/insert_note.php", {
                title: $("#title_Field").val(),
                description: $("#des_flied").val(),
            },
            function(data) {
                if (data == 'success') {
                    alert('Save successfully.')
                    showTable();
                    $('#NoteField').val('')
                } else {
                    alert(data)
                }
            },
        );
    }

    function updateNote(noteId) {
        if (confirm("Are you sure you want to proceed?")) {
            $.post("pages/NotesInput/actions/update_note.php", {
                    noteId: noteId,
                    title: $("#title_Fieldedit").val(),
                    description: $("#des_fliededit").val(),
                },
                function(data) {
                    if (data == 'success') {
                        alert('Save successfully.')
                        $("#exampleModal").modal('hide');
                        $("#exampleModal .modal-content").html('');
                        showTable();
                    } else {
                        alert(data)
                    }
                },
            );
        } else {
            alert('Update unsuccessfully.')
            $("#exampleModal").modal('hide');
            showTable();

        }
    }


    function DeleteData(id) {
        if (confirm("Are you sure you want to proceed?")) {

            $.post("pages/NotesInput/actions/delete_note.php", {
                    noteId: id
                },
                function(data) {
                    if (data == 'success') {
                        alert('deleted successfully.')
                        showTable();
                    } else {
                        alert(data)
                    }
                },
            );
        } else {
            alert('deleted unsuccessfully.')
            showTable();

        }

    }

    function showModal() {
        $.post("pages/NotesInput/actions/insert_note.php", {},
            function(data) {

            },

        );
    }
</script>