<?php 
require_once('../utils/generateId.php');
require_once('../config/db.class.php');
class Storehouse
{
  public $storehouse_id;
  public $product_id ;
  public $color_id;
  public $price;
  public $quantity;
  public $image ;
  public $description;
  public $create_at;

  public function __construct($storehouse_id, $product_id , $color_id, $price, $quantity, $image, $description, $create_at)
  {
    $this->storehouse_id = $storehouse_id;
    $this->product_id  = $product_id ;
    $this->color_id = $color_id;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->image  = $image ;
    $this->description = $description;
    $this->create_at = $create_at;
  }
  
  public static function list_storehouse()
  {
    $db = new Db();
    $sql = "SELECT s.storehouse_id, s.product_id, s.price, s.quantity, s.image, s.description, s.create_at 
            FROM storehouse s";
    return $db->select_to_array($sql);
  }
  
  private function generateStorehouseId() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $id = '';
    for ($i = 0; $i < 6; $i++) {
        $id .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    // Check if ID already exists
    $db = new Db();
    $sql = "SELECT storehouse_id FROM storehouse WHERE storehouse_id = '$id'";
    $result = $db->select_to_array($sql);
    
    // If ID exists, generate a new one recursively
    if (!empty($result)) {
        return $this->generateStorehouseId();
    }
    
    return $id;
  }

  public function import_stohouse()
  {
    $this->storehouse_id = $this->generateStorehouseId();
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO storehouse(storehouse_id, product_id, color_id, price, quantity, image, description, create_at) 
    VALUES ('$this->storehouse_id','$this->product_id','$this->color_id',' $this->price','$this->quantity','$this->image','$this->description','$date')";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function get_storehouse_exits(string $product_id, $color_id){
    $db = new DB();
    $sql ="select * from storehouse where product_id ='$product_id' and color_id ='$color_id'";
    $result = $db->select_to_object($sql);

    return $result;
  }
  public static function get_storehouse_by_id(string $storehouse_id){
    $db = new DB();
    $sql = "SELECT * FROM storehouse WHERE storehouse_id = '$storehouse_id'";
    return $db->select_to_array($sql)[0]; // Change to return first array element
  }
  public static function update_storehouse(string $storehouse_id, int $price,int $quantity,string $description )
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "UPDATE storehouse
            SET price='$price', quantity='$quantity',description='$description'
            WHERE storehouse_id='$storehouse_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function getTotalQuantityProduct($product_id,$color_id){
    $db = new DB();
    $sql="SELECT SUM(quantity) as total_quantity FROM storehouse WHERE product_id ='$product_id' and color_id ='$color_id'";
    $result = $db->select_to_object($sql);
    echo "$product_id";
    if($result['total_quantity']==null)
    {
      echo "WHERE product_id ='$product_id' and color_id ='$color_id'";
    }    else{
      echo  $result['total_quantity'];
    }
    return $result;
  }
  public static function findPriceOfProduct(string $product_id, string $color_id){
    $db = new Db();
    $sql = "select max(price) as price from storehouse where color_id ='$color_id' and product_id ='$product_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }

  

}