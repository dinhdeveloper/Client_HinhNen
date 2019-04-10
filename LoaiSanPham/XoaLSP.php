<?php
$ma = $_GET['ma'];
if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
    $dulieu = array(
        "maLSP" => $ma
    );
    $data_string = json_encode($dulieu);
    $curl = curl_init("https://hinhnen.azurewebsites.net/api/LoaiSanPham/xoaLSP/$ma");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($curl);
    curl_close($curl);
    echo '<script>alert("Xóa thành công")</script>';
    echo "<script>window.location.href='" . "home.php?page=2" . "'</script>";
}
?>