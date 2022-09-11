<?php include('../common/menu-user.php'); ?> 
    <div class="top-header">
    <h1>Update Lead Details</h1>
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
                    header('location: http://localhost/tritech-crm/user-home/manage-lead.php');
                }                 
            }  
            ?>


        <form action="" method="POST">
        <table class="table-form">
            <tr>
                <td>Lead Name: </td>
                <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" required></td>

            </tr>
            <tr>
                <td>Contact: </td>
                <td><input type="text" name="contact" value="<?php echo $contact; ?>" maxlength="10" size="10" required></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" value="<?php echo $email; ?>" required></td>
            </tr>
           
            <tr>
                <td>Date: </td>
                <td><input type="date" name="date" value="<?php echo $date; ?>" required></td>
            </tr>
            <tr>
                <td>Status: </td>
                <td>
                <Select name="status" required>
                        <option <?php if($status =="Interested"){echo "selected";} ?> value="Interested">Interested</option>
                        <option <?php if($status =="Consideration"){echo "selected";} ?>  value="Consideration">Consideration</option>
                        <option <?php if($status =="Follow up"){echo "selected";} ?>  value="Follow up">Follow up</option>
                        <option <?php if($status =="Not Interested"){echo "selected";} ?>  value="Not Interested">Not Interesred</option>                            
                    </Select>
                </td>
            </tr>
            <tr>
                <td>Campaign ID: </td>
                <td>
                <input type="number" name="campaign_id" value="<?php echo $campaign_id; ?>" >
                </td>
            </tr>
            <tr>
                <td>Source of the Lead: </td>
                <td>
                <Select name="source" >
                        <option <?php if($source ==""){echo "selected";} ?> value=" "></option>
                        <option <?php if($source =="Youtube Commercial"){echo "selected";} ?> value="Youtube Commercial">Youtube Commercial</option>
                        <option <?php if($source =="Facebook Ad"){echo "selected";} ?>  value="Facebook Ad">Facebook Ad</option>
                        <option <?php if($source =="TV Commercial"){echo "selected";} ?>  value="TV Commercial">TV Commercial</option>
                        <option <?php if($source =="Leaflet"){echo "selected";} ?>  value="Leaflet">Leaflets</option>
                        <option <?php if($source =="Donation"){echo "selected";} ?>  value="Donation">Donations and Charities</option>
                        <option <?php if($source =="Other Social Media"){echo "selected";} ?> value="Other Social Media">Other Social Media</option>
                        <option <?php if($source =="Referrals"){echo "selected";} ?>  value="Referrals">Referrals</option>
                </Select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" >
                    <input type="submit" name="submit" value="Update Lead" class="btn-form">
                </td>
            </tr>
        </table>

        </form>
    </div>
    <!-- Main Content End -->

    <?php

        if(isset($_POST['submit']))
        {
            //Get All the Values from Form
            $full_name = $_POST['full_name']; 
            $date = date('y-m-d',strtotime($_POST['date']));
            $email = $_POST['email'];
            $source = $_POST['source'];
            $campaign_id = $_POST['campaign_id'];
            $contact = $_POST['contact'];  
            $status = $_POST['status'];  


            //Update the Values
            $sql2 = "UPDATE tbl_lead SET
            full_name = '$full_name',
            email = '$email',
            contact='$contact',
            date = '$date',
            status= '$status',
            source= '$source',
            campaign_id= '$campaign_id'

            WHERE id=$id
            ";

            $res2 = mysqli_query($conn,$sql2);

            if($res2 == TRUE)
            {
                $_SESSION ['update'] = "<div class='alert-success'>Lead Updated Successfully</div>";
                header('location: http://localhost/tritech-crm/user-home/manage-lead.php');
                echo "<script>window.location.href='http://localhost/tritech-crm/user-home/manage-lead.php'; </script>";
            }
            else
            {
                $_SESSION['update'] = "<div class='alert-failed'>Failed to Update Lead </div> ";
                header('location: http://localhost/tritech-crm/user-home/manage-lead.php');
                echo "<script>window.location.href='http://localhost/tritech-crm/user-home/manage-lead.php'; </script>"; 
            }


        }

    ?>

<?php include('../common/footer.php'); ?> 

