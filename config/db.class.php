<?php // IDEA:

class Db
{
  protected static $connection;
  public function connect()
  {
    if (!isset(self::$connection)) {
      $config = parse_ini_file("config.ini");
      self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);
//        self::$connection = new mysqli("localhost", $config["root"], $config[""], $config["techstore"]);
    }
    if (self::$connection==false) {
      return false;
    }
    return self::$connection;
  }
  public function query_execute($queryString)
  {
    $connection = $this->connect();
    $connection->query("SET NAMES UTF8");
    $result = $connection->query($queryString);
    //$connection->close();
    return $result;
  }

  public function select_to_array($queryString)
  {
    $rows = array();
    $result = $this->query_execute($queryString);
    if ($result == false) {
      return false;
    }
    while ($item = $result->fetch_assoc()) {
      $rows[] = $item;
    }
    return $rows;
  }
  public function select_to_object($queryString)
  {
    $result = $this->query_execute($queryString);
    if ($result == false) {
      return false;
    }
    return $result->fetch_assoc();
  }
}
?>