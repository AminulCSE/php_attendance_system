<?php include 'inc/header.php'; ?>


<div class="container">
  <h2 class="d-flex justify-content-center head">Add employee</h2>
    <a href="index.php" class="col-sm-12"><button class="btn btn-info">Back Home</button></a>
    <a href="attendance.php" class=".d-lg-inline-flex"><button class="btn btn-danger">Attendance</button></a>


<input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:35%;">Name</th>
    <th style="width:35%;">Fname</th>
    <th style="width:30%;">Email</th>
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


  </tr>
  <?php } } ?>
</table>
</div>
<?php include 'inc/footer.php'; ?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>