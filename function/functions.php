<?php

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['MESSAGE']=$msg;
    } else {
        $msg = "";
    }
}

//Display Message
function display_message()
{
    if (isset($_SESSION['MESSAGE'])) {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}

//error message
function display_error($error)
{
    return "<span class='alert alert-danger text-center'>$error</span>";
}

//success message
function display_success($success)
{
    return "<span class='alert alert-success  text-center'>$success</span>";
}

//get safe  value
function safe_value($con, $value)
{
    return mysqli_real_escape_string($con, $value);
}



//--------------------- login ---------------------------- //


function login_system()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_login'])) {
        global $con;
        $name = safe_value($con, $_POST['name']);
        
        
        if (empty($name)) {
            set_message(display_error("Please fill in the blanks"));
        } else {
            $user_check="SELECT * FROM user WHERE name='$name' ";
            $result=mysqli_query($con, $user_check);
            $user = mysqli_fetch_assoc($result);
            


            if ($user) {
                $_SESSION['ADMIN']=$user;
                $_SESSION['id']=$user['id'];
                $_SESSION['name']=$user['name'];
                $_SESSION['image']=$user['image'];
                $_SESSION['user_group']=$user['user_group'];
                header("location: index.php");
            } else {
                set_message(display_error("You have enter wrong username"));
            }
        }
    }
}

//-------------------------- end login ------------------------------------//


//-------------------------- show pic -------------------------------------//



function rand1()
{
    function getIPAddress()
    {
        //whether ip is from the share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    $con = mysqli_connect("localhost", "root", "XN81ptn(NUf3Z)Gi", "random");


    $client = $_SERVER['HTTP_USER_AGENT'];
    $date_time = date("Y/m/d");
    $OS = explode(";", $client)[1];
    #$Browser = end(explode(" ", $client));#
    #echo $client . "<br>" ;
    $ip = getIPAddress();
    $name = $_SESSION['name'];
    $group = $_SESSION['user_group'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_click'])) {
        global $con;


        $sql=mysqli_query($con, "select name from user where not name='$name' and state='1' and user_group='$group'  order by RAND()  LIMIT 1 ");

        $row = mysqli_fetch_assoc($sql);

        //echo $row['name'];

        $result = $row['name'];

        


        if ($result == $name) {
            echo 'name';
        } else {
            $sql = "INSERT INTO info ( os, result , ip_1 , maker ,  info_group ) VALUES ('$OS', '$result' ,'$ip' , '$name' , '$group' )";
            echo $result;
            if (mysqli_query($con, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }
}





#------------------------------------------------------------

function save_user()
{
    global $con;

   

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_btn'])) {
        $user_name = safe_value($con, $_POST['user_name']);
        $group_id = safe_value($con, $_POST['group_id']);
        $img = $_FILES['img']['name'];
        $type = $_FILES['img']['type'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $size = $_FILES['img']['size'];
      
      

        $img_ext = explode('.', $img);

        $img_correct_ext = strtolower(end($img_ext));
        $allow = array('jpg' , 'jpeg' , 'png' , 'gif');
        $path  = "img/".$img;

     

        if (empty($user_name) || empty($group_id) || empty($img)) {
            set_message(display_error("Please Fill in the blanks"));
        } else {
            if (in_array($img_correct_ext, $allow)) {
                //image size only <5MB
                if ($size<500000) {
                    $exit = "select * from user where name='$user_name'";
                    $sql = mysqli_query($con, $exit);

                    if (mysqli_fetch_assoc($sql)) {
                        set_message(display_error("Sorry! User alread Exit"));
                    } else {
                        $query = "INSERT INTO user (name ,  image , state , user_group ) values ('$user_name' , '$img' , '1' , '$group_id' )";
                        $result = mysqli_query($con, $query);
                   
                        if ($result) {
                            set_message(display_success("User has been save in the database"));
                            move_uploaded_file($tmp_name, $path);
                        }
                    }
                } else {
                    set_message(display_error("You image size too large "));
                }
            } else {
                set_message(display_error("You can't store this file :("));
            }
        }
    }
}


function active_status()
{
    global $con;
    if (isset($_GET['opr']) && $_GET['opr']!="") {
        $operation = safe_value($con, $_GET['opr']);
        $id = safe_value($con, $_GET['id']);

        if ($operation=='active') {
            $state = 1;
        } else {
            $state = 0;
        }
        $query = "update user set state='$state' where id='$id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("location:user.php");
        }
    }
}




function save_group()
{
    global $con;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['group_btn'])) {
        $group_name = safe_value($con, $_POST['group_name']);
       
        if (empty($group_name)) {
            set_message(display_error("Please Fill in the blanks"));
        } else {
            $exit = "select * from groups where group_name='$group_name'";
            $sql = mysqli_query($con, $exit);
            if (mysqli_fetch_assoc($sql)) {
                set_message(display_error("Sorry! Group alread Exit"));
            } else {
                $query = "INSERT INTO groups ( group_name ,  state  ) values ('$group_name' , '1'  )";
                $result = mysqli_query($con, $query);
           
                if ($result) {
                    set_message(display_success("Group has been save in the database"));
                }
            }
        }
    }
}

function active_group()
{
    global $con;
    if (isset($_GET['opr']) && $_GET['opr']!="") {
        $operation = safe_value($con, $_GET['opr']);
        $id = safe_value($con, $_GET['id']);

        if ($operation=='active') {
            $state = 1;
        } else {
            $state = 0;
        }
        $query = "update groups set state='$state' where group_id='$id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("location:group.php");
        }
    }
}

function view_group()
{
    global $con;
    $sql = "SELECT * FROM groups";
    return mysqli_query($con, $sql);
}
