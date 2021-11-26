<?php
function db_connect(){
	$conn = mysqli_connect("localhost", "root", "", "clothing");
	mysqli_set_charset($conn,"utf8");
	if(!$conn){
		echo "Can't connect database " . mysqli_connect_error($conn);
		exit;
	}
	return $conn;
}
function getAllCatogresByid($id){
	$query = "SELECT * FROM `catogres` WHERE `id` =$id";
	$result = mysqli_query(db_connect(), $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
	return $row['name'];
}
function getAllCatogres($conn ){
	$query = "SELECT * FROM `catogres` ";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	return $result;
}

function SaveCatogres($conn,$Name){
	$query = "INSERT INTO `catogres` ( `name`) VALUES ( '$Name')";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	return $result;
}
function DeleteCatogres($conn,$id){
	$query = "DELETE FROM `catogres` WHERE id = $id";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	return $result;
}

function getservicesbyID($isbn){
	$conn = db_connect();
	$query = "SELECT * FROM services WHERE id = '$isbn'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "get services price failed! " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
	
	return $row;
}
function getservicesActive(){
	$conn = db_connect();
	$query = "SELECT * FROM services WHERE active = '1'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "get services price failed! " . mysqli_error($conn);
		exit;
	}

	return $result;
}
function getservices(){
	$conn = db_connect();
	$query = "SELECT * FROM services";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "get services price failed! " . mysqli_error($conn);
		exit;
	}
	
	return $result;
}
function addnewservices($name ,$catogres, $description ,  $price , $img_path, $active){
	$conn = db_connect();
	$query = "INSERT INTO `services`(`name`,`catogres`, `description`, `price`, `img_path`, `active`) 
	VALUES
	('$name' ,'$catogres', '$description' ,  $price , '$img_path', '$active')";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	
	return $result;
}
function updateservices($id , $name ,$catogres , $description ,  $price , $img_path){
	$conn = db_connect();
	$query = "UPDATE `services` SET `name`= '$name' ,`catogres`  = '$catogres' ,`description`='$description' , 
	 `price`= $price , `img_path`='$img_path' WHERE id = $id";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	
	return $result;
}
function updateservicesactive($id , $active){
	$conn = db_connect();
	$query = "UPDATE `services` SET  `active` = '$active' WHERE id = $id";
	// var_dump($query);
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	
	return $result;
}
function deleteservices($id){
	$conn = db_connect();
	$query = "DELETE FROM services WHERE id = $id";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	
	return $result;
}
function redirct($value=''){
	echo '<script type="text/javascript">';
	echo 'window.location="'.$value.'";';
	echo '</script>';
}
function signUpCustmer($name, $email, $phone, $password, $type, $active){
	$conn = db_connect();
	$query = "INSERT INTO `customers`(`name`, `email`, `phone`, `password`, `type`, `active`)
	VALUES ('$name','$email','$phone','$password','$type','$active')";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	
	return login($email , $password);
}
function login($email , $password){
	$conn = db_connect();
	$query = "SELECT * from customers WHERE  active = '1' and `email` = '$email' and `password` = '$password'
	" ;

	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	// var_dump($row);
	return $row;
}
function getAllCustmersActive(){
	$conn = db_connect();
	$query = "SELECT * from customers WHERE `type` = 'customers' and active = 'True'" ;
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	return $result;
}
function getAllCustmers(){
	$conn = db_connect();
	$query = "SELECT * from customers WHERE `type` = 'customers'" ;
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	
	return $result;
}
function getCustmersByID($id){
	$conn = db_connect();
	$query = "SELECT * from customers WHERE `id` = $id" ;
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	
	$row = mysqli_fetch_assoc($result);
	return $row;
}
function updateCustomers($id ,$name, $email, $phone, $password, $active){
	$conn = db_connect();
	$query = "UPDATE `customers` SET 
	`name`='$name',
	`email`='$email',
	`phone`='$phone',
	`password`='$password',
	`active`='$active' 
	WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	return $result;
}
function updateCustomersActive($id ,$active){
	$conn = db_connect();
	$query = "UPDATE `customers` SET 
	`active`='$active'
	WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	return $result;
}

?>
