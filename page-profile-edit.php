<?php
/* Get user info. */
global
	 $current_user;
	 $wp_roles;
     wp_get_current_user();
     $user_id = $current_user->ID; 


if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    // When submit profile edit form, also will update User 'birthday' Meta with form. //
    if ( !empty( $_POST['birthday'] ) )
     update_user_meta( $current_user->ID, 'birthday', esc_attr( $_POST['birthday'] ) );

} ?>

<form action="" method="post">

<!-- .form-birthday -->
<div class="form-birthday">
    <label for="birthday">Birth Day.Birth Month</label>
    <input class="text-input" name="birthday" type="text" id="birthday" placeholder="01.01"  value="<?php the_author_meta( 'birthday', $current_user->ID ); ?>" />
</div>
<!-- .form-birthday -->


    <input name="updateuser" type="submit" id="updateuser" class="submit button" value="Update" />
    <?php wp_nonce_field( 'update-user' ) ?>
    <input name="action" type="hidden" id="action" value="update-user" />
</form>