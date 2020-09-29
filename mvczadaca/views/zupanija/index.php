<p>Here is a list of all ZUPANIJAs:</p>

<?php foreach($zupanija as $zupanijasingle) { ?>
  <p>
    <?php echo $zupanijasingle->SIFRA_ZUPANIJE ." ".$zupanijasingle->NAZIV_ZUPANIJE  ?>
    <a href='?controller=zupanija&action=show&id=<?php echo $zupanijasingle->SIFRA_ZUPANIJE; ?>'>Vidi detalje</a>
    <a href='?controller=zupanija&action=editzupanija&id=<?php echo $zupanijasingle->SIFRA_ZUPANIJE; ?>'>Uredi</a>
    <a href='?controller=zupanija&action=deletezupanija&id=<?php echo $zupanijasingle->SIFRA_ZUPANIJE; ?>'>BRISI ZUPANIJU</a>
  </p>
<?php } ?>

<form action="index.php?controller=zupanija&action=createzupanija" method="post">
<input type="text" id="sifra_zupanije" name="sifra_zupanije" placeholder="Unesite šifru županije"/>
<input type="text" id="naziv_zupanije" name="naziv_zupanije" placeholder="Unesite naziv županije"/>
<input type="submit" value="UNESI" />
</form>