<?php
include './connect.php';
$q=$_GET['q'];
$sel=mysqli_query($dbcon,"select * from ptreg where comid='$q'");
if(mysqli_num_rows($sel)>0)
{
    $r=mysqli_fetch_row($sel);
    echo"$r[1],$r[8]";
}
 else {
    echo"0";
}
?>