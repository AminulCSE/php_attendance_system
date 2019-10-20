<?php include 'inc/header.php'; ?>
  <div class="container">
    <h2 class="d-flex justify-content-center head">Add employee</h2>
    <a href="index.php" class="col-sm-12"><button class="btn btn-info">Back Home</button></a>
    <a href="attendance.php" class=".d-lg-inline-flex"><button class="btn btn-danger">Attendance</button></a>

<?php
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];

    $name = $fm->validation($name);
    $fname = $fm->validation($fname);
    $email = $fm->validation($email);

    $name = mysqli_real_escape_string($db->link, $name);
    $fname = mysqli_real_escape_string($db->link, $fname);
    $email = mysqli_real_escape_string($db->link, $email);

    if (empty($name)||empty($fname)||empty($email)) {
      echo "<div class='alert alert-danger error'>Fields must not be empty!</div>";
    }else{
      $query = "INSERT INTO tbl_emp(name, fname, email)VALUES('$name','$fname','$email')";
      $result = $db->insert($query);
      if ($result) {
        echo "<div class='alert alert-success error'>Data Inserted Successfully</div>";
      }
    }
  }
?>


  <form action="" method="POST" enctype="multiple/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter employee name" name="name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="name"> Father Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" placeholder="Enter employee father name" name="fname">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>
</div>
<?php include 'inc/footer.php'; ?>





