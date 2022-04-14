<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products form</title>
</head>
<body>

<?php if (isset($_GET['updated']) && (int)$_GET['updated'] === 1) {?>
    <span style="
    color: white;
    background-color: green;
    border: 1px solid green;
    padding: 10px;
">
        Atnaujinimo veiksmas sėkmingai atlikas
    </span>
<?php }?>

    <h1>
        Produkto forma
    </h1>
    <?php if (count($errors) > 0) {?>
        <ul>
            <?php foreach ($errors as $key => $error) { ?>
                <li>
                    Klaida "<?= $key ?>" : <?= $error ?>
                </li>
            <?php }?>
        </ul>
    <?php } ?>
    <!--
        - name
        - description
        - price
        - quantity
        - sku
    -->

    <form action="/action_edit.php?id=<?= $product['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= isset($product['id']) ? $product['id'] : ''?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?= isset($product['name']) ? $product['name'] : ''?>"><br>
        <br>

        <label for="price">Price</label><br>
        <input type="text" id="price" name="price" value="<?= isset($product['price']) ? $product['price'] : '' ?>"><br>

        <label for="quantity">Quantity</label><br>
        <input type="text" id="quantity" name="quantity" value="<?= isset($product['quantity']) ? $product['quantity'] : '' ?>"><br>

        <label for="sku">Sku</label><br>
        <input type="text" id="sku" name="sku" value="<?= isset($product['sku']) ? $product['sku'] : '' ?>"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"><?= isset($product['description']) ? $product['description'] : '' ?></textarea><br>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>