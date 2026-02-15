<?php 
    define('PAGE','work'); 
    define('TITLE','Work Order');
    include('../dbConnection.php');
    include('includes/header.php');
    

    $aEmail = $_SESSION['aEmail'];
?>

<div class="col-sm-9 col-md-10  px-5 py-5 maincontentheight">
    <h3 class="text-center">Assigned Work Details</h3>

    <?php
        if (isset($_REQUEST['view']) && isset($_REQUEST['id'])) {

            // Prevent SQL Injection
            $id = intval($_REQUEST['id']);

            $sql = "SELECT * FROM assignwork_tb WHERE request_id = $id";
            $result = $conn->query($sql);

            if ($result && $row = $result->fetch_assoc()) {
    ?>

            <table class="table">
                <tbody>
                    <tr><td>Request ID</td><td><?= $row['request_id'] ?></td></tr>
                    <tr><td>Request Info</td><td><?= $row['request_info'] ?></td></tr>
                    <tr><td>Request Description</td><td><?= $row['request_desc'] ?></td></tr>
                    <tr><td>Name</td><td><?= $row['requester_name'] ?></td></tr>
                    <tr><td>Address Line 1</td><td><?= $row['requester_add1'] ?></td></tr>
                    <tr><td>Address Line 2</td><td><?= $row['requester_add2'] ?></td></tr>
                    <tr><td>City</td><td><?= $row['requester_city'] ?></td></tr>
                    <tr><td>State</td><td><?= $row['requester_state'] ?></td></tr>
                    <tr><td>Pin Code</td><td><?= $row['requester_zip'] ?></td></tr>
                    <tr><td>Email</td><td><?= $row['requester_email'] ?></td></tr>
                    <tr><td>Mobile</td><td><?= $row['requester_mobile'] ?></td></tr>
                    <tr><td>Assigned Date</td><td><?= $row['assign_date'] ?></td></tr>
                    <tr><td>Technician Name</td><td><?= $row['assign_tech'] ?></td></tr>
                    <tr><td>Customer Sign</td><td></td></tr>
                    <tr><td>Technician Sign</td><td></td></tr>
                </tbody>
            </table>

            <div class="text-center">
                <button onclick="window.print()" class="btn btn-primary d-print-none">Print</button>
                <a href="work.php" class="btn btn-secondary d-print-none">Close</a>
            </div>

    <?php
            } else {
                echo "<div class='alert alert-warning'>Work order not found!</div>";
            }
        }
    ?>
</div>

<?php include('includes/footer.php'); ?>
