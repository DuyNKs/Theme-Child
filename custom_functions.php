<?php
	// Custom Functions Theme. 
	// By NK Duy 22 Sep 2014
	
// Look Single, Archive, 404, Search, Home 
	remove_action('genesis_loop', 'genesis_do_loop');
	add_action('genesis_loop', 'genesis_do_loop_dmf');
	
		function genesis_do_loop_dmf() {
			if(is_single()){
				include CHILD_DIR. '/includes/single_loop.php';
			}	
				elseif(is_archive() || is_404() || is_search() )	{
				include CHILD_DIR. '/includes/archive_loop.php';
			}	
				elseif (is_home())	{
				remove_action( 'genesis_loop', 'genesis_do_loop' );
			} else {
				genesis_standard_loop();
			}
		}

// End Look

// File Widget Function
require_once(get_stylesheet_directory().'/includes/share-box.php');
require_once(get_stylesheet_directory().'/includes/widgets/sidebar-contact.php');
require_once(get_stylesheet_directory().'/includes/widgets/sidebar-topic.php');
require_once(get_stylesheet_directory().'/includes/widgets/sidebar-promotedposts.php');
require_once(get_stylesheet_directory().'/includes/widgets/sidebar-home-box-top.php');
require_once(get_stylesheet_directory().'/includes/widgets/sidebar-home-box-bottom.php');
require_once(get_stylesheet_directory().'/includes/widgets/sidebar-home-box-bottom-list.php');
require_once(get_stylesheet_directory().'/includes/widgets/customer-comments.php');
require_once(get_stylesheet_directory().'/includes/widgets/home-partner.php');
require_once(get_stylesheet_directory().'/includes/widgets/sidebar-hotline.php');



// End File Widget Function
	
// Page Navi
	add_filter( 'genesis_prev_link_text', 'modify_previous_link_text' );
		function modify_previous_link_text($text) {
        	$text = '« Trước';
        	return $text;
		}
		
	add_filter( 'genesis_next_link_text', 'modify_next_link_text' );
		function modify_next_link_text($text) {
        	$text = 'Sau »';
			return $text;
		}
// End Page Navi

// Readmore
	add_filter('excerpt_more', 'auto_excerpt_more');
		function auto_excerpt_more($more) {
			return '<div class="cn_read"><a href="' . get_permalink() . '" rel="nofollow">Xem chi tiết »</a></div>';
		}
	
// End Readmore

// Footer
	remove_action('genesis_footer', 'genesis_do_footer');
	add_action ('genesis_footer', 'custom_footer');
		function custom_footer() { 
			?>

		<?php
			if (is_singular( array('du-hoc-my', 'du-hoc-uc', 'du-hoc-cac-nuoc-khac') )) { ?>
				<div class="ft-widget">
					<section id="multimedia" class="multi-2">
						<div class="container">
						
				 			<div class="row">
				
				 				<?php dynamic_sidebar( 'homeboxbottom-widget' ); ?>
				
							
				 			</div>
						</div>
					</section>
				</div>
		<?php	} // end if
			
		?>
	<div id="footer">
	 	<div class="container">
	 		<div class="row">
	 			<div class="col-sm-12 contact-home">
					<div class="mch">
						<p class="tmch">Đăng ký tư vấn du học</p>
						<a class="ctamh" href="<?php echo home_url(); ?>/lien-he" title="Liên hệ để được tư vấn">Đăng ký</a>
						<p class="pmch"><i class="fa fa-phone"></i> 0901 394 656</p>
					</div>
				</div>
			</div>
	 		<div class="row">
	 			<div class="col-xs-3 col-sm-3 col-md-3">
					
					<a href="<?php echo home_url(); ?>" class="logo-top">
				  		<img class="ftlogo" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-home.png" alt="">
				  	</a>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-3">
					<h4 class="title"><i class="fa fa-map-marker"></i> Liên hệ chúng tôi</h4>
					<div class="footermap">
						<span class="address">
				          <i class="fa fa-home"></i> 157/13/1 Đường D2, Phường 25, Quận Bình Thạnh, TP. Hồ Chí Minh
				        </span>
						<span class="phone">
				           <i class="fa fa-phone"></i> 0901 394 656
				        </span>
						<span class="email">
				          <i class="fa fa-envelope"></i> <a href="mailto:info@acuravietnam.com">info@acuravietnam.com</a>
				        </span>
						
					</div>
				</div>
				
				<div class="col-xs-4 col-sm-4 col-md-3">
					<h4 class="title"><i class="fa fa-support"></i> Luôn luôn cập nhật</h4>
					<div id="quotes">
						<ul>
			                <li><a href="<?php echo home_url(); ?>/blog">Cẩm nang du học</a></li>
			                <li><a href="<?php echo home_url(); ?>/tin-tuc">Học bổng</a></li>  
							<li><a href="<?php echo home_url(); ?>/danh-ba-truong">Sự kiện</a></li>
			             </ul>
						 
					</div>
				</div>

				<div class="col-sm-6 col-md-3 box-ftv">
					<h4 class="title">&nbsp;</h4>
					<div class="block-content">
<div class="fb-like" data-href="https://www.facebook.com/thuongmenhieu" data-width="250" data-layout="standard" data-action="like" data-show-faces="true" data-share="false" data-colorscheme="dark"></div>
<ul class="b-footer-3__social-more clearfix">
                    <li><a href="https://www.youtube.com/channel/UC0LLQdTJjcvVPlmP8Xkm4Iw" title="Youtube" target="_blank"><i class="fa fa-youtube-play"></i>Youtube</a></li>
                    <!-- <li><a href="https://twitter.com/acuravietnam" title="Twitter" target="_blank"><i class="fa fa-twitter"></i>Twitter</a></li> -->
                    <li><a href="https://plus.google.com/u/0/108931827s998534340762/posts" title="Google+" target="_blank"><i class="fa fa-google-plus"></i>Google+</a></li>
                     <!-- <li><a href="http://www.linkedin.com/company/acuravietnam" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i>Linkedin</a></li> -->
                    </ul>
</div>
				</div>
	 		</div>

	 		<div class="row">
	 			<div class="col-sm-12 f-crt">
					Copyright 2015 by Acuravietnam.vn. All rights Reserved
				</div>
			</div>

	 	</div>
	 </div>

			<?php
		}
