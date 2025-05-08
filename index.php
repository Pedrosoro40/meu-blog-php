<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog sobre tecnologia e desenvolvimento web">
    <meta name="keywords" content="blog, php, mysql, programação">
    <title>Meu Blog Pessoal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Cabeçalho -->
    <header class="header">
        <div class="container">
            <h1 class="logo">Meu Blog</h1>
            <nav class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#contato">Contato</a></li>
                    <li><a href="admin/login.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="main container">
        <!-- Barra de Busca -->
        <section class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="q" placeholder="Buscar posts...">
                <button type="submit">🔍</button>
            </form>
        </section>

        <!-- Listagem de Posts -->
        <section class="posts">
            <?php
            include("includes/conexao.php");
            $sql = "SELECT * FROM posts ORDER BY data_publicacao DESC LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<article class="post">';
                    echo '<img src="assets/images/' . $row['imagem_capa'] . '" alt="' . $row['titulo'] . '">';
                    echo '<h2>' . $row['titulo'] . '</h2>';
                    echo '<p class="post-meta">Publicado em: ' . date('d/m/Y', strtotime($row['data_publicacao'])) . '</p>';
                    echo '<p>' . substr($row['conteudo'], 0, 200) . '...</p>';
                    echo '<a href="post.php?id=' . $row['id'] . '" class="read-more">Ler mais</a>';
                    echo '</article>';
                }
            } else {
                echo "<p class='no-posts'>Nenhum post encontrado.</p>";
            }
            ?>
        </section>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Meu Blog. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/script.js"></script>
</body>
</html>