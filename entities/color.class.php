<?php 
require_once('../config/db.class.php');
require_once('../utils/generateId.php');
class Color
{
  public $color_id ;
  public $name;
  public $code;

  public function __construct($color_id , $name, $code)
  {
    $this->color_id  = $color_id ;
    $this->name = $name;
    $this->code = $code;
  }
  
  public static function list_color()
  {
    $db = new Db();
    $sql = "SELECT * FROM color";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createColor()
  {
    $id =  GenerateId::generate();
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO color (color_id, name, code) 
    VALUES ('$id','$this->name', '$this->code')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateColor(string $color_id, string $name, string $code)
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "UPDATE color
            SET name='$name', code = '$code'
            WHERE color_id='$color_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteColor(string $color_id)
  {
    $db = new Db();
    $sql = "DELETE FROM color WHERE color_id='$color_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findColor(string $color_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM color WHERE color_id='$color_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }

}