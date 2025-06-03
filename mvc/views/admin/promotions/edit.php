<h1>Edit Promotion</h1>
<?php 
if (isset($_SESSION["email"]) && $_SESSION["role"] == "customer") {
  echo '<script type = "text/javascript">
  window.location.href = "http://localhost:8080/web222/"</script>';
}
?>

<?php 
// Assume $data is available in this scope from the controller
// If not, you might need to fetch it based on your framework's conventions

    require_once "../web222/mvc/views/admin/promotions/form_promotion.php";
?>
<a href="http://localhost:8080/web222/Promotion/index">Back</a>
