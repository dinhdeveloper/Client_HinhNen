<?php
    include_once ('camdangnhap.php');
    $ss_user = $_SESSION['users'];
    $json_url = "https://hinhnen.azurewebsites.net/api/Login/thongtintheouser?user=$ss_user";
    $content = file_get_contents($json_url);
    $json = json_decode($content, true);
?>
<section class="wrapper site-min-height">
<div class="col-lg-4 col-md-4 col-sm-4 mb"></div>
<div class="col-lg-4 col-md-4 col-sm-4 mb">
    <div class="content-panel pn">
        <div id="profile-02">
            <div class="user">
                <img src="assets/img/friends/fr-06.jpg" class="img-circle" width="80">
                <?php
                foreach ($json as $i){
                    ?>
                    <h4><?php echo $i['tenNV']?></h4>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="pr2-social centered">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </div>
    </div><!-- --/panel ---->
</div>
</section>