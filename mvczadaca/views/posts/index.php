<p>Here is a list of all posts:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->author; ?>
    <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>See content</a>
    <a href='?controller=posts&action=editpost&id=<?php echo $post->id; ?>'>Uredi</a>
    <a href='?controller=posts&action=deletepost&id=<?php echo $post->id; ?>'>Izbriši</a>
  </p>
<?php } ?>

<form action="index.php?controller=posts&action=createpost" method="post">
<input type="text" id="author" name="author" placeholder="Unesite autora"/>
<input type="text" id="content" name="content" size="50" placeholder="Unesite sadržaj"/>
<input type="submit" value="UNESI" />
</form>