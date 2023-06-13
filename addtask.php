<?php 
 include '../../config/DBfile/config.php';
 
  $title = $_POST['title'];
  $description = $_POST['description'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  $sql = "INSERT INTO `tasks` (`title`, `description`, `start_date`, `end_date`) VALUES (' $title', '$description', '$start_date', $end_date);";
  $result = mysqli_query($conn, $sql);
  if($result){
    $data = [ 
        'status' => 'success',
        'message' => 'Records successfully insert.'
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