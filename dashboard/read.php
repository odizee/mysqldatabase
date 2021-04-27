<?php

 include("./connection.php");

  $sql = "select * from course";
  $result = $con->query($sql);
  while($row = $result->fetch_assoc()) {
    echo "<tr>";

    if(isset($_GET['id']) && $row['id'] == $_GET['id'])    {
        echo '<form class="form-inline m-2" action="./dashboard/update.php" method="POST">';
        echo '<td><input type="text" class="form-control" name="Name" value="'.$row['Name'].'"></td>';
        echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
        echo '<input type="hidden" name="id" value="'.$row['id'].'">';
        echo '</form>';
      } else {

        if($row['user_id'] == $_SESSION['user_id']){
          echo "<td>" . $row['Name'] . "</td>";
        
        echo '<td><a class="btn btn-primary" href="index.php?id=' . $row['id'] . '" role="button">Update</a></td>';
      
        echo '<td><a class="btn btn-danger" href="./dashboard/delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
        echo "</tr>";
  }
}

}
  $con->close();
?>

