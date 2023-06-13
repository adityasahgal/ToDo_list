<?php
include '../../config/DBfile/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM `tasks` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
if($result){
    $data = [ 
        'status' => 'success',
        'message' => 'Records successfully delete.'
    ];
    echo json_encode($data);
}else{
    $data = [ 
        'status' => 'error',
        'message' => 'Something wrong!.'
    ];
    echo json_encode($data);
}
?>