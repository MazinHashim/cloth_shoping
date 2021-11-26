<?php
$title = 'Customers';
require_once './functions/database_functions.php';
require_once './template/header.php';
require './functions/admin.php';
if (isset($_GET['customers_id'])) {
    $active = trim($_GET['status']);
    $customers_id = trim($_GET['customers_id']);
    updateCustomersActive($customers_id ,$active);
    redirct('customers.php');
}

$result1 = getAllCustmers();
?>
    <table class="data">

        <thead>
            <tr>
                <th>Name Customers</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $result1): foreach ($result1 as $row): ?>
            <tr>
                <td><?= $row['name']?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <?php
            if ($row['active']) {
                ?>
				<td><a class= " btn-success" href="customers.php?status=0&&customers_id=<?php echo $row['id']; ?>">Acive</a></td>
                <?php
            } else {
                ?>
                <td><a class= " btn-danger" href="customers.php?status=1&&customers_id=<?php echo $row['id']; ?>">NuActive</a></td>
				<?php
            }
            ?>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>