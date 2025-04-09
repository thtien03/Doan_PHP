<?php
require_once('../config/db.class.php');
class Orders
{
  public $orders_id ;
  public $customer_id;
  public $address;
  public $note;

  public $total;
  public $order_code;
  public $status;
  public $created_at;
  public $employee_id;

  public function __construct($orders_id,$customer_id,$address,$note,$total,$order_code,$status,$created_at,$employee_id)
  {
    $this->orders_id = $orders_id;
    $this->customer_id = $customer_id;
    $this->address = $address;
    $this->note = $note;
    $this->total = $total;
    $this->order_code = $order_code;
    $this->status = $status;
    $this->created_at = $created_at;
    $this->employee_id = $employee_id;
  }
  public static function list_orders()
  {
    $db = new Db();
    $sql = "SELECT * FROM orders";
    $result = $db->select_to_array($sql);
    return $result;
  }
  
  public function createOrder()
  {

    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO orders (orders_id,customer_id, address, note, total, order_code, status, created_at, employee_id) 
    VALUES ('$this->orders_id','$this->customer_id', '$this->address','$this->note','$this->total','$this->order_code',1,'$date',null)";
    
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function getRecentOrder(string $order_id)
  {
    $db = new Db();
    $sql = "select * from orders WHERE orders_id='$order_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function confirmOrder(string $orders_id, string $order_code)
  {
    $db = new Db();
    $sql = "UPDATE orders
            SET order_code='$order_code', status='2'
            WHERE orders_id='$orders_id'";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function paymentOrder(string $orders_id, string $order_code)
  {
    $db = new Db();
    $sql = "UPDATE orders
            SET order_code='$order_code', status='3'
            WHERE orders_id='$orders_id'";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function findInforCustomer(string $orders_id)
  {
    $db = new Db();
    $sql = "select o.order_code as order_code, c.name, c.phone, o.address, o.note, o.total, o.status, o.created_at from orders o
    INNER JOIN customer c on c.customer_id = o.customer_id where o.orders_id = '$orders_id'";
    $result = $db->select_to_object($sql);
    return $result;
  }
  public static function deleteOrder(string $order_id)
  {
    $db = new Db();
    $sql = "DELETE FROM orders WHERE orders_id='$order_id'";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function countOrder()
  {
    $db = new Db();
    $sql = "SELECT count(*) as total FROM orders where status = 1 ";
    $result = $db->select_to_object($sql);
    return $result;
  }
  
  public static function getCustomerOrderHistory(string $customer_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM orders WHERE customer_id='$customer_id' ORDER BY created_at DESC";
    $result = $db->select_to_array($sql);
    return $result;
  }
  
  public static function getOrderStatusText($status)
  {
    switch ($status) {
      case 1:
        return "Chờ xác nhận";
      case 2:
        return "Đang giao hàng";
      case 3:
        return "Đã hoàn thành";
      default:
        return "Không xác định";
    }
  }
}