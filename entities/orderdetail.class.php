<?php IDEA:
require_once('../config/db.class.php');
require_once('../utils/generateId.php');


class Orderdetail
{
  public $orderdetail_id;
  public $product_id;
  public $orders_id;
  public $color_id;
  public $quantity;

  function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
  public function __construct($product_id, $orders_id, $color_id, $quantity)
  {
    $this->orderdetail_id = GenerateId::generate();
    $this->product_id = $product_id;
    $this->orders_id = $orders_id;
    $this->color_id = $color_id;
    $this->quantity = $quantity;
  }
  
  public function createOrderdetail()
  {

    $db = new Db();
    $sql = "INSERT INTO orderdetail (orderdetail_id,product_id, orders_id, color_id, quantity) 
    VALUES ('$this->orderdetail_id','$this->product_id', '$this->orders_id','$this->color_id','$this->quantity')";
    $result = $db->query_execute($sql);
    return $result;

  }
  public static function getTotalQuantityProduct($product_id,$color_id){
    $db = new DB();
    $sql="SELECT SUM(quantity) as total_quantity FROM orderdetail WHERE product_id ='$product_id' and color_id ='$color_id'";
    $result = $db->select_to_object($sql);
   

    return $result;
  }
  public static function findOrderdetail(string $orders_id)
  {
    $db = new Db();
    $sql = "select od.product_id as product_id, p.name as product_name, od.quantity, c.color_id as color_id, c.name as color_name from orderdetail od
    INNER JOIN product p on p.product_id = od.product_id
    INNER JOIN color c on c.color_id = od.color_id
    where od.orders_id = '$orders_id'";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public static function deleteOrderdetail(string $order_id)
  {
    $db = new Db();
    $sql = "DELETE FROM orderdetail WHERE orders_id='$order_id'";
    $result = $db->query_execute($sql);
    return $result;
  }
  
  public static function getOrderItemCount(string $orders_id)
  {
    $db = new Db();
    $sql = "SELECT SUM(quantity) as total_items FROM orderdetail WHERE orders_id='$orders_id'";
    $result = $db->select_to_object($sql);
    return $result->total_items ?? 0;
  }

  /**
   * Check if a customer has purchased a specific product
   * 
   * @param string $customer_id The customer ID
   * @param string $product_id The product ID
   * @return bool True if the customer has purchased the product, false otherwise
   */
  public static function hasCustomerPurchasedProduct($customer_id, $product_id)
  {
    $db = new Db();
    $sql = "SELECT od.orderdetail_id 
            FROM orderdetail od 
            INNER JOIN orders o ON od.orders_id = o.orders_id 
            WHERE o.customer_id = '$customer_id' 
            AND od.product_id = '$product_id'
            AND o.status >= 2"; // Only count confirmed or completed orders
    $result = $db->select_to_array($sql);
    return !empty($result); // Return true if results exist
  }

}