// End Footer

// Liên hệ Single Du học 
function form_lienhe () {
?>
	<div class="white-bg">
		<p class="dark-blue-txt">Nếu bạn vẫn còn thắc mắc về <span class="red-txt bolder">Du học Mỹ</span> cực thú vị này</p>
		<p class="dark-blue-txt">hãy gọi ngay <span class="red-txt bolder">0902 300 094</span> để chúng tôi giúp bạn có được</p>
		<p class="dark-blue-txt">sự lựa chọn đúng đắn nhất!</p>
		<p class="v-space-mg-top-md">Hoặc để AcuraVietNam gọi lại cho bạn:</p>
		<?php gravity_form(2, false, false, false, '', true, 12); ?> 
	</div>

<?php } 



// Search form input box text
	add_filter( 'genesis_search_text', 'sp_search_text' );
		function sp_search_text( $text ) {
			return esc_attr( 'Nội dung cần tìm kiếm' );
		}
// End Search form input box text

// Modify Breadcrumb Arguments

	add_filter( 'genesis_breadcrumb_args', 'dmf_breadcrumb_args' );
	
	function dmf_breadcrumb_args( $args ) {
		$args['home'] = 'Trang chủ';
		$args['sep'] = ' &#8226; ';
		$args['list_sep'] = ', '; // Genesis 1.5 and later
		$args['prefix'] = '<div class="breadcrumb">';
		$args['suffix'] = '</div>';
		$args['heirarchial_attachments'] = true; // Genesis 1.5 and later
		$args['heirarchial_categories'] = true; // Genesis 1.5 and later
		$args['display'] = true;
		$args['labels']['prefix'] = '';
		$args['labels']['author'] = '';
		$args['labels']['category'] = ''; // Genesis 1.6 and later
		$args['labels']['tag'] = '';
		$args['labels']['date'] = '';
		$args['labels']['search'] = '';
		$args['labels']['tax'] = '';
		$args['labels']['post_type'] = '';
		$args['labels']['404'] = 'Not found: '; // Genesis 1.5 and later
		return $args;
	}
// End Breadcrumb

// Excerpt Length
	add_filter( 'excerpt_length', 'dmf_excerpt_length' );
	
	function dmf_excerpt_length( $length ) {
		return 35; // pull first 50 words
	}
// End Excerpt Length

// Post Meta 
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	
	add_filter( 'genesis_post_meta', 'dmf_post_meta_filter' );
	
	function dmf_post_meta_filter($post_meta) {
	
		if ( !is_page() ) {
			$post_meta = '[post_tags before=""]';
			return $post_meta;
			}
	}

