<?php include('../common/menu-manage.php'); ?> 
    <div class="top-header">
    <h1>Lead Details</h1>
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
    <!-- Main Content Start -->
    <div class="main-content">
        <?php
            $id=$_GET['id'];

            $sql = "SELECT * FROM tbl_lead WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {   
                    $rows=mysqli_fetch_assoc($res);
                    
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $contact=$rows['contact'];
                    $status=$rows['status'];
                    $email=$rows['email'];
                    $campaign_id=$rows['campaign_id'];
                    $source=$rows['source'];
                    $date=$rows['date'];
                }   
                else
                {
                    header('location: http://localhost/divitech-crm/manage-lead/manage-lead.php');
                }                 
            }  
            ?>


        <div class="lead-view">
            <div class="lead-container">
                <p class="lead-header">Lead ID: </p>
                <p> <?php echo $id; ?></p>
        </div>
            <div class="lead-container">
                <p class="lead-header">Lead Name: </p>
                <p> <?php echo $full_name; ?></p>

            </div>
            <div class="lead-container">
                <p class="lead-header">Contact: </p>
                <p> <?php echo $contact; ?></p>
            </div>
            <div class="lead-container">
                <p class="lead-header">Email: </p>
                <p> <?php echo $email; ?></p>
            </div>
           
            <div class="lead-container">
                <p class="lead-header">Date: </p>
                <p> <?php echo $date; ?></p>
            </div>
            <div class="lead-container">
                <p class="lead-header">Status:  </p>
                <p> <?php echo $status; ?> </p>
            </div>
            <div class="lead-container">
                <p class="lead-header">Campaign ID:  </p>
                <p><?php echo $campaign_id; ?> </p>
               
            </div>
            <div class="lead-container">
                <p class="lead-header">Source:  </p>
                <p><?php echo $source; ?></p> 
            </div>
        </div>

    </div>
    <!-- Main Content End -->

<?php include('../common/footer.php'); ?> 

