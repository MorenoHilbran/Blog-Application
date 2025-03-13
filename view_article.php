<?php
require 'class/koneksi.php';
require 'class/Post.php';
require 'class/Comment.php';

$db = new koneksi();
$post = new Post($db->db);
$comment = new Comment($db->db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $article = $post->getById($id);
    $comments = $comment->getComments($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .blog-container {
            max-width: 800px;
            margin: 40px auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Blog Soedirman</a>
        </div>
    </nav>

    <div class="container blog-container">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="card-title"><?php echo htmlspecialchars($article['title']); ?></h1>
                <hr>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            </div>
        </div>

        <div class="mt-4">
            <h2 class="mb-3">Comments</h2>
            <?php if (empty($comments)): ?>
                <p class="text-muted">Belom ada Komen nih! Jadi yang pertama dong Gensoed</p>
            <?php else: ?>
                <ul class="list-group">
                    <?php foreach ($comments as $comment): ?>
                        <li class="list-group-item">
                            <strong>dummy</strong> -
                            <small class="text-muted"><?php echo date('d M Y, H:i', strtotime($comment['created_at'])); ?></small>
                            <br>
                            <?php echo htmlspecialchars($comment['content']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <h2>Add a Comment</h2>
            <form action="add_comment.php" method="POST">
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="4" placeholder="Write your comment here..." required></textarea>
                </div>
                <input type="hidden" name="post_id" value="<?php echo $article['id']; ?>">
                <input type="hidden" name="user_id" value="1"> <!--untuk sementara-->
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
