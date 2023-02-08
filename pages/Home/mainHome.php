<div class="container ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Note ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date </th>
            </tr>
        </thead>
        <tbody id="HomeTable">

</div>

<script>
    $(document).ready(function() {
        showTable();
    })

    function showTable() {
        $.post("pages/Home/components/homeTable.php", {},
            function(data) {
                $("#HomeTable").html(data);
            },

        );
    }
</script>