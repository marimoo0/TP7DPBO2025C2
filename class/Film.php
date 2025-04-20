<?php
class Film
{
    private $conn;
    private $table = 'film';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT f.*, g.nama_genre, s.nama_studio 
                  FROM film f 
                  JOIN genre g ON f.id_genre = g.id_genre 
                  JOIN studio s ON f.id_studio = s.id_studio";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function search($keyword)
    {
        $query = "SELECT f.*, g.nama_genre, s.nama_studio 
                  FROM film f 
                  JOIN genre g ON f.id_genre = g.id_genre 
                  JOIN studio s ON f.id_studio = s.id_studio 
                  WHERE f.judul LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $keyword = "%$keyword%";
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt;
    }

    public function insert($judul, $sutradara, $tahun, $id_genre, $id_studio)
    {
        $query = "INSERT INTO $this->table (judul, sutradara, tahun_rilis, id_genre, id_studio)
                  VALUES (:judul, :sutradara, :tahun, :id_genre, :id_studio)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':sutradara', $sutradara);
        $stmt->bindParam(':tahun', $tahun);
        $stmt->bindParam(':id_genre', $id_genre);
        $stmt->bindParam(':id_studio', $id_studio);
        return $stmt->execute();
    }

    public function update($id, $judul, $sutradara, $tahun, $id_genre, $id_studio)
    {
        $query = "UPDATE $this->table 
                  SET judul = :judul, sutradara = :sutradara, tahun_rilis = :tahun, 
                      id_genre = :id_genre, id_studio = :id_studio 
                  WHERE id_film = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':sutradara', $sutradara);
        $stmt->bindParam(':tahun', $tahun);
        $stmt->bindParam(':id_genre', $id_genre);
        $stmt->bindParam(':id_studio', $id_studio);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id_film = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function findById($id)
    {
        $query = "SELECT f.*, g.nama_genre, s.nama_studio 
              FROM film f 
              JOIN genre g ON f.id_genre = g.id_genre 
              JOIN studio s ON f.id_studio = s.id_studio 
              WHERE f.id_film = :id 
              LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}