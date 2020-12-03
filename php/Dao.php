<?php
class Dao {


  private $db_host = 'db4free.net';
  private $db_user = 'brandonadmin';
  private $db_pass = '3XaMpl3s!@#';
  private $db_name = 'cs410database';

  public function getConnection() {
    try {
      return new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

  public function saveComment($user, $comment, $articleID) {
    $conn = $this->getConnection();
    $retVal = $conn->prepare("insert into comments (page_id, username, content) values (:articleID, :user, :content);");
    $retVal->bindValue(':articleID', $articleID, PDO::PARAM_INT);
    $retVal->bindValue(':user', $user, PDO::PARAM_STR);
    $retVal->bindValue(':content', $comment, PDO::PARAM_STR);
    $retVal->execute();
    return $retVal;
  }

  public function getComments($articleID) {
    $conn = $this->getConnection();
    $sql = $conn->query("SELECT * FROM comments WHERE page_id=$articleID order by id;");
    return $sql;
    }

  public function updateBio($user, $bio) {
    $conn = $this->getConnection();
    $sql = $conn->prepare("update user
    set userbio = :bio where username like :user;");
    $sql->bindParam(':bio', $bio, PDO::PARAM_STR);
    $sql->bindParam(':user', $user, PDO::PARAM_STR);
    $sql->execute();
  }
     
  public function createProfile($username, $password) {
    $conn = $this->getConnection();
    try {
    $sanitizeUser = filter_var($username, FILTER_SANITIZE_STRING);
    if (strcmp($username, $sanitizeUser) != 0) {
      throw new Exception("Invalid characters");
    }
    $hashedPass = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
    $stmt = "INSERT INTO user (username, pass) VALUES ('$sanitizeUser', '$hashedPass')";
    $conn->exec($stmt);
    $_SESSION["userCreationStatus"] = "success";
    } catch (Exception $e) {
      $_SESSION["userCreationStatus"] = "failed";
    }
}
  
  public function getArticle($id) {
    $conn = $this->getConnection();
    $sql = $conn->query('select * from article left join author on author.id=article.authorID where article.id='.$id);
    $article = $sql->fetch();
    return $article;
  }

  public function postArticle($title, $author,  $metaTag, $body, $subtitle, $bio) {
    $conn = $this->getConnection();
    $id = $conn->query('select id from author where name like ' . $author);
    if ($id == false) {
      $sql = $conn->prepare("insert into author (name, bio) values
      (:author , :bio ;");
      $sql->bindParam(':author', $author, PDO::PARAM_STR);
      $sql->bindParam(':bio', $bio, PDO::PARAM_STR);
      $id = $conn->query('select id from author where name like ' . $author);
    }
    $sql = $conn->prepare("insert into article (title, metaTag, authorID, subtitle, body)
    values (:title , :metaTag , :authorID , :subtitle , :body );");
    $sql->bindParam(':title', $title, PDO::PARAM_STR);
    $sql->bindParam(':metaTag', $metaTag, PDO::PARAM_STR);
    $sql->bindParam('authorID', $id, PDO::PARAM_INT);
    $sql->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
    $sql->bindParam(':body', $body, PDO::PARAM_STR);
    $sql->execute();
  }
  
  public function getFeaturedArticle() {
    $conn = $this->getConnection();
    $sql = $conn->query('select * from article order by article.id desc limit 3');
    return $sql;
  }
  public function getProfile($username) {
    $conn = $this->getConnection();
    $sanitizeUser = filter_var($username);
    $sql = ('Select * from user where username like ?');
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sanitizeUser]);
    $user = $stmt->fetch();
    return $user;
  }

  public function doesProfileExist($username, $password) {
    try {
    $conn = $this->getConnection();
    $sanitizeUser = filter_var($username, FILTER_SANITIZE_STRING);
    $hashedPass = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
    $sql = ('SELECT username, pass FROM user where username like ?');
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sanitizeUser]);
    $user = $stmt->fetch();
    if (($user['username'] == $sanitizeUser) && ($user['pass']== $hashedPass)) {
      return "true";
    } else {
      return "false";
    }
  } catch (Exception $e) {
    return "this broke";
  }
}

public function doesUsernameExist($username) {
  try {
  $conn = $this->getConnection();
  $sanitizeUser = filter_var($username, FILTER_SANITIZE_STRING);
  $sql = ('SELECT username FROM user where username like ?');
  $stmt = $conn->prepare($sql);
  $stmt->execute([$sanitizeUser]);
  $user = $stmt->fetch();
  if (($user['username'] == $sanitizeUser)) {
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
