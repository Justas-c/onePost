<?php

class Post
{
  private $db;
  
  public function __construct(){
      $this->db = new Database;
  }
  
  public function getPosts(){
      $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');
      $results = $this->db->resultSet();
      return $results;
  }
  
  public function addPost($data){
      //Prepare statement
      $this->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');
      //bind values
      $this->db->bind(':user_id', $_SESSION['user_id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
  
  if ($this->db->execute()){
      return true;
  }else{
      die('ups, smth went wrong');
      return false;
    }
  }
  
  public function getPostById($id){
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);
      if ($this->db->execute()){
          $row = $this->db->single();
          return $row;
      }else{
              die('ups, smth went wrong(getPostById func)');
          }
  
  }
  
  
  public function editPost($data){
      $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id= :id');
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      
  if ($this->db->execute()){
      return true;
  }else{
      die('ups, smth went wrong in edit post model');
      return false;
    }
  
  }

}//end of class