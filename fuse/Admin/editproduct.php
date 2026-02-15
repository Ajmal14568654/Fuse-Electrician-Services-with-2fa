<?php 
	define('PAGE','Edit Products'); 
	define('TITLE','Assets');
    include('../dbConnection.php');
	include('includes/header.php');
		
	if(isset($_REQUEST['id']))
		{
			$sql = "SELECT * FROM assets_tb WHERE pid ={$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
		}
	if(isset($_REQUEST['pupdate']))
	{
		if( ($_REQUEST['pid']=="") ||($_REQUEST['pname']=="") || ($_REQUEST['pdop']=="") || ($_REQUEST['pava']=="") || ($_REQUEST['ptotal']=="") || ($_REQUEST['poriginalcost']=="") || ($_REQUEST['psellingcost']=="") )
		{
			$msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2 " role="alert">Fill All Fields</div>';
		}
		else
		{
			$pid = $_REQUEST['pid'];
			$pname = $_REQUEST['pname'];
			$pdop = $_REQUEST['pdop'];
			$pava = $_REQUEST['pava'];
			$ptotal = $_REQUEST['ptotal'];
			$poriginalcost = $_REQUEST['poriginalcost'];
			$psellingcost = $_REQUEST['psellingcost'];
			$sql ="UPDATE assets_tb SET pname='$pname', pdop ='$pdop', pava ='$pava', ptotal = '$ptotal', poriginalcost ='$poriginalcost', psellingcost ='$psellingcost' WHERE pid ='$pid' ";
			if($conn->query($sql)==TRUE)
			{
				$msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2 " role="alert">Products Updated  Successfully Submitted.</div>';
			}
			else
			{
				$msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2 " role="alert">Unable to Update Products.</div>';
			}
		}
	}
	


?>


<!--Start 2nd column-->
<div class="col-sm-9 col-md-10 px-2 py-5 maincontentheight" style="background-color:#F2F6F8;">

<h3 class="text-center">Update Product Details</h3>
<form action="" method="POST">
	    <div class="form-group">
			<label for="pname">Product ID</label>
			<input type="text" class="form-control" name="pid" value="<?php if(isset($row['pid'])){echo $row['pid'];}?>" id="pid" readonly>
		</div>
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" class="form-control" name="pname" value="<?php if(isset($row['pname'])){echo $row['pname'];}?>" id="pname" >
		</div>
		<div class="form-group">
			<label for="pdop">Date Of Purchase</label>
			<input type="date" class="form-control" name="pdop" value="<?php if(isset($row['pdop'])){echo $row['pdop'];}?>" id="pdop" >
		</div>
		<div class="form-group">
			<label for="pava">Available</label>
			<input type="text" class="form-control" name="pava" value="<?php if(isset($row['pava'])){echo $row['pava'];}?>" id="pava" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="ptotal">Total</label>
			<input type="text" class="form-control" name="ptotal" value="<?php if(isset($row['ptotal'])){echo $row['ptotal'];}?>" id="ptotal" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="poriginalcost">Original Cost Price</label>
			<input type="text" class="form-control" name="poriginalcost" id="poriginalcost" value="<?php if(isset($row['poriginalcost'])){echo $row['poriginalcost'];}?>" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="psellingcost">Selling Cost Price</label>
			<input type="text" class="form-control" name="psellingcost" id="psellingcost" value="<?php if(isset($row['psellingcost'])){echo $row['psellingcost'];}?>" onkeypress="isInputNumber(event)">
		</div>
		<div class="text-center">	
			<button type="submit" class="btn btn-primary mt-3" id="pupdate" name="pupdate" >Update</button>
			<a href="assets.php" class="btn btn-secondary mt-3">Close</a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>
<!--End 2nd column-->
<?php include('includes/footer.php') ?>
