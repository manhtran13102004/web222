<div class="card">
    <div class="card-body">
        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $intro = $_POST['intro'];
            // $avatar = "/products/$id.png";

            $allowedExts = array("jpg", "jpeg", "gif", "png");
            $nameParts = explode(".", $_FILES["file"]["name"]);
            $extension = end($nameParts);

            if ((($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/png")
                    || ($_FILES["file"]["type"] == "image/pjpeg"))
                    && ($_FILES["file"]["size"] < 2000000)
                    && in_array($extension, $allowedExts)) {

                if ($_FILES["file"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                }

                else {
                    if (file_exists("upload/" . $_FILES["file"]["name"])) {
                        echo "<script>alert('" . $_FILES["file"]["name"] . " already exists.')</script>";
                    }
                    else {
                        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . basename($_FILES['file']['name']));
                        $File = $_FILES["file"]["name"];
                        $avatar = "/products/$File";
                    }
                }
            }
            else {
                // echo "<script>alert('Invalid File')</script>";
            }



            if ($quantity <= 0 || $price <=0){
                echo "<script type='text/javascript'>alert('cap nhat product that bai');
                window.location.href = 'http://localhost:8080/web222/product/index';
                </script>";
            }

            if (!isset($data["id"])) {
                if (($data["productModal"]->con)->query("INSERT INTO product (product_id,product_name,quantity,price,avatar,category_id, intro) VALUES (N'$id', N'$name',N'$quantity',N'$price', N'$avatar', N'$category_id',N'$intro')")) {
                    echo "<script type='text/javascript'>alert('them product thanh cong');
                            window.location.href = 'http://localhost:8080/web222/product/index';
                            </script>";
                } else {
                    echo "<script type='text/javascript'>alert('them product that bai');
                            window.location.href = 'http://localhost:8080/web222/product/index';
                            </script>";
                }
            } else {
                if (($data["productModal"]->con)->query("UPDATE product SET product_name = N'$name', quantity =N'$quantity', price = N'$price', avatar = N'$avatar', category_id = N'$category_id', intro = N'$intro'   WHERE product_id = N'$id'")) {
                    echo "<script type='text/javascript'>alert('cap nhat product thanh cong');
                            window.location.href = 'http://localhost:8080/web222/product/index';
                            </script>";
                } else {
                    echo "<script type='text/javascript'>alert('cap nhat product that bai');
                            window.location.href = 'http://localhost:8080/web222/product/index';
                            </script>";
                }
            }
        }
        ?>
        <?php
        if (isset($data["product"])) {
            while ($row = mysqli_fetch_assoc($data["product"])) {
        ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label for="id" class="col-sm-2 col-form-label input-label">id</label>
                        <div class="col-sm-10">
                            <input type="number" name="id" class="form-control" placeholder="Please input id" value="<?php if (isset($data["id"])) echo $data["id"]; ?>" required="true">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="Please input name" value="<?php echo $row["product_name"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">quantity</label>
                        <div class="col-sm-10">
                            <input type="text" name="quantity" class="form-control" placeholder="Please input quantity" value="<?php echo $row["quantity"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">price</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" placeholder="Please input price" value="<?php echo $row["price"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">category id</label>
                        <div class="col-sm-10">
                            <input type="text" name="category_id" class="form-control" placeholder="Please input category id" value="<?php echo $row["category_id"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">intro</label>
                        <div class="col-sm-10">
                            <input type="text" name="intro" class="form-control" placeholder="Please input intro" value="<?php echo $row["intro"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="file" class="col-sm-2 col-form-label input-label">Filename:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="file">
                        </div>
                    </div>  

                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Save changes" class="btn btn-primary" name="submit">
                    </div>
                </form>
        <?php
            }
        }
        else{
        ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label for="id" class="col-sm-2 col-form-label input-label">id</label>
                        <div class="col-sm-10">
                            <input type="number" name="id" class="form-control" placeholder="Please input id"  required="true">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="Please input name"  required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">quantity</label>
                        <div class="col-sm-10">
                            <input type="text" name="quantity" class="form-control" placeholder="Please input quantity"  required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">price</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" placeholder="Please input price"  required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">category id</label>
                        <div class="col-sm-10">
                            <input type="text" name="category id" class="form-control" placeholder="Please input category id"  required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">intro</label>
                        <div class="col-sm-10">
                            <input type="text" name="intro" class="form-control" placeholder="Please input intro"  required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="file" class="col-sm-2 col-form-label input-label">Filename:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="file">
                        </div>
                    </div>  

                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Save changes" class="btn btn-primary" name="submit">
                    </div>
                </form>
        <?php 
        }
        ?>
    </div>
</div>