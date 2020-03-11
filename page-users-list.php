<?php 
/*
Template Name: Show Authors
*/

/* Get user info. */
global
	 $current_user;
	 $wp_roles;
     $user    = wp_get_current_user();
     $user_id = $user->ID; 

if ($user_id) { // is logged in ?>

    <div class="author-list">
        <?php
        $args = array(
            'has_published_posts' => array( 'post' )
        );

        // The Query
        $user_query = new WP_User_Query( $args );

        // User Loop
        if ( ! empty( $user_query->get_results() ) ) {
            foreach ( $user_query->get_results() as $author ) {
                $userAvatar = get_user_meta($author->ID,'userAvatar',true);
                $birthday   = get_user_meta($author->ID,'birthday',true);
                date_default_timezone_set('Europe/Istanbul');
                $today    = date("d.m"); ?>
                <a href="<?php echo get_author_posts_url( $author->ID ); ?>" title="<?php echo $author->display_name . ' - ' . wp_trim_words( $author->description ); ?> " style=" border: none; position: relative;">
                    <img id="uyeImg" src="<?php if($userAvatar) { echo esc_url( $userAvatar ); } else { echo "https://cayarasi.com/wp-content/themes/editorsel/images/default-user-image.jpg";} ?>" alt="<?php echo $author->display_name; ?> avatar" width="75" height="75" style="border-radius: 100%;object-fit: cover;" />
                    <?php 
                        if ( $birthday == $today ) { 
                            echo "<div class='birthday'><i class='fa fa-birthday-cake'></i></div>";
                        }	
                    ?>
                </a>
                <?php
            }
        } else {
            _e( '<p>Sitenizde listelenecek üye bulunamadı</p>', 'editorsel' ); 
        }

        ?>		
    </div>

<?php } // end ?>