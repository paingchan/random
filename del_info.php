<?php

require_once 'inc/header.php';

if (isset($_GET['ip'])) {
    $del_id = $_GET['ip'];
    $query = "delete from info where ip='$del_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:index.php');
    }
}
