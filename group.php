<?php

require_once 'inc/header.php';
include_once 'inc/nav.php';
active_group();

?>


<?php

if ($_SESSION['name']=='涂正刚') {
    ?>


<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form method="POST" novalidate="novalidate" enctype="multipart/form-data">
                <?php
                                    
                                    save_group();
    
    ?>
                <?php
    display_message();
    ?>
                <div class="card-header">
                    <h4>Add Group</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="group_name" class="form-control">
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" name="group_btn" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Group Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Name</th>

                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql=mysqli_query($con, "select * from groups order by group_id desc ");
                                
 
    while ($row = mysqli_fetch_assoc($sql)) {
        ?>
                        <tr>


                            <td>
                                1
                            </td>
                            <td><?php echo $row['group_name']; ?>
                            </td>

                            <td>
                                <?php
                                
                                if ($row['state']==1) {
                                    echo " <div class='badge badge-success badge-shadow'>Active</div>";
                                } else {
                                    echo " <div class='badge badge-warning badge-shadow'>Deactive</div>";
                                }
                                
        ?>

                            </td>
                            <td>
                                <?php
                                
        if ($row['state']==1) {
            echo  "<a href='group.php?opr=deactive&id=".$row['group_id']."'class='btn btn-outline-success' >Active</a>";
        } else {
            echo " <a href='group.php?opr=active&id=".$row['group_id']."'class='btn btn-outline-warning' >Deactive</a>";
        }

        ?>

                                <a href="del_group.php?id=<?php echo $row['group_id'] ?>"
                                    class="btn btn-outline-danger">Delete</a>



                            </td>



                        </tr>
                        <?php

    }

    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php
} else {
    ?>



<div class="page-inner">
    <h1>404</h1>
    <div class="page-description">
        The page you were looking for could not be found.
    </div>
</div>




<?php
}

?>











<?php include_once 'inc/footer.php';
