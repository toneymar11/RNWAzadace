<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM posts');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['author'], $post['content']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content']);
    }

    public static function createpost($author, $content) {
      $db = Db::getInstance();
 
    $sql=" INSERT INTO `posts` (`id`, `author`, `content`)
           VALUES (NULL, '$author', '$content');";
  
    if ($db->query($sql) == TRUE){
    //if (1==2){
      $rez="USPJESAN UNOS";
    }
      else {
       $rez="NESPJESAN UNOS";;
      }
      return $rez;
    
    }
    

    public static function deletepost($id) {
      $db = Db::getInstance();
      
	  $sql="DELETE FROM POSTS WHERE ID ='$id'";

	  if ($db->query($sql) == TRUE){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NESPJESNO brisanje";;
		  }
		  return $rez;
	  
  }
  public static function editpost($id){

    $db = Db::getInstance();
    $id = intval($id);
    $req = $db->prepare('SELECT * FROM POSTS WHERE ID = :id');
   
    $req->execute(array('id' => $id));
    $post = $req->fetch();
  
    return new Post($post['id'], $post['author'], $post['content']);
  
  }

  public static function uredipost($id, $author, $content){

    $db = Db::getInstance();
   
    $id = intval($id);
    
    $sql=" UPDATE posts SET author = '$author', content = '$content' WHERE id = $id";
  
  if ($db->query($sql) == TRUE){
  
    $rez="USPJESAN UPDATE";
  }
    else {
     $rez="NESPJESAN UPDATE";;
    }
    return $rez;
    
  }

  }
?>