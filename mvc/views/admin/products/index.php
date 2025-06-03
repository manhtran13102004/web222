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
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="http://localhost:8080/web222/Product/index"></a></li>
          <!-- icon home -->
          <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Products<span class="badge badge-soft-dark ml-2"><?php echo mysqli_num_rows($data["products"])?></span></h1>
    </div>
    <div class="col-sm-auto">
      <a href="http://localhost:8080/web222/Product/new" class="btn btn-primary" style="background-color:#008848;text-decoration:none;color:white;border:1px solid white;padding:10px;border-radius:5px;">Add Product</a>
    </div>
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-borderless card-table">
      <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>        
        <th>Quantity</th>
        <th>Intro</th>
        <th colspan="2"></th>
      </tr>
      </thead>

      <tbody>
      <?php 
        $categories = array();
        while($row = mysqli_fetch_array($data["categories"])){
            $categories[] = $row;
        }
        while($row = mysqli_fetch_array($data["products"])){
      ?>
        <tr>
          <td><?php echo $row["product_id"] ?></td>
          <td><?php echo $row["product_name"] ?></td>
          <td><?php echo $categories[$row["category_id"]-1]["category_name"]?>
          </td>
          <td><?php echo $row["price"] ?></td>
          <td><?php echo $row["quantity"] ?></td>
          <td><?php echo $row["intro"] ?></td>
          <td><a href="http://localhost:8080/web222/product/edit/<?php echo $row["product_id"] ?>">Edit</td>
          <td><a href="http://localhost:8080/web222/product/delete/<?php echo $row["product_id"] ?>">Delete</td>
        </tr>
      <?php 
        }
      ?>
      
      </tbody>
    </table>
  </div>
</div>

