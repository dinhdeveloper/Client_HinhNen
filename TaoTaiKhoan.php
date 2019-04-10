<?php
//kiem tra
if (strlen($_SESSION['users']) == 0) {
    $extra = "Client_HinhNen/index.php";
    header("Location: http://localhost:81/$extra");
    return 0;
}
?>
<section class="wrapper site-min-height">
    <h2 class="taotaikhoan">Tạo tài khoản</h2>
    <form class="create-acc" action="XuLyTaoTK.php" method="post">
        <div>
            <div class="col span-1-of-3 info">
                <label>Tên nhân viên</label>
            </div>
            <div class="col span-2-of-3 info">
                <input type="text" placeholder="Tên nhân viên" name="tennv">
            </div>
        </div>
        <div>
            <div class="col span-1-of-3 info">
                <label>Tên đăng nhập</label>
            </div>
            <div class="col span-2-of-3 info">
                <input type="text" placeholder="Tên đăng nhập" name="tendn">
            </div>
        </div>
        <div>
            <div class="col span-1-of-3 info">
                <label>Mật khẩu</label>
            </div>
            <div class="col span-2-of-3 info">
                <input type="password" placeholder="Mật khẩu" name="matkhau">
            </div>
        </div>
        <div>
            <div class="col span-1-of-3 info">
                <label>Nhập Lại Mật khẩu</label>
            </div>
            <div class="col span-2-of-3 info">
                <input type="password" placeholder="Nhập Lại Mật khẩu" name="nhaplaimatkhau">
            </div>
        </div>
    </form>
    <div >
        <input type="submit" value="Submit" class="btn" name="taotaikhoan">
    </div>
</section>