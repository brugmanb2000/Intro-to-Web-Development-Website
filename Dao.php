<?php
class Dao {


  private $db_host = 'us-cdbr-east-02.cleardb.com:3306';
  private $db_user = 'bfe4f423ab6dea';
  private $db_pass = 'dd26f6f85a96dc0';
  private $db_name = 'heroku_c63933e7ea4c225';

  public function getConnection() {
    try {
      return new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

  public function saveComment($comment) {
    $conn = $this->getConnection();
    $saveQuery = "INSERT INTO comment (comment) VALUES (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function getComments($article) {
    $conn = $this->getConnection();
    return $conn->query('Select ' . $article . 'FROM articlecomment order by ID desc limit 15;');
  }

  public function getArticleInfo($id) {
    $conn = $this->getConnection();
    return $conn->query('Select ' . $id . ' from article;');
  }

  public function getUserInfo($username) {
    $conn = $this->getConnection();
    return $conn->query("Select * from user where username like '$username';");
  }
  
  public function getReviews() {
    $conn = $this->getConnection();
    return $conn->query("Select * FROM articles where metatag like 'review' orderby createDate");
  }

  public function createProfile($username, $password) {
    $conn = $this->getConnection();
    try {
    $sanitizeUser = filter_var($username, FILTER_SANITIZE_STRING);
    if (strcmp($username, $sanitizeUser) != 0) {
      throw new Exception("Invalid characters");
    }
    $_SESSION["userCreationStatus"] = "success";
    $hashedPass = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
    $stmt = "INSERT INTO user (username, password) VALUES ('$sanitizeUser', '$hashedPass')";
    $conn->exec($stmt);
    } catch (Exception $e) {
      $_SESSION["userCreationStatus"] = "failed";
    }
}

  public function getFeaturedArticles() {
    $conn = $this->getConnection();
    return $conn->query("select * from articleorder by dateCreated DESC limit 3;");
  }

  public function doesProfileExist($username, $password) {
    try {
    $conn = $this->getConnection();
    $sanitizeUser = filter_var($username, FILTER_SANITIZE_STRING);
    $hashedPass = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
    $sql = ('SELECT username, password FROM user where username like ?');
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sanitizeUser]);
    $user = $stmt->fetch();
    if (($user['username'] == $sanitizeUser) && ($user['password']== $hashedPass)) {
      return "true";
    } else {
      return "false";
    }
  } catch (Exception $e) {
    return "this broke";
  }
}
}
?>
