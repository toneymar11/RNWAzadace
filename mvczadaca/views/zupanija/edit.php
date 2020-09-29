<p>This is edit view of DJELATNIK:</p>


<form action="index.php?controller=zupanija&action=uredizupanija" method="post">
<input type="hidden" id="sifra_zupanije" name="sifra_zupanije" value="<?php echo $zupanija->SIFRA_ZUPANIJE; ?>" />
<input type="text" id="naziv_zupanije" name="naziv_zupanije" size="40" value="<?php echo $zupanija->NAZIV_ZUPANIJE; ?>"/>
<input type="submit" value="UREDI" />
</form>

