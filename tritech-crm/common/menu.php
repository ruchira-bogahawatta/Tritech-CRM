<?php include ('config/constants.php');  //<Adding constant.php since menu appears in every page
      include('config/login-check.php');
?>  
<html>
<head>
    <title>TriTech CRM</title> <!-- Dashboard Page -->
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="js/date-time.js" ></script>
    
</head>
<body onload="initClock()">
    <!-- Menu Start -->
    <div class = "main-wrapper">
    <div class="menu">
        <div class="wrapper-menu">
        <ul>
             <a href ="home.php"><img src="assets/logo2.svg" alt="product_logo" class="prod-logo"></a>
             <div class="user-account">
             <i class="fas fa-circle-notch"></i>
             <p><?php echo $_SESSION['username'] ?> <br>
            <span class = "account-type">Administrator</span>
            </p>
             </div>
             <li><a href ="home.php"><i class="fas fa-th-large"></i> Dashboard</a></li>
             <li><a href ="manage-campaign/manage-campaign.php"><i class="fas fa-project-diagram"></i> Campaigns</a></li>
             <li><a href ="manage-lead/manage-lead.php"><i class="fas fa-tags"></i> Leads</a></li>
             <li><a href ="manage-customer/manage-customer.php"> <i class="fas fa-users"></i></i> Customers</a></li>
             <li><a href ="manage-admin/manage-admin.php"><i class="fas fa-user-cog"></i></i> Admin Panel</a></li>
             <li><a href ="support-doc.php"><i class="fas fa-question-circle"></i> Support</a></li>
             <li><a href ="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
        </div>
    </div>
    <!-- Menu End -->