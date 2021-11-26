<?php
$title = "Add New";
require_once "./functions/database_functions.php";
require_once "./template/header.php";
require_once "./functions/admin.php";
$conn = db_connect();
$result = getAllCatogres($conn);
if(isset($_POST['add'])){
	
	$name = trim($_POST['name']);
	$name = mysqli_real_escape_string($conn, $name);

	
	$description = trim($_POST['descr']);
	$description = mysqli_real_escape_string($conn, $description);
	
	$price = floatval(trim($_POST['price']));
	$price = mysqli_real_escape_string($conn, $price);
	
	$catogres = trim($_POST['catogres']);
	$catogres = mysqli_real_escape_string($conn, $catogres);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image  = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "images/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	$result = addnewservices($name ,$catogres, $description ,  $price , $image , '1');
	if(!$result){
		echo "Can't add new data " . mysqli_error($conn);
		exit;
	} else {
			 // headers_sent("Location: admin.php");
		redirct('services.php');
		
		
	}
}
?>



<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend> New Services</legend>
		<div class="input_wrapper n100 border">
			<label >Name</label>
			<input required type="text" name="name" id="Name" maxlength="50" value="">
		</div>
		<br>
		<div class="input_wrapper n100 border">
			<label >Price</label>
			<input required type="number" name="price" id="Name"  value="">
		</div>
		<br>
		<div class="input_wrapper_other padding n100 select">
            <select required name="catogres">
			
			<option value="">Catogres</option>

		<?php while($row = mysqli_fetch_assoc($result)){ ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
				<?php } ?>
			</select>
        </div>
		<br>
		<label >Description</label>
		<textarea rows="6" cols="50" class="form-control" name="descr"></textarea> 
		<br>
		<div class="input_wrapper n100">
			<label >Image</label>
			<input type="file" name="image" accept="image/*">
		</div>
		<br>
		<input class="no_float" type="submit" name="add" value="Save">
</fieldset>
</form>
<?php
if(isset($conn)) {mysqli_close($conn);}
require_once "./template/footer.php";
?>