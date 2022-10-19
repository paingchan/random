<?php


function rand3()
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


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_click'])) {
        global $con;


        $sql=mysqli_query($con, "select name from user where state='1' order by RAND() LIMIT 1 ");

        $row = mysqli_fetch_assoc($sql);

        echo $row['name'];

        $result = $row['name'];

        //  $name = $_SESSION['name'];


        //if ($result == $name ) {
    //    echo "same";
        //}else{

//    $sql = "INSERT INTO info ( os, date , result , ip_1 , maker ) VALUES ('$OS', '$date' , '$a' ,'$ip' , '$name' )";
//    if (mysqli_query($con, $sql)) {
//    } else {
//        echo "Error: " . $sql . "<br>" . mysqli_error($con);
//    }
        //}
        //}
    }
}
echo rand3();
