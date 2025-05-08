<?php 
include("includes/conexao.php");
$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);
$post = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $post['titulo'] ?> | Meu Blog</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">Meu Blog</h1>
            <nav class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#contato">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container single-post">
        <article>
            <h1><?= $post['titulo'] ?></h1>
            <p class="post-meta">Publicado em: <?= date('d/m/Y H:i', strtotime($post['data_publicacao'])) ?></p>
            <img src="assets/images/<?= $post['imagem_capa'] ?>" alt="<?= $post['titulo'] ?>">
            <div class="post-content">
                <?= nl2br($post['conteudo']) ?>
            </div>
        </article>

        <!-- Seção de Comentários (opcional) -->
        <section class="comments">
            <h2>Comentários</h2>
            <!-- Formulário de comentários -->
            <form method="POST" action="adicionar-comentario.php">
                <input type="hidden" name="post_id" value="<?= $id ?>">
                <input type="text" name="autor" placeholder="Seu nome" required>
                <textarea name="texto" placeholder="Seu comentário..." required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Meu Blog. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>