<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products form</title>
</head>
<body>

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
    <form action="/action_page.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''?>"><br>
        <?php if (isset($errors['name']) && $errors['name']) {?>
            <span style="color:red;">Klaida: <?= $errors['name'] ?></span>
        <?php } ?>
        <br>

        <label for="price">Price</label><br>
        <input type="text" id="price" name="price" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>"><br>

        <label for="quantity">Quantity</label><br>
        <input type="text" id="quantity" name="quantity" value="<?= isset($_POST['quantity']) ? $_POST['quantity'] : '' ?>"><br>

        <label for="sku">Sku</label><br>
        <input type="text" id="sku" name="sku" value="<?= isset($_POST['sku']) ? $_POST['sku'] : '' ?>"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea><br>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>