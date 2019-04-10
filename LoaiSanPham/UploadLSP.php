<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenloai = $_POST['tenloai'];
    if (isset($_FILES["hinhlsp"]) && $_FILES["hinhlsp"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["hinhlsp"]["name"];
        $filetype = $_FILES["hinhlsp"]["type"];
        $filesize = $_FILES["hinhlsp"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            echo '<script>alert("Vui lòng chọn đúng định dạng file")</script>';
            echo "<script>window.location.href='" . "../home.php?page=4" . "'</script>";
        }
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");
        if (in_array($filetype, $allowed)) {
            if (file_exists("../Hinh/" . $_FILES["hinhlsp"]["name"])) {
                echo $_FILES["hinhlsp"]["name"] . " đã tồn tại";
            } else { // Hàm move_uploaded_file sẽ tiến hành upload file lên thư mục upload
                move_uploaded_file($_FILES["hinhlsp"]["tmp_name"], "../Hinh/" . $_FILES["hinhlsp"]["name"]); // Thông báo thành công
                $path = "../Hinh/$filename";
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                //$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $base64 = base64_encode($data);
                $dulieu = array(
                    "tenLSP"=> $tenloai,
                    "hinhSLP"=> $base64
                );
                $data_string = json_encode($dulieu);
                $curl = curl_init('https://hinhnen.azurewebsites.net/api/LoaiSanPham/themLSP');
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data_string))
                );
                $result = curl_exec($curl);
                curl_close($curl);
                echo '<script>alert("Tạo LSP thành công")</script>';
                echo "<script>window.location.href='" . "../home.php?page=4" . "'</script>";
            }
        } else {
            echo '<script>alert("Có vấn đề xảy ra khi upload file")</script>';
            echo "<script>window.location.href='" . "../home.php?page=5" . "'</script>";
        }
    } else {
        $loi = "Lỗi: " . $_FILES["photo"]["error"];
        echo "<script>alert('$loi')</script>";
        echo "<script>window.location.href='" . "../home.php?page=5" . "'</script>";
    }
}

?>