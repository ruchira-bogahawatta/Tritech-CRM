<?php include('../common/menu-user.php'); ?> 

    <!-- Content Start -->
    <div class="top-header">
        <h1>Currently Running Campaigns</h1> 
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
        <br> <br>
        <table class="table-main">
            <tr>
                <th>Campaign ID</th>
                <th>Campaign Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget (Rs)</th>
                <th>Type</th>
            </tr>
            
            <?php

                $sql = "SELECT * FROM tbl_campaign";
                $res = mysqli_query($conn, $sql); 
                if($res == TRUE)
                {
                        $count = mysqli_num_rows($res); //calculate number of rows
                        
                        if($count>0)
                         {

                            while($rows=mysqli_fetch_assoc($res))
                            {
                            $id=$rows['id'];
                            $camp_name=$rows['camp_name'];
                            $start_date=$rows['start_date'];
                            $end_date=$rows['end_date'];
                            $budget=$rows['budget'];
                            $type=$rows['type'];
                            
                            ?>
                            <tr>
                                <td><?php echo $id; ?> </td>
                                <td><?php echo $camp_name; ?></td>
                                <td><?php echo $start_date; ?></td>
                                <td><?php echo $end_date; ?></td>
                                <td><?php echo $budget; ?></td>
                                <td><?php echo $type; ?></td>
                            </tr>
                            <?php 

                        }
                    }
                    else
                    {

                    }
             }
        ?>
        </table>
    </div>



<?php include('../common/footer.php'); ?> 