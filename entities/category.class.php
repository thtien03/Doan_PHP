<?php IDEA:
require_once('../config/db.class.php');
require_once('../utils/generateId.php');
class Category
{
  public $category_id;
  public $name;
  public $status;
  public $created_at;

  public function __construct($category_id, $name, $status, $created_at)
  {
    $this->category_id = $category_id;
    $this->name = $name;
    $this->status = $status;
    $this->created_at = $created_at;
  }
  
  public static function list_category()
  {
    $db = new Db();
    $sql = "SELECT * FROM category";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createCategory()
  {
    $id =  GenerateId::generate();
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO category(category_id, name, status, created_at) 
    VALUES ('$id','$this->name', '$this->status','$date')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function updateCategory(string $category_id, string $name, int $status, string $created_at)
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "UPDATE category
            SET name='$name', status='$status', created_at='$date'
            WHERE category_id='$category_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function deleteCategory(string $category_id)
  {
    $db = new Db();
    $sql = "DELETE FROM category WHERE category_id='$category_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findCategory(string $category_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM category WHERE category_id='$category_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }

}