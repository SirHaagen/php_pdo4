<?php
  $host= 'localhost';
  $user= 'root';
  $password= '';
  $dbname= 'pdoposts';

  $dsn= 'mysql:host='. $host. ';dbname='. $dbname;

  //Create new PDO instance
  $pdo= new PDO($dsn, $user, $password);

  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

  //FETCH SINGLE POST

  $author= 'Pepo';  //User input
  $id= 2;

  $sql= 'SELECT * FROM posts WHERE id = ?';
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$id]);  //Named parameter as a associative array
  $post= $stmt->fetch(); //inside PDO::FETCH_ASSOC. empty because line 12

  echo $post->title. "<br>";

  //GET ROW COUNT
  $stmt= $pdo->prepare('SELECT * FROM posts WHERE author = ?');
  $stmt->execute([$author]);
  $postCount= $stmt->rowCount();

  echo $postCount;    //2 because there are 2 rows for author Pepo

?>