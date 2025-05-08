<?php
include("includes/conexao.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    $post = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $post['titulo'] ?></title>
</head>
<body>
    <h1><?= $post['titulo'] ?></h1>
    <p><?= $post['conteudo'] ?></p>
</body>
</html>