<?php


class Category extends Model
{
    protected static $table = 'categories';
    protected static $primaryKey = 'id';

    public static function getCategories()
    {
        $sql = "SELECT * FROM categories";

        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $db = Connection::connect();
        $stmt = $db->getPreparedStatment($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
