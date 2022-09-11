<?php include ('../config/constants.php');  //Adding constant.php since menu appears in every page
      include('../config/login-check.php');
?> 
<html>
<head>
    <title>TriTech CRM</title> <!-- Dashboard Page -->
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="../js/date-time.js" ></script>
</head>
<body onload="initClock()">
    <!-- Menu Start -->
    <div class = "main-wrapper">
    <div class="menu">
        <div class="wrapper-menu">
        <ul>
            <a href ="user-home.php"><img src="../assets/logo2.svg" alt="product_logo" class="prod-logo"></a>
            <div class="user-account">
             <i class="fas fa-circle-notch"></i>
             <p><?php echo $_SESSION['username'] ?> <br>
             <span class = "account-type">User</span>
            </p>
             </div>
             <li><a href ="user-home.php"><i class="fas fa-th-large"></i> Dashboard</a></li>
             <li><a href ="user-campaign.php"><i class="fas fa-project-diagram"></i> Campaigns</a></li>
             <li><a href ="manage-lead.php"><i class="fas fa-tags"></i> Leads</a></li>
             <li><a href ="user-customer.php"><i class="fas fa-users"></i> Customers</a></li>
             <li><a href ="user-support-doc.php"><i class="fas fa-question-circle"></i> Support</a></li>
             <li><a href ="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
        </div>
    </div>
    <!-- Menu End -->