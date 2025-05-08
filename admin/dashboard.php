<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}
include("../includes/conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao Painel Admin</h1>
    <nav>
        <a href="gerenciar-posts.php">Gerenciar Posts</a>
        <a href="logout.php">Sair</a>
    </nav>
</body>
</html>