<p>This is edit view of POSTS:</p>


<form action="index.php?controller=posts&action=uredipost" method="post">
<input type="hidden" id="id" name="id" value="<?php echo $post->id; ?>" />
<input type="text" id="author" name="author" value="<?php echo $post->author; ?>"/>
<input type="text" id="content" name="content" size="50" value="<?php echo $post->content; ?>"/>
<input type="submit" value="UREDI" />
</form>

