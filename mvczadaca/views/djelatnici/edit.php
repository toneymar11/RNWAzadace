<p>This is edit view of DJELATNIK:</p>


<form action="index.php?controller=djelatnici&action=uredidjelatnik" method="post">
<input type="hidden" id="id" name="id" value="<?php echo $djelatnici->ID_DJELATNIKA; ?>" />
<input type="text" id="ime" name="ime" value="<?php echo $djelatnici->IME; ?>"/>
<input type="text" id="prezime" name="prezime" value="<?php echo $djelatnici->PREZIME; ?>"/>
<input type="submit" value="UREDI" />
</form>

