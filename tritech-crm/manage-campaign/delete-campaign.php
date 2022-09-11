<?php
    include('../config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_campaign WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='alert-success'> Campaign Deleted Successfully </div>";
        header('location: http://localhost/tritech-crm/manage-campaign/manage-campaign.php');
    }
    else
    {
        $_SESSION['delete']= "<div class='alert-failed'> Failed To Delete Campaign </div>";
        header('location: http://localhost/tritech-crm/manage-campaign/manage-campaign.php');
    }
?>