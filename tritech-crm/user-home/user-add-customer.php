<?php include('../common/menu-user.php'); ?> 

    <!-- Main Content Start -->
    <div class="top-header">
        <h1>Add a New Customer</h1>
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
                <td>Customer Name: </td>
                <td><input type="text" name="full_name" placeholder="Enter Name" required></td>
            </tr>
            <tr>
                <td>Contact: </td>
                <td><input type="text" name="contact" placeholder="Enter Contact" maxlength="10" size="10" required ></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" placeholder="Enter Email"  required></td>
            </tr>
            <tr>
                <td>Registered Date: </td>
                <td><input type="date" name="reg_date" required></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><input type="text" name="address" placeholder="Enter Address"  required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Customer" class="btn-form">
                </td>
            </tr>
        </table>
        </form>
    </div>
    <!-- Main Content End -->

<?php include('../common/footer.php'); ?> 

<?php 

    if(isset($_POST['submit'])) //whether the submit value is passed
    {
        $full_name = $_POST['full_name']; //Get Values from form
        $reg_date = date('y-m-d',strtotime($_POST['reg_date']));
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $address = $_POST['address'];          

        $sql = "INSERT INTO tbl_customer SET
            full_name = '$full_name',
            reg_date = '$reg_date',
            contact= '$contact',
            address='$address',
            email='$email'
        ";
        
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='alert-success'> Customer Successfully Added </div>";
            header('location: http://localhost/tritech-crm/user-home/user-customer.php'); 
        }
        else
        {
            $_SESSION['add'] = "<div class='alert-failed'>Failed to Add Customer </div> ";
            header('location: http://localhost/tritech-crm/user-home/user-customer.php'); 
        }  
    }


?>