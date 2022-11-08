<?php
include('database.php');
class Magazine{
    public $id;
    public $name;
    public $price;

    function __construct($p_name, $p_price,$p_id=0) {
        $this->id =$p_id;
        $this->name = $p_name;
        $this->price = $p_price;
    }
}
class MagazineRepository{

    public static function create($name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("INSERT INTO magazines (name, price) VALUES ('$name', '$price')");
    }
    
    public static function read() {
        $response = [];
        $mysqli = ConnectionDB::getInstance();
        $result = $mysqli->query("SELECT * FROM magazines");
        foreach ($result as $row){
            $response[count($response)] = new Magazine($row['name'], $row['price'], $row['ID']);
        }
        return $response;
    }
    
    public static function update($id, $name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("UPDATE magazines SET name = '$name', price = '$price' WHERE id = '$id'");
    }
    
    public static function delete($id) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("DELETE FROM magazines where id = '$id'");
    }
}
?>