// End Post Meta 
// Bài viết 
function article($width,$height) { 
?>
			<div class="cover" style="background-image: url(<?php img3($width,$height); ?>);">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Xem bài %s', 'vnh' ), the_title_attribute( 'echo=0' ) ); ?>"></a>
			</div>
			<header>
				<h3>
					<a href="<?php the_permalink(); ?>"  title="<?php printf( esc_attr__( 'Xem bài %s', 'vnh' ), the_title_attribute( 'echo=0' ) ); ?>">
						<?php the_title(); ?>
					</a>
		
				</h3>	
				<time itemprop="datePublished" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>					
				<p class="cate">
					<?php
						// foreach((get_the_category()) as $category2) { 
						//		echo $category2->cat_name; 
						// }
					?>
				</p>
			</header>
<? }

// Related Posts
function tags_related_posts_thumb() {
	global $post, $wpdb;
	$backup = $post;  // backup the current object
	$tags = wp_get_post_tags($post->ID);
	$tagIDs = array();
	if ($tags) {
	  $tagcount = count($tags);
	  for ($i = 0; $i < $tagcount; $i++) {
	    $tagIDs[$i] = $tags[$i]->term_id;
	  }

	  $args=array(
	    'tag__in' => $tagIDs,
	    'post__not_in' => array($post->ID),
	    'showposts'=>4,
	    'caller_get_posts'=>1
	    //'orderby' => 'rand'
	  );
	  
	  $categories = get_the_category($post->ID);
	  
	  $my_query = new WP_Query($args);
	  if( $my_query->have_posts() ) { $related_post_found = true; ?>
		<section class="recommendation">
			<header>
				<div class="hgroup">
					<h3>
						<a href="<?php echo home_url(); ?>" title="Bạn có thể quan tâm">Bạn có thể quan tâm</a>
					</h3>
				</div>
			</header>
	    <?php while ($my_query->have_posts()) : $my_query->the_post();
					echo "<article>";
						article(210,140);
					echo "</article>";
			endwhile;
	    	echo "</section>"; // End Div Relates 
		} // End if
	}

	//show recent posts if no related found
	if(!$related_post_found){ ?>
		<section class="recommendation">
			<header>
				<div class="hgroup">
					<h3>
						<a href="<?php echo home_url(); ?>" title="Bạn có thể quan tâm">Bạn có thể quan tâm</a>
					</h3>
				</div>
			</header>
		<?php
		$posts = get_posts('numberposts=4&orderby=rand');
		foreach($posts as $post) { 
					echo "<article>";
						article(210,140);
					echo "</article>";
		}
			echo "</section>"; // End Div Relates 
	}
	wp_reset_query();
}

// End Relate Post & Random

// Bai Viet
function post_related_bottom($type) {
	global $post, $wpdb;
	$backup = $post;  // backup the current object

			$counter = 0;
			$max = 4; //number of categories to display
			$taxonomy = 'category';
			$terms = get_terms($taxonomy);
			shuffle ($terms);
			//echo 'shuffled';
			if ($terms) {
				foreach($terms as $term) {
					$counter++;
					if ($counter <= $max) { ?>
					
					<section class="category <?php echo $type; ?>">
						<header>
							<h3><?php echo '<a href="' . get_category_link( $term->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>' . $term->name.'</a>';?></h3>
						</header>
						<?php
							
							$args2 = array(
							    'post__not_in' => array($post->ID),
							    'showposts'=>1,
							    'caller_get_posts'=>1,
								'category__in' => array($term->term_id),
							    'orderby' => 'rand'
							);
							$my_query2 = new WP_Query($args2);
							
							$argslist2 = array(
								'post__not_in' => array($post->ID),
								'category__in' => array($term->term_id),
							    'showposts'=>4,
							    'caller_get_posts'=>1,
								'offset'=>1,
							    'orderby' => 'rand'
							);
							$my_querylist2 = new WP_Query($argslist2);
					
								while ($my_query2->have_posts()) : $my_query2->the_post();
										echo "<article class='featured'>";
											article(210,140);
										echo "</article>";
								endwhile;
					
								while ($my_querylist2->have_posts()) : $my_querylist2->the_post();
										echo "<article>";
											article(210,140);
										echo "</article>";
								endwhile;
							
						?>
						
				 	<?php echo "</section>"; // End Div Relates  
					 	} // End if conu
 				} // end foreach
			} // end if 
	
	wp_reset_query();
	
}



// Bai Viet Cung Chuyen Muc
function category_related_posts() {
	$orig_post = $post;
	global $post, $wpdb;
	$categories = get_the_category($post->ID);
	
	if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args=array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'orderby' => 'rand',
			'posts_per_page'=> 4, // Number of related posts that will be shown.
			'caller_get_posts'=>1
		);
		$my_query = new wp_query( $args );
		
		if( $my_query->have_posts() ) {
			echo '<div class="recommendation"><h3>Bài viết cùng chuyên mục</h3>';
			while( $my_query->have_posts() ) {
				$my_query->the_post();
		?>
			<article>
				<div class="cover" style="background-image: url(<?php img2(210,140); ?>)">
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Xem bài %s' ), the_title_attribute( 'echo=0' ) ); ?>"></a>
				</div>
				<header>
					<h1>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Xem bài %s' ), the_title_attribute( 'echo=0' ) ); ?>">
							<?php the_title(); ?>
						</a>
					</h1>
					<time class="entry-time" itemprop="datePublished" datetime="<?php the_time(__('d/m/Y','genesis')) ?>"><?php the_time(__('d/m/Y','genesis')) ?></time>
					<p class="cate"><?php echo $categories[0]->cat_name;?></p>
				</header>
			</article>
			<?
			}
				echo '</div>';
		}
	}
	$post = $orig_post;
	wp_reset_query();
	
}
// End Bai Viet Cung Chuyen Muc

