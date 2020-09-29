<?php
  class PostsController {
    public function index() {
      // we store all the posts in a variable
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $post = Post::find($_GET['id']);
      require_once('views/posts/show.php');
    }

    
    public function createpost(){
      
      $post = Post::createpost($_POST['author'], $_POST['content']);
      require_once('views/posts/create.php');
    }

    public function deletepost() {
     
      if (!isset($_GET['id']))
        return call('pages', 'error');

    
      $post = Post::deletepost($_GET['id']);
      require_once('views/posts/delete.php');
    }

    public function editpost() {
     
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = Post::editpost($_GET['id']);
      require_once('views/posts/edit.php');
    }
    public function uredipost(){
      
      $post = Post::uredipost($_POST['id'], $_POST['author'], $_POST['content'] );
      require_once('views/posts/uredi.php');
    }

  }
?>