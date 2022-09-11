<?php include('../common/menu-user.php'); ?> 
    <!-- Content Start -->
    <div class="top-header">
            <h1>Dashboard</h1>
                <!--digital clock start-->
    <div class="date-time">
        <div class="date">
            <span id="daynum">00</span>-
            <span id="dayname">Day</span> 
            <span id="month">Month</span>
 
            <span id="year">Year</span>
        </div>

        <div class="time">
            <span id="hour">00</span>:
            <span id="minutes">00</span>:
            <span id="seconds">00</span>
            <span id="period">AM</span>
        </div>
        <!--digital clock end-->
        </div>
    </div>
    <div class="main-content">
    <div class="top-login">
                <?php
                    if(isset($_SESSION['login']))
                    {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                    }
                ?>
            </div>

            <div class="dashboard1">
            
            <div class="dash-box">
            <?php 
                        $sql = "SELECT * FROM tbl_lead";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        
                    ?>           

                <img src="../assets/lead.png" alt="leads">

                <h2>Leads <br><?php echo $count; ?></h2>
                
            </div>
            
            <div class="dash-box">
            <?php 
                        $sql = "SELECT * FROM tbl_customer WHERE type = 'converted'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        
                    ?>   
            <img src="../assets/conversion.png" alt="convertions">
            <h2>Convertions <br> <?php echo $count; ?></h2>                   
            </div>
            
            <div class="dash-box">
            <?php 
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                    ?>  
            <img src="../assets/user.png" alt="Users">
            <h2>Users <br><?php echo $count; ?></h2>
            </div>
            
            <div class="dash-box">
            <?php 
                        $sql = "SELECT * FROM tbl_customer";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                    ?>  
            <img src="../assets/users.png" alt="customers">
            <h2>Customers <br><?php echo $count; ?></h2>
            </div>
        </div> 
        <div class="clear"></div>
        
   <div class="charts">    
        <div class="chart1"><h2>Lead Sources</h2></div>
        <canvas id="doughnut" class="chart1"></canvas>  
    </div> 

   <div class = "dash-budget">
                <?php 
                        $sql = "SELECT * FROM tbl_campaign";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        $sql2 = "SELECT SUM(budget) AS budget FROM tbl_campaign";
                        $res2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($res2);
                        $total_budget = $row2['budget'];
                    ?>  
        <h2><i class="fas fa-link"></i>&nbsp;&nbsp; Total Campaigns:&nbsp;&nbsp; <?php echo $count; ?>  </h2>
        <h2><i class="fas fa-coins"></i>&nbsp;&nbsp; Total Budget (Rs):&nbsp;&nbsp; <?php echo $total_budget; ?>  </h2>

    </div>  
    <div class = "dash-lead-status">
                <?php 
                        $sql3 = "SELECT * FROM tbl_lead WHERE status = 'Interested'";
                        $res3 = mysqli_query($conn, $sql3);
                        $interested = mysqli_num_rows($res3);

                        $sql3 = "SELECT * FROM tbl_lead WHERE status = 'Consideration'";
                        $res3 = mysqli_query($conn, $sql3);
                        $consideration = mysqli_num_rows($res3);

                        $sql3 = "SELECT * FROM tbl_lead WHERE status = 'Follow up'";
                        $res3 = mysqli_query($conn, $sql3);
                        $follow_up = mysqli_num_rows($res3);

                        $sql3 = "SELECT * FROM tbl_lead WHERE status = 'Not Interested'";
                        $res3 = mysqli_query($conn, $sql3);
                        $not_interested = mysqli_num_rows($res3);
                    ?>  
                    <h2>Lead Status</h2>
        <h3><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp; Interested:&nbsp;&nbsp; <?php echo $interested; ?>  </h3>
        <h3><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp; Consideration:&nbsp;&nbsp; <?php echo $consideration; ?>  </h3>
        <h3><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp; Follow Ups:&nbsp;&nbsp; <?php echo $follow_up; ?>  </h3>
        <h3><i class="fas fa-angle-double-right"></i>&nbsp;&nbsp; Not Interested:&nbsp;&nbsp; <?php echo $not_interested; ?>  </h3>


    </div>     
  
</div>
    <!-- Content End -->
    
        <?php //To obtain the lead sources

    $sql3 = "SELECT * FROM tbl_lead WHERE source = 'Youtube Commercial'";
    $res3 = mysqli_query($conn, $sql3);
    $youtube = mysqli_num_rows($res3);

    $sql3 = "SELECT * FROM tbl_lead WHERE source = 'Facebook Ad'";
    $res3 = mysqli_query($conn, $sql3);
    $fb = mysqli_num_rows($res3);

    $sql3 = "SELECT * FROM tbl_lead WHERE source = 'TV Commercial'";
    $res3 = mysqli_query($conn, $sql3);
    $tv = mysqli_num_rows($res3);

    $sql3 = "SELECT * FROM tbl_lead WHERE source = 'Leaflet'";
    $res3 = mysqli_query($conn, $sql3);
    $leaflet = mysqli_num_rows($res3);

    $sql3 = "SELECT * FROM tbl_lead WHERE source = 'Donation'";
    $res3 = mysqli_query($conn, $sql3);
    $donation = mysqli_num_rows($res3);

    $sql3 = "SELECT * FROM tbl_lead WHERE source = 'Other Social Media'";
    $res3 = mysqli_query($conn, $sql3);
    $other = mysqli_num_rows($res3);

    $sql3 = "SELECT * FROM tbl_lead WHERE source = 'Referral'";
    $res3 = mysqli_query($conn, $sql3);
    $referral = mysqli_num_rows($res3);
    ?>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script> 
    <script>const ctx = document.getElementById('doughnut').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        
        

        labels: ['Youtube', 'FB & Insta', 'TV Ad', 'Leaflet', 'Donation', 'Refferal', 'Other'],
        datasets: [{
            label: 'LEAD SOURCES',
            data: [<?php echo $youtube; ?>, <?php echo $fb; ?>, <?php echo $tv; ?>, <?php echo $leaflet; ?>, <?php echo $donation; ?>,<?php echo $referral; ?>, <?php echo $other; ?>],
            backgroundColor: [
                'rgba(231, 76, 60 )',
                'rgba(41, 128, 185)',
                'rgba(39, 174, 96)',
                'rgba(211, 84, 0)',
                'rgba(175, 122, 197)',
                'rgba(244, 208, 63 )',
                'rgba(86, 101, 115)'
            ],
            borderColor: [
                'rgba(231, 76, 60 )',
                'rgba(41, 128, 185)',
                'rgba(39, 174, 96)',
                'rgba(211, 84, 0)',
                'rgba(175, 122, 197)',
                'rgba(244, 208, 63 )',
                'rgba(86, 101, 115)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>   



<?php include('../common/footer.php'); ?> 