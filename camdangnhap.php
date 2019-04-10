<?php
/**
 * Created by PhpStorm.
 * User: Dinht
 * Date: 3/30/2019
 * Time: 10:55 AM
 */

if (strlen($_SESSION['users']) == 0) {
    $extra = "Client_HinhNen/index.php";
    header("Location: http://localhost:81/$extra");
    return 0;
}
?>