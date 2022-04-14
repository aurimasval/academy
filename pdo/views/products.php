<?php
    $sortOptions = [
        'price_desc' => 'Kaina mažėjančiai',
        'price_asc' => 'Kaina didėjančiai',
        'status_asc' => 'Status mažėjančiai',
        'status_desc' => 'Status didėjančiai',
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>

<?php if (isset($_GET['success']) && (int)$_GET['success'] === 1) {?>
    <span style="
    color: white;
    background-color: green;
    border: 1px solid green;
    padding: 10px;
">
        Pridėjimo veiksmas sėkmingai atlikas
    </span>
<?php }?>

<?php if (isset($_GET['deleted']) && (int)$_GET['deleted'] === 1) {?>
    <span style="
    color: white;
    background-color: green;
    border: 1px solid green;
    padding: 10px;
">
        Pašalinta sėkmingai
    </span>
<?php }?>

<h1>Product list</h1>

<div>
    <a href="/action_page.php">Pridėti naują</a>
</div>
<br>

<form action="/" method="get">
    <label for="fname">Name:</label>
    <input type="text" id="fname" name="name" placeholder="Search by name" value="<?= isset($_GET['name']) ? $_GET['name'] : ''; ?>">

    <label for="active">Active:</label>
    <input type="checkbox" id="active" name="active" value="1" <?php if (isset($_GET['active']) && $_GET['active']) { echo "checked"; } ?> >

    <label for="sort">Sort:</label>
    <select name="sort" id="sort">
        <option value="" >Pasirinkite rikiavimą</option>

        <?php foreach ($sortOptions as $key => $option): ?>

            <option value="<?= $key ?>" <?php if (isset($_GET['sort']) && $_GET['sort'] === $key) { echo "selected"; } ?> >
                <?= $option ?>
            </option>

       <?php endforeach; ?>

    </select>

    <input type="submit" value="Submit">
</form>
<table>
    <thead>
        <tr>
            <th>IMG</th>
            <th>Name</th>
            <th>Price</th>
            <th>Active</th>
            <th>Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) { ?>
        <tr>
            <td><img style="width: 150px;" src="<?= $product['img'] ?>"></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td style="text-align: right"><?= $product['status'] ?></td>
            <td style="text-align: right"><?= $product['count'] ?: 0  ?></td>
            <td>
                <form action="/action_delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <input type="submit" value="Delete">
                </form>
                <a href="/action_edit.php?id=<?= $product['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div>
    <a href="#"><</a>
    <?php
    $searchParams = $_GET;
    $searchString = "";

    foreach ($searchParams as $key => $searchParam) {

        if ($key === 'page') {
            continue;
        }

        $searchString .= $key . '=' . $searchParam . '&';
    }

    for($i= 1 ; $i < $productCount / 10; $i++ ) {

        ?>
        <a href="?<?= $searchString ?>page=<?= $i ?>"><?=$i ?></a>
    <?php } ?>
    <a href="#">></a>

</div>

</body>
</html>