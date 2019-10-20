<?php include 'inc/header.php'; ?>


<div class="container">
  <h2 class="d-flex justify-content-center head">Add Attendance</h2>
    <a href="view.php" class="col-sm-12"><button class="btn btn-info">View Employee</button></a>
    <a href="index.php" class=".d-lg-inline-flex"><button class="btn btn-danger">Back home</button></a>


<div class="att">
  <form action="" method="POST">
      <table>
      <tr>
        <th>Name</th>
        <th>Father Name</th>
        <th>Email</th>
        <th>Attendance</th>
      </tr>

      <?php
      $query = "SELECT * FROM tbl_emp";
      $result = $db->select($query);
      if ($result) {
        while ($value = $result->fetch_assoc()) {
    ?>
      <tr>
    
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['fname']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td>
          <label for="present">Present</label>
          <input required type="radio" value="present" name="attendance[<?php echo $value['id']; ?>]" id="present">

          
          <label for="absent">Absent</label>
          <input required type="radio" value="absent" name="attendance[<?php echo $value['id']; ?>]" id="absent">
          
        </td>
    
      </tr>
      <?php } } ?>
    </table>


    <a href="attendance.php" class="att_button"><button class="btn btn-danger">Attendance</button></a>
    </form>
</div>


<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $att      = $_POST['attendance'];
      $at_date  = date('Y-m-d');


      $getquery = "SELECT distinct at_date FROM tbl_attendance";
      $getresult = $db->select($getquery);
      $b=false;
      if ($getresult) {
        while ($getvalue = $getresult->fetch_assoc()) {

      if ($at_date == $getvalue['at_date']) {
        $b=true;
        echo "<div class='alert alert-danger error'>Attendance Already taken</div>";
      }
    }
  }

      if(!$b){
        foreach ($att as $key => $value) {
          if ($value == 'present') {
            $query_att = "INSERT INTO tbl_attendance(at_value, emp_id, at_date)VALUES('present','$key', '$at_date')";
            $result_att = $db->insert($query_att);
          }else{
            $query_att = "INSERT INTO tbl_attendance(at_value, emp_id, at_date)VALUES('absent','$key', '$at_date')";
            $result_att = $db->insert($query_att);
          }
        }

        if ($result_att) {
          echo "<div class='alert alert-success error'>Attendance take Successfully</div>";
        }
      }
    }
?>
</div>
<?php include 'inc/footer.php'; ?>