<?php
    include('../config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_lead WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='alert-success'> Lead Removed Successfully </div>";
        header('location: http://localhost/tritech-crm/manage-lead/manage-lead.php');
    }
    else
    {
        $_SESSION['delete']= "<div class='alert-failed'> Failed To Remove Lead </div>";
        header('location: http://localhost/tritech-crm/manage-lead/manage-lead.php');
    }
?>