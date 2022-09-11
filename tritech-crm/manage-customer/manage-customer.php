<?php include('../common/menu-manage.php'); ?> 

    <!-- Content Start -->
    <div class="top-header">
        <h1>Manage Customers</h1>
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

                <!-- Add Customer Button -->
                <a href="add-customer.php" class="btn-main"><i class="fas fa-plus"></i> Customer</a>
        <br> <br>
        <table class="table-main">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Registered Date</th>
                <th>Address</th>
                <th style="width: 150px;" >Actions</th>
            </tr>
            <?php

        $sql = "SELECT * FROM tbl_customer";
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
                    $email=$rows['email'];
                    $reg_date=$rows['reg_date'];
                    $address=$rows['address'];
                    
                    ?>
                    <tr>
                        <td><?php echo $id; ?> </td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $contact; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $reg_date; ?></td>
                        <td><?php echo $address; ?></td>
                        
                        <td>
                        <a href="update-customer.php?id=<?php echo $id; ?>" class="btn-green"><i class="fas fa-edit"></i></a>
                        <a href="delete-customer.php?id=<?php echo $id; ?>" class="btn-red"><i class="fas fa-trash-alt"></i></a>
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