<?php
session_start();
include_once ('camdangnhap.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $json_url = "https://hinhnen.azurewebsites.net/api/Login/login?user=$user&pass=$pass";
    $content = file_get_contents($json_url);
    $data = json_decode($content);
    if ($data == null){
        echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng")</script>';
        echo "<script>window.location.href='" . "index.php" . "'</script>";
    }
    $dulieu = array(
        "tenDN" => $user,
        "matKhau" => $pass
    );
    $data_string = json_encode($dulieu);
    $curl = curl_init("https://hinhnen.azurewebsites.net/api/Login/login?user=$user&pass=$pass");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    $_SESSION['users'] = $user;
    $_SESSION['pw'] = $pass;
    $result = curl_exec($curl);
    curl_close($curl);
    echo "<script>window.location.href='" . "home.php" . "'</script>";
}
?>