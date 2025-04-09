<?php IDEA:
require_once('../config/db.class.php');
class Feedback
{
  public $feedback_id;
  public $customer_id;
  public $caption;
  public $content;
  public $status;
  public $created_at;

  public function __construct($feedback_id, $customer_id, $caption, $content, $status, $created_at)
  {
    $this->feedback_id = $feedback_id;
    $this->customer_id = $customer_id;
    $this->caption = $caption;
    $this->content = $content;
    $this->status = $status;
    $this->created_at = $created_at;
  }
  
  public static function list_feedback()
  {
    $db = new Db(); 
    $sql = "SELECT c.customer_id as customer_id, c.name as customer_name, f.feedback_id as feedback_id, f.caption as caption, f.content as content from feedback f
    INNER JOIN customer c on f.customer_id = c.customer_id";
    $result = $db->select_to_array($sql);
    return $result;
  }
  public function createFeedback()
  {

    $date = date("Y-m-d H:i:s");
    $db = new Db();
    $sql = "INSERT INTO feedback(customer_id, caption, content, status, created_at) 
    VALUES ('$this->customer_id', '$this->caption','$this->content','1','$this->created_at')";
    $result = $db->query_execute($sql);
    return $result;
  }
}