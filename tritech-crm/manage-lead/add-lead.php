<?php include('../common/menu-manage.php'); ?> 

    <!-- Main Content Start -->
    <div class="top-header">
        <h1>Add a New Lead</h1>
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
        <form action="" method="POST">
        <table class="table-form">

            <tr>
                <td>Lead Name: </td>
                <td><input type="text" name="full_name" placeholder="Enter Lead Name" required></td>
            </tr>
            <tr>
                <td>Contact: </td>
                <td><input type="text" name="contact" placeholder="Enter Contact" maxlength="10" size="10" required></td>
            </tr>
            <tr>
                <td>Email:</td> <br>
                <td><input type="text" name="email" placeholder="Enter Email"  required></td>
            </tr>
            <tr>
                <td>Date:</td> <br>
                <td><input type="date" name="date" required></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                <Select name="status" required>
                        <option value="Interested">Interested</option>
                        <option value="Consideration">Consideration</option>
                        <option value="Follow up">Follow up</option>
                        <option value="Not Interested">Not interested</option>
                    </Select>
                </td>
            </tr>
            <tr>
                <td>Campaign Title:</td>
                <td>
                <Select name="campaign_id">
                <option selected>Select the Campaign if any</option>
                    <?php
                        $sql="SELECT * FROM tbl_campaign";

                        $res1= mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res1);

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res1))
                            {
                                $id = $row['id'];
                                $camp_name = $row['camp_name'];
                                $type = $row['type'];

                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $camp_name; ?> - <?php echo $type; ?></option>
                                <?php

                            }
                            
                        }
                        else
                        {
                            ?>
                            
                            
                            <?php
                        }


                    ?>
                        
                    </Select>
                </td>
            </tr>
            <tr>
                <td>Source of the Lead:</td> 
                <td>
                <Select name="source">
                        <option value="" selected>Select the Source</option>
                        <option value="Youtube Commercial">Youtube commercial</option>
                        <option value="Facebook Ad">Facebook & Instagram</option>
                        <option value="TV Commercial">TV Commercial</option>
                        <option value="Leaflet">Leaflets</option>
                        <option value="Donation">Donations & Charities</option>
                        <option value="Other Social Media">Other Social Media</option>
                        <option value="Referral">Referrals</option>   
                    </Select>
                </td>
            </tr>
            <tr>
                <td colspan="2"> 
                    <input type="submit" name="submit" value="Add Lead" class="btn-form">
                </td>
            </tr>
        </table>

        </form>
    </div>
    <!-- Main Content End -->

<?php include('../common/footer.php'); ?> 

<?php 

    if(isset($_POST['submit'])) //Whether the submit value is passed
    {
        $full_name = $_POST['full_name'];   //Get Values from form
        $date = date('y-m-d',strtotime($_POST['date']));
        $email = $_POST['email'];
        $source = $_POST['source'];
        $campaign_id = $_POST['campaign_id'];
        $contact = $_POST['contact'];  
        $status = $_POST['status'];       

        $sql = "INSERT INTO tbl_lead SET
            full_name = '$full_name',
            email = '$email',
            contact='$contact',
            date = '$date',
            status= '$status',
            source= '$source',
            campaign_id= '$campaign_id' 
        ";
        
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //Execute query

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='alert-success'> Lead Successfully Added </div>";
            header('location: http://localhost/tritech-crm/manage-lead/manage-lead.php'); 
            echo "<script>window.location.href='http://localhost/tritech-crm/manage-lead/manage-lead.php'; </script>";
        }
        else
        {
            $_SESSION['add'] = "<div class='alert-failed'>Failed to Add Lead </div> ";
            header('location: http://localhost/tritech-crm/manage-lead/manage-lead.php');
            echo "<script>window.location.href='http://localhost/tritech-crm/manage-lead/manage-lead.php'; </script>"; 
        }  
    }
?>