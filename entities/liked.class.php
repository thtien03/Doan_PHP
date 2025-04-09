<?php IDEA:
require_once('../config/db.class.php');
class Liked
{
  public $customer_id ;
  public $feedback_id;
  

  public function __construct($customer_id , $feedback_id)
  {
    $this->customer_id  = $customer_id ;
    $this->feedback_id = $feedback_id;
  }
  
  public function createLike()
  {
    $db = new Db();
    $sql = "INSERT INTO liked (customer_id, feedback_id) 
    VALUES ('$this->customer_id', '$this->feedback_id')";
    $result = $db->query_execute($sql);
    return $result;
  }
  public static function findLiked($customer_id)
  {
    $db = new Db();
    $sql = "SELECT feedback_id FROM liked WHERE customer_id='$customer_id'";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public static function unLike($customer_id,$feedback_id)
  {
    $db = new Db();
    $sql = "DELETE FROM liked WHERE customer_id='$customer_id' AND feedback_id='$feedback_id'";
    $result = $db->query_execute($sql);
    return $result;
  }

}