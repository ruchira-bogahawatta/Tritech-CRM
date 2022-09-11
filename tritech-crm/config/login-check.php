<?php 

    if(!isset($_SESSION['user'])) 
    {
        $_SESSION['no-login-message'] = "<div class='login-alert-failed' text-center'>Please login to get to access TriTech CRM</div>";
        header('location: http://localhost/tritech-crm/');
    }

?>