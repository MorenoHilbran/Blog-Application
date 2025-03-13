<?php
require 'class/koneksi.php';
require 'class/Comment.php';

$db = new koneksi();
$comment = new Comment($db->db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $content = $_POST['content'];

    if ($comment->addComment($post_id, $user_id, $content)) {
        header("Location: view_article.php?id=$post_id");
        exit();
    } else {
        echo "Error adding comment.";
    }
}
?>