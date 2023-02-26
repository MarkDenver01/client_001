<?php require_once(LIB_PATH_INC."config_env.php"); ?>
<?php
class db_connection {
private $con;
public $query_id;

public function __constructor() {
  $this->connectDb();
}

/** function for open database connection **/
public function connectDb() {
  $this->con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if (!$this->con) {
    die("Database connection failed: " .mysqli_connect_error());
  } else {
    $select_db = $this->con->select_db(DB_NAME);
    if (!$select_db) {
      die("Failed to select database " .mysqli_connect_error());
    }
  }
}

/** function for close database connection **/
public function disconnectDb() {
  if(isset($this->con)) {
    mysqli_close($this->con);
    unset($this->con);
  }
}

/** function for mysqli query **/
public function query($sql) {
  if(trim($sql != "")) {
    $this->query_id = $this->con->query($sql);
  }
  if (!$this->query_id) {
    die("Error on this query: <pre> " .$sql. "</pre>");
    return $this->query_id;
  }
}

/** function for query helper **/
public function fetch_array($statement) {
  return mysqli_fetch_array($statement);
}

public function fetch_object($statement) {
  return mysqli_fetch_object($statement);
}

public function fetch_assoc($statement) {
  return mysqli_fetch_assoc($statement);
}

public function num_rows($statement) {
  return mysqli_num_rows($statement);
}

public function insert_id() {
  return mysqli_insert_id($this->con);
}

public function affected_rows() {
  return mysqli_affected_rows($this->con);
}

/** function for remove escape special
* characters in a string for use in an SQL statement **/
public function escape($str) {
  return $this->con->real_escape_string($str);
}

/** function for while loops **/
public function while_loop($loop) {
  global $db;
  $results = array();
  while ($result = $this->fetch_array($loop)) {
    $results[] = $result;
  }
  return $results;
}
}
$db = new db_connection();
?>
