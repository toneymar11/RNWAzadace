<p>Here is a list of all DJELATNIKs:</p>


<?php foreach($djelatnici as $djelatnik) { ?>
  <p>
    <?php echo $djelatnik->IME ." ".$djelatnik->PREZIME  ?>
    <a href='?controller=djelatnici&action=show&id=<?php echo $djelatnik->ID_DJELATNIKA; ?>'>Vidi detalje</a>
    <a href='?controller=djelatnici&action=editdjelatnik&id=<?php echo $djelatnik->ID_DJELATNIKA; ?>'>Uredi</a>
    <a href='?controller=djelatnici&action=deletedjelatnik&id=<?php echo $djelatnik->ID_DJELATNIKA; ?>'>Izbriši</a>
  </p>

<?php } ?>

<form action="index.php?controller=djelatnici&action=createdjelatnik" method="post">
<input type="text" id="ime" name="ime" placeholder="Unesite ime"/>
<input type="text" id="prezime" name="prezime" placeholder="Unesite prezime"/>
<input type="submit" value="UNESI" />
</form>