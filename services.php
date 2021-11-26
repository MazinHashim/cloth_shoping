<?php
$title = 'Admin';
require_once './functions/database_functions.php';
require_once './template/header.php';
require "./functions/admin.php";
if (isset($_GET['services_id'])) {
    $status = trim($_GET['status']);
    $services_id = trim($_GET['services_id']);
    updateservicesactive($services_id,$status);
    redirct('services.php');
}
if (isset($_GET['deleteservices_id'])) {
    deleteservices($_GET['deleteservices_id']);
    redirct('services.php');
}
$result1 = getservices();
?>

    <a href="services_add.php" class="button"><i class="fa fa-plus"></i> Add new Services</a>
    <table class="data">
        <thead>
                <th>Name</th>
                <th>Catogres</th>
                <th>Price</th>
                <th>Image Path</th>
                <th>Active</th>
                <th></th>
        </thead>
        <tbody>
        <?php if (false !== $result1): foreach ($result1 as $row): ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td>
                <?= getAllCatogresByid($row['catogres']); ?>
                </td>
                <td><?= $row['price']; ?></td>
                <td><img href="<?= $row['img_path']; ?>"/></td>
                <?php
            if ($row['active']) {
                ?>
				<td><a class= "btn-sm btn-success" href="services.php?status=0&&services_id=<?php echo $row['id']; ?>">Acive</a></td>
                <?php
            } else {
                ?>
                <td><a class= "btn-sm btn-danger" href="services.php?status=1&&services_id=<?php echo $row['id']; ?>">NuActive</a></td>
				<?php
            }
            ?>
                <td>
                    <a href="services_edit.php?services_id=<?= $row['id']; ?>"><i style="font-size: 20px" class="fa fa-edit"></i></a>
                    <a href="services.php?deleteservices_id=<?= $row['id']; ?>" onclick="if(!confirm('You are sure Delete Data')) return false;"><i style="font-size: 20px" class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
<!-- </div> -->
<?php
    if (isset($conn)) {
        mysqli_close($conn);
    }
    require_once './template/footer.php';
?>