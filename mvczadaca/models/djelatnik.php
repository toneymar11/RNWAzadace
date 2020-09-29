<?php
  class Djelatnik {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $ID_DJELATNIKA;
    public $IME;
    public $PREZIME;

    public function __construct($ID_DJELATNIKA, $IME, $PREZIME) {
      $this->ID_DJELATNIKA      = $ID_DJELATNIKA;
      $this->IME  = $IME;
      $this->PREZIME = $PREZIME;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM DJELATNIK');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Djelatnik($post['ID_DJELATNIKA'], $post['IME'], $post['PREZIME']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM DJELATNIK WHERE ID_DJELATNIKA = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Djelatnik($post['ID_DJELATNIKA'], $post['IME'], $post['PREZIME']);
    }

    public static function deletedjelatnik($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM DJELATNIK WHERE ID_DJELATNIKA ='$id'";
	  //echo $sql;
	  
      //$req = $db->prepare($sql);
      // the query was prepared, now we replace :id with our actual $id value
      //if ($req->execute(array('id' => $id))){
		  //$req=$r->execute($sql);
	if ($db->query($sql) == TRUE){
	//if (1==2){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NESPJESNO brisanje";;
		  }
		  return $rez;
	  
}
public static function createdjelatnik($ime, $prezime) {
  $db = Db::getInstance();
  // we make sure $id is an integer
  //$id = intval($id);
$sql=" INSERT INTO `djelatnik` (`ID_DJELATNIKA`, `IME`, `PREZIME`)
       VALUES (NULL, '$ime', '$prezime');";
//echo $sql;

  //$req = $db->prepare($sql);
  // the query was prepared, now we replace :id with our actual $id value
  //if ($req->execute(array('id' => $id))){
  //$req=$r->execute($sql);
if ($db->query($sql) == TRUE){
//if (1==2){
  $rez="USPJESAN UNOS";
}
  else {
   $rez="NESPJESAN UNOS";;
  }
  return $rez;

}
public static function editdjelatnik($id){

  $db = Db::getInstance();
  // we make sure $id is an integer
  $id = intval($id);
  $req = $db->prepare('SELECT * FROM DJELATNIK WHERE ID_DJELATNIKA = :id');
  // the query was prepared, now we replace :id with our actual $id value
  $req->execute(array('id' => $id));
  $post = $req->fetch();

  return new Djelatnik($post['ID_DJELATNIKA'], $post['IME'], $post['PREZIME']);

}

public static function uredidjelatnik($id, $ime, $prezime){

  $db = Db::getInstance();
  // we make sure $id is an integer
  $id = intval($id);
  $req = $db->prepare("");
 
  $sql=" UPDATE djelatnik SET IME = '$ime', PREZIME = '$prezime' WHERE ID_DJELATNIKA = $id";

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