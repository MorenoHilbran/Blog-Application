<?php
require 'class/koneksi.php';
require 'class/Post.php';

$db = new koneksi();
$post = new Post($db->db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($post->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting article.";
    }
}
?>