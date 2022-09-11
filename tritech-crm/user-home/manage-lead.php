<?php include('../common/menu-user.php'); ?> 

    <!-- Content Start -->
    <div class="top-header">
        <h1>Manage Your Leads</h1>
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
            <div class="alert-header">   
                <?php
                    if(isset($_SESSION['add']))
                    {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['update']))
                    {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                    }
                ?>
            </div>

                <!-- Add Admin Button -->
                <a href="add-lead.php" class="btn-main"><i class="fas fa-plus"></i> Lead</a>
        <br> <br>
        <table class="table-main">
            <tr>
                <th>Lead ID</th>
                <th>Full Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Status</th>  <!-- DROPDOWN --> 
                <th >Actions</th>
            </tr>
             <?php

                $sql = "SELECT * FROM tbl_lead";
                $res = mysqli_query($conn, $sql); 
                if($res == TRUE)
                {
                        $count = mysqli_num_rows($res); //calculate number of rows
                        
                        if($count>0)
                         {

                            while($rows=mysqli_fetch_assoc($res))
                            {
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $contact=$rows['contact'];
                            $status=$rows['status'];
                            $email=$rows['email'];
                            
                            ?>
                            <tr>
                                <td><?php echo $id; ?> </td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $contact; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $status; ?></td>
                                <td>

                                <a href="convert-lead.php?id=<?php echo $id; ?>" class="btn-pass">Converted</a>
                                <a href="view-lead.php?id=<?php echo $id; ?>" class="btn-pass">View More</a>
                                <a href="update-lead.php?id=<?php echo $id; ?>" class="btn-green"><i class="fas fa-edit"></i></a>
                                <a href="delete-lead.php?id=<?php echo $id; ?>" class="btn-red"><i class="fas fa-trash-alt"></i></a>
                                </td>
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
    <!-- Content End -->

<?php include('../common/footer.php'); ?> 