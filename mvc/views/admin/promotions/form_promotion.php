<div class="card">
    <div class="card-body">
        <!-- promotion_id, promotion_code, discount_percent, discount_amount, start_date, end_date, min_order_amount, max_discount,
        description, status -->
        <?php
        if (isset($_POST['submit'])) {
            $promotion_id = $_POST['promotion_id'];
            $promotion_code = $_POST['promotion_code'];
            $discount_percent = $_POST['discount_percent'];
            $discount_amount = $_POST['discount_amount'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $min_order_amount = $_POST['min_order_amount'];
            $max_discount = $_POST['max_discount'];
            $description = $_POST['description'];
            $status = $_POST['status'];



            if (!isset($data["id"])) {
                if (($data["promotionModal"]->con)->query("INSERT INTO promotion (promotion_id, promotion_code, discount_percent, discount_amount, start_date, end_date, min_order_amount, max_discount, 
                description, status) VALUES (N'$promotion_id', N'$promotion_code', N'$discount_percent', N'$discount_amount', N'$start_date', N'$end_date', N'$min_order_amount', N'$max_discount',
        N'$description', N'$status')")) {
                    echo "<script type='text/javascript'>alert('them promotion thanh cong');
                            window.location.href = 'http://localhost:8080/web222/promotion/index';
                            </script>";
                } else {
                    echo "<script type='text/javascript'>alert('them promotion that bai');
                            window.location.href = 'http://localhost:8080/web222/promotion/index';
                            </script>";
                }
            } else {
                if (($data["promotionModal"]->con)->query("UPDATE promotion SET promotion_code = N'$promotion_code', discount_percent = N'$discount_percent', discount_amount = N'$discount_amount', start_date = N'$start_date', end_date = N'$end_date', min_order_amount = N'$min_order_amount', max_discount = N'$max_discount', 
                description = N'$description', status = N'$status' WHERE promotion_id = N'$promotion_id'")) {
                    echo "<script type='text/javascript'>alert('cap nhat promotion thanh cong');
                            window.location.href = 'http://localhost:8080/web222/promotion/index';
                            </script>";
                } else {
                    echo "<script type='text/javascript'>alert('cap nhat promotion that bai');
                            window.location.href = 'http://localhost:8080/web222/promotion/index';
                            </script>";
                }
            }
        }
        ?>
        <?php
        if (isset($data["promotion"])) {
            while ($row = mysqli_fetch_assoc($data["promotion"])) {
        ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label for="id" class="col-sm-2 col-form-label input-label">promotion id</label>
                        <div class="col-sm-10">
                            <input type="number" name="promotion_id" class="form-control" placeholder="Please input promotion_id" value="<?php if (isset($data["id"])) echo $data["id"]; ?>" required="true">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">promotion code</label>
                        <div class="col-sm-10">
                            <input type="text" name="promotion_code" class="form-control" placeholder="Please input promotion_code" value="<?php echo $row["promotion_code"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">discount percent</label>
                        <div class="col-sm-10">
                            <input type="text" name="discount_percent" class="form-control" placeholder="Please input discount_percent" value="<?php echo $row["discount_percent"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">discount amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="discount_amount" class="form-control" placeholder="Please input discount_amount" value="<?php echo $row["discount_amount"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">start date</label>
                        <div class="col-sm-10">
                            <input type="text" name="start_date" class="form-control" placeholder="Please input start_date" value="<?php echo $row["start_date"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">end date</label>
                        <div class="col-sm-10">
                            <input type="text" name="end_date" class="form-control" placeholder="Please input end_date" value="<?php echo $row["end_date"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">end date</label>
                        <div class="col-sm-10">
                            <input type="text" name="end_date" class="form-control" placeholder="Please input end_date" value="<?php echo $row["end_date"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">min order amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="min_order_amount" class="form-control" placeholder="Please input min_order_amount" value="<?php echo $row["min_order_amount"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">max discount</label>
                        <div class="col-sm-10">
                            <input type="text" name="max_discount" class="form-control" placeholder="Please input max_discount" value="<?php echo $row["max_discount"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" placeholder="Please input description" value="<?php echo $row["description"] ?>" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control" placeholder="Please input status" value="<?php echo $row["status"] ?>" required="true">
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
                        <label for="id" class="col-sm-2 col-form-label input-label">promotion id</label>
                        <div class="col-sm-10">
                            <input type="number" name="promotion_id" class="form-control" placeholder="Please input promotion_id" echo $data["id"]; required="true">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">promotion code</label>
                        <div class="col-sm-10">
                            <input type="text" name="promotion_code" class="form-control" placeholder="Please input promotion_code" e"] required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">discount percent</label>
                        <div class="col-sm-10">
                            <input type="text" name="discount_percent" class="form-control" placeholder="Please input discount_percent" ent"] required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">discount amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="discount_amount" class="form-control" placeholder="Please input discount_amount" nt"] required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">start date</label>
                        <div class="col-sm-10">
                            <input type="text" name="start_date" class="form-control" placeholder="Please input start_date" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">end date</label>
                        <div class="col-sm-10">
                            <input type="text" name="end_date" class="form-control" placeholder="Please input end_date" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">end date</label>
                        <div class="col-sm-10">
                            <input type="text" name="end_date" class="form-control" placeholder="Please input end_date" " required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">min order amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="min_order_amount" class="form-control" placeholder="Please input min_order_amount" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">max discount</label>
                        <div class="col-sm-10">
                            <input type="text" name="max_discount" class="form-control" placeholder="Please input max_discount" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" placeholder="Please input description" required="true">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="name" class="col-sm-2 col-form-label input-label">status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control" placeholder="Please input status" required="true">
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