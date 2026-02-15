<?php 
	define('PAGE','Sell Product'); 
	define('TITLE','Assets');
    include('../dbConnection.php');
	include('includes/header.php');
		
	if(isset($_REQUEST['issue']))
		{
			$sql = "SELECT * FROM assets_tb WHERE pid ={$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
		}
	if(isset($_REQUEST['psubmit']))
	{
		if( ($_REQUEST['cname']=="") || ($_REQUEST['cadd']=="") ||($_REQUEST['pname']=="") ||($_REQUEST['pava']=="") || ($_REQUEST['pquantity']=="") || ($_REQUEST['psellingcost']=="") || ($_REQUEST['totalcost']=="") || ($_REQUEST['sellDate']=="") )
		{
			$msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2 " role="alert">Fill All Fields</div>';
		}
		else
		{
			$pid = $_REQUEST['pid'];
			$pava = $_REQUEST['pava'] - $_REQUEST['pquantity'];
			$custname = $_REQUEST['cname'];
			$custadd = $_REQUEST['cadd'];
			$cpname = $_REQUEST['pname'];
			$cpquantity = $_REQUEST['pquantity'];
			$cpeach = $_REQUEST['psellingcost'];
			$cptotal = $_REQUEST['totalcost'];
			$cpdate = $_REQUEST['sellDate'];
			$sql ="INSERT INTO customer_tb(custname, custadd, cpname ,cpquantity, cpeach, cptotal, cpdate) VALUES('$custname', '$custadd','$cpname','$cpquantity', '$cpeach','$cptotal','$cpdate')";
			if($conn->query($sql)==TRUE)
			{
				$genid = mysqli_insert_id($conn);
				session_start();
				$_SESSION['myid']= $genid;
				echo"<script>location.href='productsellsuccess.php';</script>";
			}
			$sqlup = "UPDATE assets_tb SET pava = '$pava' WHERE pid = '$pid' ";
			$conn->query($sqlup);
			
		}
	}
	


?>


<!--Start 2nd column-->
<div class="col-sm-9 col-md-10 py-5 px-2 maincontentheight" style="background-color:#F2F6F8;">

<h3 class="text-center">Customer Bill</h3>

<form action="" method="POST">
	    <div class="form-group">
			<label for="pid">Product ID</label>
			<input type="text" class="form-control" name="pid" value="<?php if(isset($row['pid'])){echo $row['pid'];}?>" id="pid" readonly>
		</div>
		<div class="form-group">
			<label for="cname">Customer Name</label>
			<input type="text" class="form-control" name="cname"  id="cname">
		</div>
		<div class="form-group">
			<label for="cadd">Customer Address</label>
			<input type="text" class="form-control" name="cadd"  id="cadd">
		</div>
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" class="form-control" name="pname" value="<?php if(isset($row['pname'])){echo $row['pname'];}?>" id="pname" >
		</div>
		<div class="form-group">
			<label for="pava">Available</label>
			<input type="text" class="form-control" name="pava" value="<?php if(isset($row['pava'])){echo $row['pava'];}?>" id="pava" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="pquantity">Quantity</label>
			<input type="text" class="form-control" name="pquantity"  id="pquantity" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="psellingcost">Price Each</label>
			<input type="text" class="form-control" name="psellingcost" id="psellingcost" value="<?php if(isset($row['psellingcost'])){echo $row['psellingcost'];}?>" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="totalcost">Total Price</label>
			<input type="text" class="form-control" name="totalcost" id="totalcost"  onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="inputDate">Date</label>
			<input type="date" class="form-control" name="sellDate" id="inputDate"  onkeypress="isInputNumber(event)">
		</div>
		<div class="text-center">	
			<button type="submit" class="btn btn-primary mt-3" id="psubmit" name="psubmit" >Submit</button>
			<a href="assets.php" class="btn btn-secondary mt-3">Close</a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>
<!--End 2nd column-->
<?php include('includes/footer.php') ?>