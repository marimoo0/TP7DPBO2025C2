<?php
class Genre
{
    private $conn;
    private $table = 'genre';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function insert($nama_genre)
    {
        $query = "INSERT INTO $this->table (nama_genre) VALUES (:nama_genre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_genre', $nama_genre);
        return $stmt->execute();
    }

    public function update($id, $nama_genre)
    {
        $query = "UPDATE $this->table SET nama_genre = :nama_genre WHERE id_genre = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_genre', $nama_genre);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id_genre = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}