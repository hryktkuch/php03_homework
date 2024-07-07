<?php
require_once('funcs.php');

$todo=$_POST['todo'];

$pdo=db_conn();

$stmt = $pdo->prepare('INSERT INTO todo(todo,date) VALUES (:todo, now());');
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: ' . 'index.php');
    exit();
};

?>