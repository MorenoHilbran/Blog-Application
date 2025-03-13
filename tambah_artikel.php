<?php
require 'class/koneksi.php';
require 'class/Post.php';

$db = new koneksi();
$post = new Post($db->db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_POST['user_id'];

    if ($post->create($title, $content, $user_id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error creating article.";
    }
}
?>