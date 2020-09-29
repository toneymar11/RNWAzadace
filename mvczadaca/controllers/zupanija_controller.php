<?php
  class ZupanijaController {
    public function index() {
      // we store all the posts in a variable
      $zupanija = Zupanija::all();
      require_once('views/zupanija/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $zupanija = Zupanija::find($_GET['id']);
      require_once('views/zupanija/show.php');
    }
	public function deletezupanija() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $zupanija = Zupanija::deletezupanija($_GET['id']);
      require_once('views/zupanija/delete.php');
    }
    public function createzupanija(){
      
      $zupanija = Zupanija::createzupanija($_POST['sifra_zupanije'], $_POST['naziv_zupanije']);
      require_once('views/zupanija/create.php');
    }

    public function editzupanija() {
     
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $zupanija = Zupanija::editzupanija($_GET['id']);
      require_once('views/zupanija/edit.php');
    }

    public function uredizupanija(){
      
      $zupanija = Zupanija::uredizupanija($_POST['sifra_zupanije'], $_POST['naziv_zupanije']);
      require_once('views/zupanija/uredi.php');
    }


  }
?>