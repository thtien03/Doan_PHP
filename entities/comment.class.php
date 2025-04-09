<?php 
require_once('../config/db.class.php');
require_once('../utils/generateId.php');

class Comment
{
  public $comment_id;
  public $customer_id;
  public $product_id;
  public $content;
  public $created_at;

  public function __construct($customer_id, $product_id, $content, $created_at)
  {
    $this->comment_id = GenerateId::generate();
    $this->customer_id = $customer_id;
    $this->product_id = $product_id;
    $this->content = $content;
    $this->created_at = $created_at;
  }

  public static function list_comment()
  {
    $db = new Db();
    $sql = "SELECT * FROM comment";
    $result = $db->select_to_array($sql);
    return $result;
  }
  
  public function createComment()
  {
    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO comment(comment_id, customer_id, product_id, content, created_at) 
    VALUES ('$this->comment_id', '$this->customer_id', '$this->product_id', '$this->content', '$date')";
    $result = $db->query_execute($sql);
    return $result;
  }

  public static function findComment(string $product_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM comment WHERE product_id='$product_id'";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public static function findCommentByProductId(string $product_id)
  {
    $db = new Db();
    $sql = "SELECT * FROM comment WHERE product_id='$product_id'";
    $result = $db->select_to_array($sql);
    return $result;
  }
  
  public static function getCommentsWithCustomerNames(string $product_id)
  {
    $db = new Db();
    $sql = "SELECT comment.*, customer.name 
            FROM comment 
            INNER JOIN customer ON comment.customer_id = customer.customer_id 
            WHERE comment.product_id='$product_id'
            ORDER BY comment.created_at DESC";
    $result = $db->select_to_array($sql);
    return $result;
  }
}