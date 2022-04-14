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
<h1>Product list</h1>
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
            <th>Name</th>
            <th>Price</th>
            <th>Active</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) { ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td style="text-align: right"><?= $product['status'] ?></td>
            <td style="text-align: right"><?= $product['count'] ?: 0  ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>