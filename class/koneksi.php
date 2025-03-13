<?php
class koneksi {
    public $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}
?>