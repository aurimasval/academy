<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";

$host = 'localhost';
$user = 'root';
$dbName = 'academy';
$password = '';

//SET DSN
$dsn = "mysql:host={$host};dbName={$dbName}";

//Create PDO instance
$connection = new PDO($dsn, $user, $password);



//set default fetch mode
$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //FOR LIMIT CASE

// query method


class Product {

    private int $id;

    private string $name;

    private $img;
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImg(): ?string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(?string $img): void
    {
        $this->img = $img;
    }
}

//$statement = $connection->query('SELECT * FROM academy.product LIMIT 1');


//$statement = $connection->query('SELECT * FROM academy.product LIMIT 1') ;
//$statement->execute();
//$products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
///** @var Product $product */
//$product = reset($products);
//var_dump($product);
//var_dump($product);
//echo $product->getId();
//echo $product->getName();

//$product = new Product();
//while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//    $product->setId($row['id']);
//    $product->setName($row['name']);
//}
//
//var_dump($product);
//echo $product->getImg();

//$statement = $connection->query('SELECT * FROM posts.post');


////PDO FETCH options
//while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//    echo $row['title'] . '<br>';
//}

//$sql = "SELECT name, price from academy.product WHERE status = :status AND price > :price";
//
//$statement = $connection->prepare($sql);
//$statement->execute(['price' => 900, 'status' => 1]);
//
//var_dump($statement->fetchAll(PDO::FETCH_ASSOC));

//
try {
    $connection->beginTransaction();

    $sqlInsert = "Insert into academy.country(name, iso_code_2, iso_code_3, active) VALUES (:name,:iso2,:iso3,:active)";
    $stmt = $connection->prepare($sqlInsert);

    $dataset = [
        [
            'name' => 'naujas222',
            'iso2' => 'aa',
            'iso3' => 'aaa',
            'active' => 1,
        ],
        [
            'name' => 'naujas222',
            'iso2' => 'bb',
            'iso3' => 'bbbssssss',
            'active' => 1,
        ]
    ];

    foreach ($dataset as $item) {
        $stmt->execute($item);
    }
    $connection->commit();
} catch (Exception $error) {
    var_dump('IVYKO KLAIDA');
    $connection->rollback();
    file_put_contents('logas.log', $error->getMessage());
}
//
//
//$sql = "SELECT name, price from academy.product WHERE name like :searchName";
//
//$product = 'Muds';
//
//$statement = $connection->prepare($sql);
//$statement->execute(['searchName' => '%' . $product . '%']);
//
//var_dump($statement->fetchAll(PDO::FETCH_ASSOC));
