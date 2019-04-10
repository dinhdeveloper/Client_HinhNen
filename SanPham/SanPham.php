<?php
//kiem tra
if (strlen($_SESSION['users']) == 0) {
    $extra = "Client_HinhNen/index.php";
    header("Location: http://localhost:81/$extra");
    return 0;
}

$json_url = "https://hinhnen.azurewebsites.net/Api/SanPham/GetAllSP";
$content = file_get_contents($json_url);
$json = json_decode($content, true);
?>
<div class="content-panel">
    <h4 style="font-weight:bold;color:#2843ff"><i class="fa fa-angle-right"></i>Danh Sách Sản Phẩm
        <a href="home.php?page=3">
            <button class="btn btn-success" style="float: right;margin-right: 20px"><i class="fa fa-plus"></i></button>
        </a>
    </h4>
    <hr>
    <table class="table table-striped table-advance table-hover">
        <thead>
        <tr>
            <th style="font-weight:bold;color:#ff3522">Mã Sản Phẩm</th>
            <th style="font-weight:bold;color:#ff3522">Mã LSP</th>
            <th style="font-weight:bold;color:#ff3522">Tên Sản Phẩm</th>
            <th style="font-weight:bold;color:#ff3522"> Ảnh </th>
            <th style="font-weight:bold;color:#ff3522">Yêu Thích</th>
            <th style="font-weight:bold;color:#ff3522">Trạng Thái</th>
        </tr>
        </thead>
        <tbody id="myTable">
        <tr>
            <?php
            foreach ($json as $i){
            ?>
        <tr>
            <th scope="row" style="padding-left: 40px"><?php echo $i['maSP']?></th>
            <td><a href="home.php?page=4"><?php echo $i['maLSP']?></a></td>
            <td><?php echo $i['TenSP']?></td>
            <td><img src="<?php echo $i['HinhSP']?>" width="70px" height="70px"></td>
            <td><?php echo $i['YeuThich']?></td>
            <td>
                <a href="home.php?page=20&ma=<?php echo $i['maSP']?>"><button class="btn btn-primary btn-xs" type="submit"><i class="fa fa-pencil"></i></button></a>
                <a href="home.php?page=21&ma=<?php echo $i['maSP']?>"><button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button></a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>