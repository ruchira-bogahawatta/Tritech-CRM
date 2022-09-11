<?php include('../common/menu-user.php'); ?> 

    <!-- Main Content Start -->
    <div class="top-header">
        <h1>Update Customer Details</h1>
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
        <?php
            $id=$_GET['id'];

            $sql = "SELECT * FROM tbl_customer WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $contact = $row['contact'];
                    $email = $row['email'];
                    $reg_date=$row['reg_date'];
                    $address=$row['address'];
                }   
                else
                {
                    header('location: http://localhost/tritech-crm/user-home/user-customer.php');
                }                 
            } 
            
            
        ?>


        <form action="" method="POST">
        <table class="table-form">
            <tr>
                <td>Customer Name: </td>
                <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>

            </tr>
            <tr>
                <td>Contact: </td> 
                <td><input type="text" name="contact" value="<?php echo $contact; ?>" maxlength="10" size="10" ></td>          
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" value="<?php echo $email; ?>" ></td>
            </tr>
            <tr>
                <td>Registered Date: </td>
                <td><input type="date" name="reg_date" value="<?php echo $reg_date; ?>" ></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><input type="text" name="address" value="<?php echo $address; ?>" ></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" >
                    <input type="submit" name="submit" value="Update Customer" class="btn-form">
                </td>
            </tr>
        </table>

        </form>
    </div>
    <!-- Main Content End -->

    <?php

        if(isset($_POST['submit']))
        {   
            $id = $_POST['id'];         //Get Values from form
            $full_name = $_POST['full_name']; 
            $reg_date = date('y-m-d',strtotime($_POST['reg_date']));
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $address = $_POST['address'];  

            $sql2 = "UPDATE tbl_customer SET
            full_name = '$full_name',
            reg_date = '$reg_date',
            contact= '$contact',
            address='$address',
            email='$email'

            WHERE id = $id
            ";

            $res2 = mysqli_query($conn,$sql2);
            if($res2 == TRUE)
            {
                $_SESSION ['update'] = "<div class='alert-success'>Customer Updated Successfully</div>";
                header('location: http://localhost/tritech-crm/user-home/user-customer.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='alert-failed'>Failed to Update Customer </div> ";
                header('location: http://localhost/tritech-crm/user-home/user-customer.php'); 
            }


        }

    ?>

<?php include('../common/footer.php'); ?> 

