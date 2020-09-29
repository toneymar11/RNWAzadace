<?php
  class Zupanija  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $SIFRA_ZUPANIJE;
    public $NAZIV_ZUPANIJE;


    public function __construct($SIFRA_ZUPANIJE, $NAZIV_ZUPANIJE) {
      $this->SIFRA_ZUPANIJE      = $SIFRA_ZUPANIJE;
      $this->NAZIV_ZUPANIJE  = $NAZIV_ZUPANIJE;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM ZUPANIJA');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $zupanija) {
        $list[] = new Zupanija($zupanija['SIFRA_ZUPANIJE'], $zupanija['NAZIV_ZUPANIJE']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      
      $req = $db->prepare("SELECT * FROM ZUPANIJA WHERE SIFRA_ZUPANIJE = '$id'");
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $zupanija = $req->fetch();

      return new Zupanija($zupanija['SIFRA_ZUPANIJE'], $zupanija['NAZIV_ZUPANIJE']);
    }
	
	public static function deletezupanija($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM ZUPANIJA WHERE SIFRA_ZUPANIJE ='$id'";
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
public static function createzupanija($sifra_zupanije, $naziv_zupanije) {
  $db = Db::getInstance();
  
$sql=" INSERT INTO `zupanija` (`SIFRA_ZUPANIJE`, `NAZIV_ZUPANIJE`)
       VALUES ('$sifra_zupanije', '$naziv_zupanije');";

  if ($db->query($sql) == TRUE){
  //if (1==2){
  $rez="USPJESAN UNOS";
  }
  else {
   $rez="NESPJESAN UNOS";;
  }
  return $rez;

}
public static function editzupanija($id){

  $db = Db::getInstance();
  // we make sure $id is an integer
  
  $req = $db->prepare("SELECT * FROM ZUPANIJA WHERE SIFRA_ZUPANIJE = '$id'");
  // the query was prepared, now we replace :id with our actual $id value
  $req->execute(array('id' => $id));
  $post = $req->fetch();

  return new Zupanija($post['SIFRA_ZUPANIJE'], $post['NAZIV_ZUPANIJE']);

}


public static function uredizupanija($sifra_zupanije, $naziv_zupanije){

  $db = Db::getInstance();
 
  $sql=" UPDATE zupanija SET NAZIV_ZUPANIJE = '$naziv_zupanije' WHERE SIFRA_ZUPANIJE = '$sifra_zupanije'";

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