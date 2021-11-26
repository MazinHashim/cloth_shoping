

<?php
	require_once "./functions/admin.php";
	$title = "Services Admin";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAllCatogres($conn);
	if(isset($_POST['save_change'])){
		$namecat = $_POST['catname'];
		if(!SaveCatogres($conn,$namecat)){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_catogres.php");
		}
	}
	if(isset($_GET['cat_id'])){
		$id =  $_GET['cat_id'];
		if(!DeleteCatogres($conn,$id)){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_catogres.php");
		}
	}
?>


<div class="row" >
		<form method="post" action="" enctype="multipart/form-data">
                <table class="table table-bordered " style="font-size:21px ;background-color:#8a928a ;border-radius: 40px;" >
                        <tr>
                            <th ></th>
                            <th>Name Catogres</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td style = "width:151px"></td>
                            <td><input class="form-control" type="text" name="catname" ></td>
                            <td><input type="submit" name="save_change" value="Save" class="btn btn-primary" style="border-radius: 40px;"></td>
                            <td><a href="services.php" class="btn btn-primary pull- " style="border-radius: 40px;">Services</a>&nbsp
							</td>
                        </tr>
                </table>
        </form>
		  <br/>
		  <br/>
		  
	
	<table class="table table-bordered table-hover " style="background-color: #fffff0 ;border-radius: 40px;" >
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Delete</th>
		</tr>

		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr onclick="sub(this)"  >
			<td  style = "width:151px"><?php echo $row['id']; ?></td>
			<td style = "width:751px"><?php echo $row['name']; ?></td>
			<td><a class= "btn btn-danger" href="admin_catogres.php?cat_id=<?php echo $row['id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>