<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->
	<footer id="footer_home" class="container-fluid">
    <div class="container">
        <section class="row">
            <article class="col-md-4 col-xs-12">
                <h3>Auteurs</h3>
                <div class="row">
                    <ul class="col-md-6 col-xs-6">
                    <?php
					$users = get_users( array( 'fields' => array( 'ID' ) ) );
					$i = 0;
					foreach($users as $user_id){
						if ($i%10==0 && $i!=0){
							echo "</ul>
				                    <ul class='col-md-6 col-xs-6' >";
						}
						$i++;
						echo '<li><a href="'.esc_url( get_author_posts_url($user_id->ID ) ).'">'; 
				        $user = get_user_meta ( $user_id->ID);
				        $first_name = $user["first_name"][0];
				        $user = get_user_meta ( $user_id->ID);
				        $last_name = $user["last_name"][0];
				        echo $first_name ." ".$last_name;
				        echo "</a></li>";
				    }?>
                    </ul>
                </div>
            </article>
            <article class="col-md-4">
                <h3>Catégorie</h3>
                <div class="row">
                    <ul class="col-md-6 col-xs-6">
                       	<?php
					
					$categories = get_categories( array(
					    'orderby' => 'name',
					    'order'   => 'ASC'
					) );
					 $i = 0;
					foreach( $categories as $category ) {
						if ($i%10==0 && $i!=0){
												echo "</ul>
									                    <ul class='col-md-6 col-xs-6' >";
											}
											$i++;
					    $category_link = sprintf( 
					        '<a href="%1$s" alt="%2$s">%3$s</a>',
					        esc_url( get_category_link( $category->term_id ) ),
					        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
					        esc_html( $category->name )
					    );
					     
					    echo '<li>' . sprintf(  $category_link ) . '</li> ';
					   
					   
					} ?>
                    </ul>
                </div>
            </article>
            <article class="col-md-4">
                <h3>Méta</h3>
                <div class="row">
                    <ul class="col-md-6">
                        <li><a href="">Connexion</a></li>
                        <li><a href="">Flux RSS des articles</a></li>
                        <li><a href="">RSS des commentaires</a></li>
                    </ul>
                </div>
            </article>
    </section>
  </div>
    <article id="footer_copyright" class="row">
        <div class="logo col-md-9">
          <a href="#"><img class="img-responsive"  src="assets/images/logo/logo_GEN.svg" alt="Logo GEN"></a>
          <a href="#"><img class="img-responsive"  src="assets/images/logo/logo_OFP.svg" alt="Logo Online"></a>
          <a href="#"><img class="img-responsive"  src="assets/images/logo/logo_ACS.svg" alt="Logo ACS"></a>
        </div>
        <div class="sociaux logo col-md-3 text-center">
          <a href="#"><svg enable-background="new 0 0 48 48" id="Layer_1" version="1.1" viewBox="0 0 48 48" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.9,19.5h-4v-2.6c0-1,0.7-1.2,1.1-1.2c0.5,0,2.8,0,2.8,0v-4.4l-3.9,0c-4.4,0-5.3,3.3-5.3,5.3v2.9h-2.5V24  h2.5c0,5.8,0,12.7,0,12.7h5.3c0,0,0-7,0-12.7h3.6L29.9,19.5z" fill="#FFFFFF"/></svg></a>
          <a href="#"><svg enable-background="new 0 0 48 48" id="Layer_1" version="1.1" viewBox="0 0 48 48" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M36.8,15.4c-0.9,0.5-2,0.8-3,0.9c1.1-0.7,1.9-1.8,2.3-3.1c-1,0.6-2.1,1.1-3.4,1.4c-1-1.1-2.3-1.8-3.8-1.8    c-2.9,0-5.3,2.5-5.3,5.7c0,0.4,0,0.9,0.1,1.3c-4.4-0.2-8.3-2.5-10.9-5.9c-0.5,0.8-0.7,1.8-0.7,2.9c0,2,0.9,3.7,2.3,4.7    c-0.9,0-1.7-0.3-2.4-0.7c0,0,0,0.1,0,0.1c0,2.7,1.8,5,4.2,5.6c-0.4,0.1-0.9,0.2-1.4,0.2c-0.3,0-0.7,0-1-0.1    c0.7,2.3,2.6,3.9,4.9,3.9c-1.8,1.5-4.1,2.4-6.5,2.4c-0.4,0-0.8,0-1.3-0.1c2.3,1.6,5.1,2.6,8.1,2.6c9.7,0,15-8.6,15-16.1    c0-0.2,0-0.5,0-0.7C35.2,17.6,36.1,16.6,36.8,15.4z" fill="#FFFFFF"/></g></g></svg></a>
          <a href="#"><svg enable-background="new 0 0 32 32" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Style_2"><g><g><polygon fill="#FFFFFF" points="6.518,21.815 11.707,15.291 6.518,12.119   "/><polygon fill="#FFFFFF" points="19.5,15.746 15.989,17.908 12.472,15.758 7.11,22.5 24.867,22.5   "/><polygon fill="#FFFFFF" points="15.988,16.864 25.482,11.017 25.482,9.5 6.518,9.5 6.518,11.076   "/><polygon fill="#FFFFFF" points="20.263,15.276 25.482,21.843 25.482,12.062   "/></g></g></svg></a>
        </div>
    </article>

</footer>

			<?php
				/*
				 * A sidebar in the footer? Yep. You can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<?php do_action( 'twentyeleven_credits' ); ?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyeleven' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyeleven' ), 'WordPress' ); ?></a>
			</div>
	<!-- </footer>#colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/js.js"></script> -->
<script type="text/javascript">
	function randString() {
			var T=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17];
			for(var i=T.length-1; i>=1; i--){
				//j reçoit un nombre entier aléatoire entre 0 et i
				var j = Math.floor(Math.random()*(i+1));

				var tmp = T[i];
				T[i] = T[j];
				T[j] = tmp;
			}
	        return T;
	    }

		function constructHeader(){
			//if(1){ /*si c'est la page accueil alors on construit la zone de portraits */
				var order = randString();
				console.log(order);

				var elem = document.getElementById('zoneSpeHome');
				var html = '<div id="zoneFlex404">';
				var i = 0;
				for (i = 0; i < 10; i++) {
						html += '<div class="carte"><a href="<?php echo get_author_posts_url(1); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/promo404-'+ order[i] +'.png"></a></div>';
				}
				html += '<div class="carteFixe"><a href="<?php echo get_home_url() ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo/404.png"></a></div>';
				for (i = 10; i < 17; i++) {
					if(i==10) {
						html += '<div class="carteFixe">';
					}
					else{
						html += '<div class="carte">'
					}

					html += '<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/promo404-'+ order[i] +'.png"></a></div>';

				}
				html += '</div>';
				elem.innerHTML = html;
			//}
			
		}

</script>

</body>
</html>
