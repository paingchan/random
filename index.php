<?php require_once 'inc/header.php';
include_once 'inc/nav.php';

$name = $_SESSION['name'];
$user_group = $_SESSION['user_group'];


?>

<section class="section">

    <div class="row">

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <form method="POST" action="">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">

                                <?php
$sql_1=mysqli_query($con, "SELECT info.ip , info.os, info.date , info.result, info.ip_1 , info.maker , info.state , info.info_group , groups.group_id , groups.group_name from info INNER JOIN groups on info.info_group = groups.group_id where info_group='$user_group' order by info_group desc LIMIT 1");
$row_1 = mysqli_fetch_assoc($sql_1);
$result_1 = $row_1['result'];
$group_id = $row_1['group_id'];
if ($_SESSION['name']==$result_1) {
    ?>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">请你 Click 一下</h5>
                                        <h1 class="mb-3 font-30"> <?php rand1() ?>
                                        </h1>

                                    </div>
                                </div>

                                <?php

} else {
    ?>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">这次的组长</h5>
                                        <h1 class="mb-3 font-30"> <?php echo $result_1 ?>
                                        </h1>

                                    </div>
                                </div>
                                <?php
}
?>




                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php
$sql=mysqli_query($con, "SELECT info.ip , info.os, info.date , info.result, info.ip_1 , info.maker , info.state , info.info_group , groups.group_id , groups.group_name from info INNER JOIN groups on info.info_group = groups.group_id where info_group='$user_group' order by ip desc LIMIT 1");
$row = mysqli_fetch_assoc($sql);
$result = $row['result'];

if ($_SESSION['name']==$result) {
    ?>
                            <button name="btn_click" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Click
                            </button>




                            <?php
} else {
    ?>

                            <button name="btn_click" disabled class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Click
                            </button>
                            <?php

}

?>



                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Result Table</h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">


                        <?php
                    
if ($_SESSION['name']!='涂正刚') {
    ?>

                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">

                                </th>
                                <th>Result Name</th>
                                <th>who select</th>
                                <th>Time</th>
                            </tr>
                            <?php $sql=mysqli_query($con, "SELECT info.ip , info.date , info.result , info.maker , info.info_group , groups.group_id , groups.group_name from info INNER JOIN groups on info.info_group = groups.group_id where info_group='$user_group' order by ip desc");
                                
 
    while ($row = mysqli_fetch_assoc($sql)) {
        ?>
                            <tr>
                                <td class="p-0 text-center">

                                </td>
                                <td><?php echo $row['result']; ?>
                                </td>
                                <td>
                                    <?php echo $row['maker']; ?>
                                </td>

                                <td><?php echo $row['date']; ?>
                                </td>


                            </tr>
                            <?php

    }

    ?>

                        </table>


                        <form method="POST" enctype="multipart/form-data">
                            <?php

} else {
    ?>



                            <table class="table table-striped">
                                <tr>
                                    <th class="text-center">

                                    </th>
                                    <th>Result Name</th>
                                    <th>who select</th>
                                    <th>Time</th>
                                    <th>IP</th>
                                    <th>OS</th>
                                    <th>Function</th>
                                </tr>
                                <?php $sql_admin=mysqli_query($con, "SELECT info.ip , info.os, info.date , info.result, info.ip_1 , info.maker , info.state , info.info_group , groups.group_id , groups.group_name from info INNER JOIN groups on info.info_group = groups.group_id where info_group='$user_group' order by ip desc ");
                                
 
    while ($row_admin = mysqli_fetch_assoc($sql_admin)) {
        ?>
                                <tr>
                                    <td class="p-0 text-center">

                                    </td>
                                    <td><?php echo $row_admin['result']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_admin['maker']; ?>
                                    </td>

                                    <td><?php echo $row_admin['date']; ?>
                                    </td>
                                    <td><?php echo $row_admin['ip_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_admin['os']; ?>
                                    </td>
                                    <td>
                                        <a href="del_info.php?ip=<?php echo $row['ip'] ?>"
                                            class="btn btn-outline-danger">Delete</a>
                                    </td>



                                </tr>
                                <?php

    }

    ?>

                            </table>


                            <?php
}

?>
                            <form>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card card-danger">
        <div class="card-header">
            <h4>Users</h4>

        </div>
        <div class="card-body">
            <div class="owl-carousel owl-theme" id="users-carousel">

                <?php $sql_user=mysqli_query($con, "select * from user where user_group='$user_group' order by id ");
                                
 
while ($row_user = mysqli_fetch_assoc($sql_user)) {
    ?>

                <div>
                    <div class="user-item">
                        <img alt="image"
                            src="img/<?php echo $row_user['image']; ?>"
                            class="img-fluid">
                        <div class="user-details">
                            <div class="user-name"><?php echo $row_user['name']; ?>
                            </div>
                            <div class="text-job text-muted">Web Developer</div>
                            <div class="user-cta">

                            </div>
                        </div>
                    </div>
                </div>

                <?php

}

?>


            </div>
        </div>
    </div>


</section>





<?php

include_once 'inc/footer.php';
