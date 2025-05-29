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
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="http://localhost:8080/web222/Comment/index"></a></li>
          <!-- icon home -->
          <li class="breadcrumb-item active" aria-current="page">Comments</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Comments<span class="badge badge-soft-dark ml-2"><?php echo mysqli_num_rows($data["comments"])?></span></h1>
    </div>

  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-borderless card-table">
      <thead class="thead-light">
      <tr>
        <th>Product_ID</th>
        <th>Customer_ID</th>
        <th>Time</th>
        <th>Comment</th>

        <th colspan="2"></th>
      </tr>
      </thead>

      <tbody>
      <?php 
        while($row = mysqli_fetch_array($data["comments"])){
      ?>
        <tr>
          <td><?php echo $row["product_id"] ?></td>
          <td><?php echo $row["customer_id"] ?></td>
          <td><?php echo $row["cmt_time"] ?></td>
          <td><?php echo $row["cmt"] ?></td>
          <!-- <td><a href="#">Edit</td> -->
          <td><a href="http://localhost:8080/web222/Comment/delete/<?php echo $row["product_id"]?>/<?php echo $row["customer_id"]?>">Delete</td>
        </tr>
      <?php 
        }
      ?>
      
      </tbody>
    </table>
  </div>
</div>

