<?php
define('TITLE', 'View User Request');
define('PAGE', 'UserRequest');
include('includes/header.php');
include('../dbConnection.php');

// Check if ID exists in URL
if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger mt-4'>No Request ID provided.</div>";
    include('includes/footer.php');
    exit;
}

// Get ID safely
$requestID = intval($_GET['id']);

// Fetch request details from submitrequest2_tb
$sql = "SELECT * FROM submitrequest2_tb WHERE request_id = $requestID";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "<div class='alert alert-danger mt-4'>Request not found.</div>";
    include('includes/footer.php');
    exit;
}
?>

<div class="container-fluid mt-5">
    <div class="row">

        <?php include('includes/sidebar.php'); ?>

        <div class="col-sm-9 col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Request Details</h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Request ID</th>
                            <td><?= $row['request_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?= $row['requester_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email ID</th>
                            <td><?= $row['requester_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Request Info</th>
                            <td><?= $row['request_info']; ?></td>
                        </tr>
                        <tr>
                            <th>Request Description</th>
                            <td><?= $row['request_desc']; ?></td>
                        </tr>
                        <tr>
                            <th>Request Date</th>
                            <td><?= $row['requester_date']; ?></td>
                        </tr>
                    </table>

                    <!-- Back Button -->
                    <a href="Yourrequests.php" class="btn btn-secondary d-print-none">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('includes/footer.php'); ?>