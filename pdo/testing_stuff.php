<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$host = 'localhost';
$user = 'root';
$dbName = "posts";
$password = "";

//SET DSN
$dsn = "mysql:host=$host;dbName=$dbName";

//Create PDO instance

$connection = new PDO($dsn, $user, $password);
//set default fetch mode
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //FOR LIMIT CASE

// query method

//$statement = $connection->query('SELECT * FROM posts.post');


////PDO FETCH options
//while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//    echo $row['title'] . '<br>';
//}


//PDO FETCH options
//while($row = $statement->fetch(PDO::FETCH_OBJ)) {
//    echo $row->title . '<br>';
//}

//while($row = $statement->fetch()) {
//    echo $row->title . '<br>';
//}


#PREPARE STATEMENT (prepare & execute)
//UNSAFE

//$author = 'John';
//
//$sql = "SELECT * FROM posts WHERE author = '$author'";

#Name parameters and position parameters
/*
$sql = "SELECT * FROM posts.post WHERE author = ?";

$author = "Test";
$statement = $connection->prepare($sql);
$statement->execute([$author]);
$posts = $statement->fetchAll();


foreach ($posts as $post) {
    echo  $post->title . '</br';
}
*/

//$sql = "SELECT * FROM posts.post WHERE author = :author and is_published = :published";
//
//$author = "Test";
//$published = true;
//$statement = $connection->prepare($sql);
//$statement->execute(['author' => $author, 'published' => $published]);
//$posts = $statement->fetchAll();
//
//foreach ($posts as $post) {
//    var_dump($post->title . '</br>');
//}

### FECH SINGLE POST

//$sql = "SELECT * FROM posts.post WHERE id = :id";
//
//$author = "Test";
//$published = true;
//$statement = $connection->prepare($sql);
//$statement->execute(['id' => 1]);
//$post = $statement->fetch(); //one record
//
//var_dump($post->title . '</br>');

### GET ROW COUNT
//
//$sql = "SELECT * FROM posts.post WHERE author = :author";
//
//$author = "Test";
//$statement = $connection->prepare($sql);
//$statement->execute(['author' => $author]);
//$postCount = $statement->rowCount(); //one record
//
//var_dump($postCount . '</br>');

### INSERT DATA
//
//$title = 'Title 1';
//$body = 'body';
//$author = 'author';
//
//$sql = "Insert into posts.post(title, body, author) VALUES(:title, :body, :author)";
//$statement = $connection->prepare($sql);
//$statement->execute([
//    'title' => $title,
//    'body' => $body,
//    'author' => $author,
//]);
//
//var_dump('assed' . '</br>');

###UPDATE
//$body = 'naujas body';
//$author = 'author';
//
//$sql = "UPDATE posts.post SET body = :body WHERE author = :author";
//$statement = $connection->prepare($sql);
//$statement->execute([
//    'body' => $body,
//    'author' => $author,
//]);

###Search  with like


//$sql = "SELECT * FROM posts.post WHERE author LIKE :author";
//
//$author = "Test";
//$published = true;
//$statement = $connection->prepare($sql) ;
//$statement->execute(['author' => $author, 'published' => $published]);
//$posts = $statement->fetchAll();
//
//foreach ($posts as $post) {
//    var_dump($post->title . '</br>');
//}


class Post {
    private $title;
    private $author;
    private $body;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
}

$sql = "SELECT * FROM posts.post";

$statement = $connection->prepare($sql) ;
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_CLASS, Post::class);

foreach ($posts as $post) {
    var_dump($post->getBody());
//    var_dump($post);
}
