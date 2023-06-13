<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tasks Page</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>

</head>
<style>
    table,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>

    <?php include '../navbar/navbar.php'; ?>
    <div class="btn" style="margin-left:80%; ">

        <button type="button" class="btn btn-primary" data-toggle="offcanvas" data-bs-toggle="modal" data-bs-target="#myModal" aria-pressed="false" autocomplete="off">
            <span style="color:white; text-decoration:none; ">Add Task</span>
        </button>
    </div>

    <div class="container mt-3 my-4 my-4">
        <div id="msg"></div>

        <table class="table">
            <thead>
                <tr>
                    <th>S no.</th>
                    <th>Tittle</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th></th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskdata">
                <?php include 'taskTable.php' ?>

            </tbody>
        </table>
    </div>
    <footer>
        <?php include '../footer/footer.php'; ?>

    </footer>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header outline-primary">
                    <h4 class="modal-title">Add New Task</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-2 mt-2">
                            <label for="title" class="form-label">Tittle:</label>
                            <input type="title" class="form-control" id="title" placeholder="Enter text here." name="title">
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description:</label>
                            <input type="description" class="form-control" id="description" placeholder="Enter description" name="description">
                        </div>
                        <div class="mb-2">
                            <label for="date" class="form-label">Start-Date:</label>
                            <input type="date" class="form-control" id="start_date" placeholder="Enter email" name="start_date">
                        </div>
                        <div class="mb-2">
                            <label for="date" class="form-label">End-Date:</label>
                            <input type="date" class="form-control" id="end_date" placeholder="Enter company" name="end_date">
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addTask()">Add Records</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- The Modal -->

    <script>
        function addTask() {
            var title = $('#title').val();
            var description = $('#description').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();

            $.ajax({
                url: "addtask.php",
                type: "post",
                data: {
                    'title': title,
                    'description': description,
                    'start_date': start_date,
                    'end_date': end_date


                },
                success: function(response) {
                    $('#msg').empty();
                    var data = JSON.parse(response);
                    if (data.status == 'success') {
                        $('#myModal').modal('hide');
                        $('#name').val('');
                        $('#msg').append(data.message);
                        $('#taskdata').empty();
                        $.ajax({
                            url: "taskTable.php",
                            type: "get",
                            success: function(response) {
                                $('#taskdata').append(response);
                            }
                        });



                    } else {
                        alert(data.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function deleteTask(id) {
            $.ajax({
                url: "deletetask.php",
                type: "get",
                data: {
                    'id': id
                },
                success: function(response) {
                    $('#msg').empty();
                    var data = JSON.parse(response);
                    if (data.status == 'success') {
                        $('#msg').append(data.message);
                        $('#taskdata').empty();
                        $.ajax({
                            url: "taskTable.php",
                            type: "get",
                            success: function(response) {
                                $('#taskdata').append(response);
                            }
                        });

                    } else {
                        alert(data.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    </script>

</body>

</html>