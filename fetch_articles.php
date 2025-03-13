<?php
require 'class/koneksi.php';
require 'class/Post.php';

$db = new koneksi();
$post = new Post($db->db);

$articles = $post->getAll();
echo json_encode($articles);
?>
