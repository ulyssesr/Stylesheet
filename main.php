<?php
 
if($_POST['urr_custom_stylesheet_hidden'] == 'Y') {

  // store data

  $style = $_POST['urr_custom_stylesheet'];
  update_option('urr_custom_stylesheet', $style);

  ?>
  <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
  <?php 

} else {

  //Normal page display
  $style = get_option('urr_custom_stylesheet');
}

?>

<div class="wrap">

  <?php echo "<h2>" . __( 'Custom Stylesheet', 'urr_custom_stylesheet' ) . "</h2>"; ?>

  <form name="urr_custom_stylesheet_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

  <input type="hidden" name="urr_custom_stylesheet_hidden" value="Y">

  <h3><?php _e("Add Your Own Style: " ); ?></h3>

  <p>
  Example:<br/>
  <code>body, p, select, input, label, textarea {font-family: 'Ubuntu', sans-serif;}</code><br/>
  </p>
  <textarea name="urr_custom_stylesheet" rows="12" cols="150"><?php echo stripslashes($style); ?></textarea>

  <p class="submit">
  <input type="submit" name="Submit" value="<?php _e('Save Custom Stylesheet', 'urr_custom_stylesheet' ) ?>" />
  </p>

  <hr />

  </form>

</div>