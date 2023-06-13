<?php
 include '../../config/DBfile/config.php';


$sql = "SELECT * FROM `tasks` ORDER BY id DESC ";
$result = mysqli_query($conn, $sql);

 while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>
      <td>".$row['id']."</td>
      <td>".$row['title']."</td>
      <td>".$row['description']."</td>
      <td>".$row['start_date']."<td>
      <td>".$row['end_date']."</td>
      <td><a href='editTask.php?id=".$row['id']."'><img src='../../assets/Icon/edit-64.png' height='30px' ></a>
      <button onclick='deleteTask(".$row['id'].")'>
      <img src='../../assets/Icon/delete-100.png' height='30px'>
      </button>
      </td>
    </tr>";
    

   }

?>