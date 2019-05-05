<?php 

if(isset($_POST["user_comments"])){  
  if(!empty($_POST['user_comments'])){
    $name = $_POST['user_comments'];

    ?>
    <div>
      <h1>USERS REQUESTS TO MECHANIC</h1>
      <table class="col-xs-12">  
        <thead>  
          <tr>
            <th>User Name</th>
            <th>Comments</th>
            <th>Mechanic Name</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("../connection.php");

          $sql = mysqli_query($conn, "SELECT * FROM comments WHERE username = '".$name."' ");
          $row = mysqli_num_rows($sql);
          if ($row >= 1) {
            while($array = mysqli_fetch_array($sql)) {
              echo "<tr>";
              echo "<td>" . $array['username'] . "</td>";
              echo "<td>" . $array['comments'] . "</td>";
              echo "<td>" . $array['mechanic_name'] . "</td>";
              echo "</tr>";
            }
          }else{
            echo "<tr>";
            echo "<td>" . "No Request Made yet" . "</td>";
            echo "<td>" . "No Request Made yet" . "</td>";
            echo "<td>" . "No Request Made yet" . "</td>";
            echo "</tr>";
          }

          mysqli_close($conn);
          ?>

        </tbody>
      </table>
    </div>

    <?php 

  }
}

?>