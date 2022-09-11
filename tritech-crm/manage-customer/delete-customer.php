<?php
    include('../config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_customer WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='alert-success'> Customer Deleted Successfully </div>";
        header('location: http://localhost/tritech-crm/manage-customer/manage-customer.php');
    }
    else
    {
        $_SESSION['delete']= "<div class='alert-failed'> Failed To Delete customer </div>";
        header('location: http://localhost/tritech-crm/manage-customer/manage-customer.php');
    }
?>