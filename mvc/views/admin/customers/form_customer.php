<?php
    if (isset($_POST['submit'])) {
        // $id = $_SESSION['id'];
        // $name = $_POST['name'];
    }

?>

<div class="card">
    <div class="card-body">
        <form method="POST" action="">
            <div class="row form-group">
                <label for="name" class="col-sm-2 col-form-label input-label">Tên khách hàng</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Thay đổi tên khách hàng" required= "true">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" name="submit" value="Save changes" class="btn btn-primary">
            </div>
        </form>

    </div>
</div>
<!-- <% end %> -->