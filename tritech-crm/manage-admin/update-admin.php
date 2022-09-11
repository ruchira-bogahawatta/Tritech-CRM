<?php include('../common/menu-manage.php'); ?> 

    <!-- Main Content Start -->
    
    <div class="top-header">
        <h1>Update User Details</h1>
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
            $id=$_GET['id'];

            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row ['full_name'];
                    $username = $row ['username'];
                    $user_email = $row ['user_email'];
                    $user_type = $row ['user_type'];
                }   
                else
                {
                    header('location: http://localhost/tritech-crm/manage-admin/manage-admin.php');
                }                 
            } 
            
            
        ?>
    </div>


        <form action="" method="POST">
        <table class="table-form">
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" required></td>

            </tr>
            <tr>
                <td>Username: </td> 
                <td><input type="text" name="username" value="<?php echo $username; ?>" required></td>          
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="user_email" value="<?php echo $user_email; ?>" required></td>
            </tr>
            <tr>
                <td>User Type: </td>
                <td>
                <Select name="user_type" required >
                        <option <?php if($user_type ==""){echo "selected";} ?> value=""></option>
                        <option <?php if($user_type =="Admin"){echo "selected";} ?> value="Admin">Admin</option>
                        <option <?php if($user_type =="User"){echo "selected";} ?>  value="User">User</option>
                </Select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" >
                    <input type="submit" name="submit" value="Update User" class="btn-form">
                </td>
            </tr>
        </table>

        </form>
    </div>
    <!-- Main Content End -->

    <?php

        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $user_email=$_POST['user_email'];
            $user_type=$_POST['user_type'];

            $sql = "UPDATE tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            user_email = '$user_email',
            user_type = '$user_type'
            WHERE id = '$id'
            ";

            $res = mysqli_query($conn,$sql);
            if($res == TRUE)
            {
                $_SESSION ['update'] = "<div class='alert-success'>User Account Updated Successfully</div>";
                header('location: http://localhost/tritech-crm/manage-admin/manage-admin.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='alert-failed'>Failed to Update User Account </div> ";
                header('location: http://localhost/tritech-crm/manage-admin/manage-admin.php'); 
            }


        }

    ?>

<?php include('../common/footer.php'); ?> 

