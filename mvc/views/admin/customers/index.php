<?php
if (isset($_SESSION["email"]) && $_SESSION["role"] == "customer") {
  echo '<script type = "text/javascript">
  window.location.href = "http://localhost:8080/web222/"</script>';
}
?>

<div class="page-header">
  <div class="row align-items-center mb-3">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="http://localhost:8080/web222/Customer/index"></a></li>
          <!-- icon home -->
          <li class="breadcrumb-item active" aria-current="page">Customers</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Customers<span class="badge badge-soft-dark ml-2"><?php echo mysqli_num_rows($data["customers"])?></span></h1>
    </div>
    <!-- <div class="col-sm-auto">
      <a href="http://localhost:8080/web222/Customer/new" class="btn btn-primary">New Customer</a>
    </div> -->
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-borderless card-table">
      <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
        <th colspan="2"></th>
      </tr>
      </thead>

      <tbody>
      <?php 
        while($row = mysqli_fetch_array($data["customers"])){
      ?>
        <tr>
          <td><?php echo $row["customer_id"] ?></td>
          <td><?php echo $row["customer_name"] ?></td>
          <td><a href="http://localhost:8080/web222/customer/edit/<?php echo $row["customer_id"] ?>">Edit</td>
          <td><a href="http://localhost:8080/web222/customer/delete/<?php echo $row["customer_id"] ?>">Delete</td>
        </tr>
      <?php 
        }
      ?>
      
      </tbody>
    </table>
  </div>
</div>

