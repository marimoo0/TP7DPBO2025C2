<?php
class Studio
{
    private $conn;
    private $table = 'studio';

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

    public function insert($nama, $lokasi)
    {
        $query = "INSERT INTO $this->table (nama_studio, lokasi) VALUES (:nama, :lokasi)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':lokasi', $lokasi);
        return $stmt->execute();
    }

    public function update($id, $nama, $lokasi)
    {
        $query = "UPDATE $this->table SET nama_studio = :nama, lokasi = :lokasi WHERE id_studio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id_studio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}