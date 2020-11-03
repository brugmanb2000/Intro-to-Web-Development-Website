<?php

class Dao {


  private $db_host = 'remotemysql.com:3306';
  private $db_user = 'cjzM0h9vE7';
  private $db_pass = 'VmtqQeT0Ju';
  private $db_name = 'cjzM0h9vE7';

  public function getConnection() {
        return new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user. $this->db_pass);

  }

  public function saveComment($comment) {
    $conn = $this->getConnection();
    $saveQuery = "INSERT INTO comment (comment) VALUES (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function getComments() {
    $conn = $this->getConnection();
    return $conn->query("Select * FROM comment");
  }

  public function getReviews() {
    $conn = $this->getConnection();
    return $conn->query("Select * FROM articles where metatag like 'review' orderby createDate");
  }

  public function createProfile($username, $password) {
    $conn = $this->getConnection();
    $hashedPass = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
    $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
    $stmt->bind_param(username, $username);
    $stmt->bind_param(password, $hashedPass);
    $stmt->execute();
  }

  public function getFeaturedArticles() {
    $conn = $this->getConnection();
    return $conn->query("select * from articleorder by dateCreated DESC limit 3;");
  }

}
