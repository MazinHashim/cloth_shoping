<?php
$title = "Updata Services";	
require_once "./functions/database_functions.php";
require_once "./template/header.php";
require_once "./functions/admin.php";
$conn = db_connect();
$result1 = getAllCatogres($conn);
if(isset($_GET['services_id'])){
	$result = getservicesbyID($_GET['services_id']);
	if($result){
		$ID = $result['id'];
		$name = $result['name'];
		$image =$result['img_path'] ;
		$descr = $result['description'];
		$price = $result['price'];
		$catogres = $result['catogres'];

	}else{
			//header("Location: admin.php");
	}
}
if(isset($_POST['add'])){
	$title = trim($_POST['name']);
	$Name = mysqli_real_escape_string($conn, $title);

	$descr = trim($_POST['descr']);
	$description = mysqli_real_escape_string($conn, $descr);
	
	$catogres = trim($_POST['catogres']);
	$catogres = mysqli_real_escape_string($conn, $catogres);

	$price = floatval(trim($_POST['price']));
	$price = mysqli_real_escape_string($conn, $price);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "images/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	$result =  updateservices($ID , $Name ,$catogres, $description ,  $price , $image);//updateOdooApps($conn,$ID,$Name, $description, $price, $image);
	if(!$result){
		echo "Can't UPDATE new data " . mysqli_error($conn);
		exit;
	} else {
			 // headers_sent("Location: admin.php");
		redirct('services.php');
		

	}
}
?>
<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
	<fieldset>
    <legend> Edit Services</legend>
		<div class="input_wrapper n100 border">
			<label >Name</label>
			<input required type="text" name="name" id="Name" maxlength="50" value="<?=$name?>">
		</div>
		<br>
		<div class="input_wrapper n100 border">
			<label >Price</label>
			<input required type="number" name="price" id="Name"  value="<?=$price?>">
		</div>
		<br>
		<div class="input_wrapper_other padding n100 select">
            <select required name="catogres">
			<option value="">Catogres</option>
			<?php while($row = mysqli_fetch_assoc($result1)){ ?>
			<?php if($row[id]==$catogres){?>
                <option selected value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			<?php }else {?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			<?php } }?>
			</select>
        </div>
		<br>
			<label >Description</label>
			<textarea rows="10" cols="50" class="form-control" name="descr"><?= $descr ?></textarea>
		<br>
	<div class="input_wrapper n100">
		<label >Image</label>
		<input type="file" name="image" accept="image/*">
	</div>
	<br>
	<input class="no_float" type="submit" name="add" value="Edit">
</fieldset>
</form>

<?php
if(isset($conn)) {mysqli_close($conn);}
require_once "./template/footer.php";
?>