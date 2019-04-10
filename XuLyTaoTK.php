<?php
if (isset($_SERVER['REQUEST_METHOD'])== "POST"){
    $tennv = $_POST['tennv'];
    $tendn = $_POST['tendn'];
    $matkhau = $_POST['matkhau'];
    $nhaplaimatkhau = $_POST['nhaplaimatkhau'];
    if ($matkhau != $nhaplaimatkhau){
        echo '<script>alert("Nhập lại mật khẩu sai")</script>';
    }
    $dulieu = array(
        "tenNV"=> $tennv,
        "tenDN"=> $tendn,
        "matKhau"=> $matkhau
    );
    $data_string = json_encode($dulieu);
    $curl = curl_init("");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($curl);
    curl_close($curl);
}
?>