// Bài viết trong tuần trước
function last_week_posts() {

	global $post, $wpdb;
	
	$thisweek = date('W');
		if ($thisweek != 1) :
			$lastweek = $thisweek - 1;
		else :
			$lastweek = 52;
		endif;
		
	$year = date('Y');
		if ($lastweek != 52) :
			$year = date('Y');
		else:
			$year = date('Y') -1;
		endif;
	
	$args=array(
	    'showposts'			=>	5,
	    'caller_get_posts'	=>	1,
	    'year'				=>	$year,
	    'w'					=> 	$lastweek,
	    'post__not_in' 		=> 	array($post->ID)
	);
	
	
	$my_query = new WP_Query($args);
	
	if( $my_query->have_posts() ) { ?>
		<h3>Bài viết tuần trước</h3>
		<ul class="relate">		
	    	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
					<time class="entry-time" itemprop="datePublished" datetime="<?php the_time(__('d/m/Y','genesis')) ?>"><?php the_time(__('d/m/Y','genesis')) ?></time>
				</li>				
			<?php endwhile; ?>
		</ul>		
	  <?php } else {
			echo "Không có bài viết trong tuần trước =.=!";	  
	  }
	
	wp_reset_query();
 
}
// End Bài viết trong tuần

// Post Views Popular
	function wpb_set_post_views($postID) {
	    $count_key = 'wpb_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	//To keep the count accurate, lets get rid of prefetching
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	
	function wpb_track_post_views ($post_id) {
	    if ( !is_single() ) return;
	
	    if ( empty ( $post_id) ) {
	        global $post;
	        $post_id = $post->ID;   
	    }
	    echo '<!-- mfunc';
	    wpb_set_post_views($post_id);
	    echo '--><!-- /mfunc -->';
	}
	add_action( 'wp_head', 'wpb_track_post_views');
	
	function wpb_get_post_views($postID){
	   $count_key = 'wpb_post_views_count';
	    $count = get_post_meta( $postID, $count_key, true );
	    if($count=='') {
	        // delete old 'post_views_count' value.
	        delete_post_meta( $postID, $count_key );
	        // add new 'post_views_count' value.
	        add_post_meta( $postID, $count_key, '0' );  
	        return "0 View";
	    }
	    
	    return $count.' Views';
	} // Gọi Lượt view post ra ngoài. echo wpb_get_post_views(get_the_ID());


// End Post Views Popular

// Bài viết đang được quan tâm theo lượt views
function views_popular_posts() {
	global $post, $wpdb;
	
	$thisweek = date('W');
		if ($thisweek != 1) :
			$lastweek = $thisweek - 1;
		else :
			$lastweek = 52;
		endif;
		
	$year = date('Y');
		if ($lastweek != 52) :
			$year = date('Y');
		else:
			$year = date('Y') -1;
		endif;	
	
	$args = array(
		 	'showposts'			=>	4,
		 	'meta_key'			=>	'wpb_post_views_count',
		 	'orderby'			=>	'meta_value_num',
		 	'order'				=>	'DESC',
		 	'caller_get_posts'	=>	1,
		 	'post__not_in' 		=> 	array($post->ID) 
	 );
	
	$my_query = new WP_Query($args);
	
	if( $my_query->have_posts() ) { ?>
		<h3>Bài viết đc xem nhiều</h3>
		<ul class="relate">		
	    	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
					<?php echo wpb_get_post_views(get_the_ID()); ?>
				</li>				
			<?php endwhile; ?>
		</ul>		
	  <?php } else {
			echo "Không có bài viết nào đang được xem nhiều =.=!";	  
	  }
	
	wp_reset_query();
 
}
// End Bài viết đang được quan tâm theo lượt views


?>