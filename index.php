<?php include("includes/conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meu Blog</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Meu Blog Pessoal</h1>
    </header>
    <main>
        <?php
        $sql = "SELECT * FROM posts ORDER BY data_publicacao DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<article>';
                echo '<h2>' . $row['titulo'] . '</h2>';
                echo '<p>' . substr($row['conteudo'], 0, 150) . '...</p>';
                echo '<a href="post.php?id=' . $row['id'] . '">Ler mais</a>';
                echo '</article>';
            }
        } else {
            echo "<p>Nenhum post encontrado.</p>";
        }
        ?>
    </main>
</body>
</html>