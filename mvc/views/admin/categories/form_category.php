<?php
if (isset($_SESSION["email"]) && $_SESSION["role"] == "customer") {
  echo '<script type = "text/javascript">
  window.location.href = "http://localhost:8080/web222/"</script>';
}
?>

<div class="card">
    <div class="card-body">
            <?php 
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    if (!isset($data["id"])){
                        if(($data["categoryModal"]->con)->query("INSERT INTO category (category_id,category_name) VALUES (N'$id', N'$name')")){
                            echo "<script type='text/javascript'>alert('them category thanh cong');
                            window.location.href = 'http://localhost:8080/web222/Category/index';
                            </script>";
                        }
                        else{
                            echo "<script type='text/javascript'>alert('them category that bai');
                            window.location.href = 'http://localhost:8080/web222/Category/index';
                            </script>";
                        }
                    }
                    else{
                        if(($data["categoryModal"]->con)->query("UPDATE category SET category_name = N'$name' WHERE category_id = N'$id'")){
                            echo "<script type='text/javascript'>alert('cap nhat category thanh cong');
                            window.location.href = 'http://localhost:8080/web222/Category/index';
                            </script>";
                        }
                        else{
                            echo "<script type='text/javascript'>alert('cap nhat category that bai');
                            window.location.href = 'http://localhost:8080/web222/Category/index';
                            </script>";
                        }
                    }
                }
            ?>
            <form method="POST" action="">
                <div class="row form-group">
                    <label for="id" class="col-sm-2 col-form-label input-label">id</label>
                    <div class="col-sm-10">
                        <input type="number" name="id" class="form-control" placeholder="Please input id" value="<?php if (isset($data["id"])) echo $data["id"]; ?>" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="name" class="col-sm-2 col-form-label input-label">name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="Please input name" value="<?php if (isset($data["category"])) echo mysqli_fetch_assoc($data["category"])["category_name"] ?>" required="true">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <input type="submit" value="Save changes" class="btn btn-primary" name="submit">
                </div>
            </form>

    </div>
</div>