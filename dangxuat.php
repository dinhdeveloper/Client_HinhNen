<?php
$_SESSION['users'] == "";
session_destroy();
echo '<script>alert("Bạn đã đăng xuất thành công...")</script>';
echo "<script>window.location.href='" . "index.php" . "'</script>";
?>
<script language="javascript">
    document.location = "index.php";
</script>
