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
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="http://localhost:8080/web222/Promotion/index">Promotions</a></li>
          <li class="breadcrumb-item active" aria-current="page">Overview</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Promotions<span class="badge badge-soft-dark ml-2"><?php echo mysqli_num_rows($data["promotions"])?></span></h1>
    </div>
    <div class="col-sm-auto" >
      <a href="http://localhost:8080/web222/Promotion/new" style="background-color:#008848;text-decoration:none;color:white;border:1px solid white;padding:10px;border-radius:5px;">Add Promotion</a>
    </div>
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-borderless card-table">
      <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Discount (%)</th>
        <th>Discount Amount</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Min Order Amount</th>
        <th>Max Discount</th>
        <th>Status</th>
        <th>Description</th>
        <th colspan="2"></th>
      </tr>
      </thead>

      <tbody>
      <?php 
        while($row = mysqli_fetch_array($data["promotions"])){
      ?>
        <tr>
          <td><?php echo $row["promotion_id"] ?></td>
          <td><?php echo $row["promotion_code"] ?></td>
          <td><?php echo $row["discount_percent"] ?></td>
          <td><?php echo $row["discount_amount"] ?></td>
          <td><?php echo $row["start_date"] ?></td>
          <td><?php echo $row["end_date"] ?></td>
          <td><?php echo $row["min_order_amount"] ?></td>
          <td><?php echo $row["max_discount"] ?></td>
          <td><?php echo $row["status"] ?></td>
          <td><?php echo $row["description"] ?></td>
          <td><a href="http://localhost:8080/web222/Promotion/edit/<?php echo $row["promotion_id"] ?>">Edit</td>
          <td><a href="http://localhost:8080/web222/Promotion/delete/<?php echo $row["promotion_id"] ?>">Delete</td>
        </tr>
      <?php 
        }
      ?>
      
      </tbody>
    </table>
  </div>
</div> 