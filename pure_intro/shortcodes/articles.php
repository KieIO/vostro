<?php

function fvn_shortocde_article_list($atts) {	
	$orderby ='post_title';
	$orderDirection = 'asc';
	
	$metakey = null;
	$offset = isset($atts['page']) ? $atts['page'] : 0;
	$raw = isset($atts['raw']) ? $atts['raw'] : 0;
	$per_page = isset($atts['per_page']) ? $atts['per_page'] : 12;
	$search = $atts['search'];
	$offset = $per_page*$offset;
	$query = array(
		'post_type' => 'article',
		'posts_per_page' => $per_page,
		//'s' => $search,
		'offset'         => $offset,
		'orderby'        => $orderby,  
		'order'          => $orderDirection,
		//'meta_key' => $metakey,
	);
	$post_list = new WP_Query($query);
	$posts  = $post_list->get_posts(); 
	
		
	ob_start();?>
	<?php if(!$raw){?>
		<section class="blogs-list-section">
          <div class="blogs-list-wrap">
              <ul class="blogs-list" id="article_list">
	<?php }?>
			  <?php foreach($posts as $post){
				  $meta = get_post_meta($post->ID);
				  $img= $meta['_thumbnail_id'][0] ? wp_get_attachment_image_src($meta['_thumbnail_id'][0], 'large')[0] : 'https://ui-avatars.com/api/?name='.urlencode($meta['name'][0]).'&color=98262B&background=F6A300';
				  $cat = get_the_category($post);
				  $tag = get_the_tags($post);
				  
				  ?>
                  <li class="cart-item-article" data-aos="fade-up" onclick="window.location.href='<?= get_permalink($post)?>'">
					
                      <div class="tag"><?= $tag[0]->name?></div>
                      <div class="img-wrap">
                          <img src="<?= $img?>" alt="">
                      </div>
                      <h4 class="title u-title-card"><?= $post->post_title ?></h4>
                      <p class="content"><?= $post->post_excerpt ? $post->post_excerpt : substr($post->post_content,0,200)?></p>
					 
                  </li>
			  <?php }?>
    <?php if(!$raw){?>              
		  </ul>
	  </div>
	</section>
	<?php }?>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;

}
add_shortcode('article_list','fvn_shortocde_article_list');
