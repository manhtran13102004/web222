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
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="http://localhost:8080/web222/Order/index"></a></li>
          <!-- icon home -->
          <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
      </nav>

      <h1 class="page-header-title" >Orders<span class="badge badge-soft-dark ml-2"><?php echo mysqli_num_rows($data["orders"])?></span></h1>
    </div>
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-borderless card-table">
      <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Date</th>
        <th>Total price</th>
        <th>Address</th>
        <th>Phone</th>
        <!-- <th>Status</th> -->

        <th colspan="2"></th>
      </tr>
      </thead>

      <tbody>
      <?php 
        while($row = mysqli_fetch_array($data["orders"])){
      ?>
        <tr>
          <td><?php echo $row["order_id"] ?></td>
          <td><?php echo $row["customer_id"] ?></td>
          <td><?php echo $row["order_date"] ?></td>
          <td><?php echo $row["total_price"] ?></td>
          <td><?php echo $row["address"] ?></td>
          <td><?php echo $row["phone"] ?></td>
          <!-- <td><?php echo $row["status"] ?></td>
          <td><a href="http://localhost:8080/web222/Order/edit/<?php echo $row["order_id"] ?>">Edit</td>
          <td><a href="http://localhost:8080/web222/Order/delete/<?php echo $row["order_id"] ?>">Delete</td> -->
        </tr>
      <?php 
        }
      ?>
      
      </tbody>
    </table>
  </div>
</div>

