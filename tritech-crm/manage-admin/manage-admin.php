<?php include('../common/menu-manage.php'); ?> 

    <!-- Content Start -->
    <div class="top-header">
      <h1>Manage Users</h1>
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
            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }

            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }

            if(isset($_SESSION['add']))
            {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            }

            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            
            if(isset($_SESSION['pwd-not-match']))
            {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }
            
        ?>
    </div>  
        <!-- Add Admin Button -->
        <a href="add-admin.php" class="btn-main"><i class="fas fa-plus"></i> Admin/User</a>
        <br> <br>
        <table class="table-main">
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Actions</th>
            </tr>

            <?php
            
            $sql = "SELECT * FROM tbl_admin";
            $res = mysqli_query($conn, $sql);    

            if($res == TRUE)
            {
                $count = mysqli_num_rows($res); //calculate number of rows
                
                if($count>0)
                {
                   // $id_num = 1;  for ID number

                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];
                        $user_email=$rows['user_email'];
                        $user_type=$rows['user_type'];
                        
                        ?>
                        <tr>
                            <td><?php echo $id; ?> </td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $user_email; ?></td>
                            <td><?php echo $user_type; ?></td>
                            <td>
                            <a href="update-admin.php?id=<?php echo $id; ?>" class="btn-green"><i class="fas fa-edit"></i></a>
                            <a href="delete-admin.php?id=<?php echo $id; ?>" class="btn-red"><i class="fas fa-trash-alt"></i></a>
                            <a href="update-password.php?id=<?php echo $id; ?>" class="btn-pass">Change Password</a>  
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