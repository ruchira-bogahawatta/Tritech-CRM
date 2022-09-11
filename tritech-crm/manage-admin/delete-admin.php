<?php
    include('../config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='alert-success'> User Deleted Successfully </div>";
        header('location: http://localhost/tritech-crm/manage-admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete']= "<div class='alert-failed'> Failed To Delete User </div>";
        header('location: http://localhost/tritech-crm/manage-admin/manage-admin.php');
    }
?>