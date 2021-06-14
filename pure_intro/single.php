<?php
	get_header();
	
$cat = get_the_category();
$post = get_post();
//$meta = get_post_meta($post->ID);
//$img = $meta['_thumbnail_id'][0] ? wp_get_attachment_image_src($meta['_thumbnail_id'][0], 'large')[0] : 'https://ui-avatars.com/api/?name='.urlencode($meta['name'][0]).'&color=98262B&background=F6A300';
?>
<main class="">
	<section class="u-first-section-page u-section-padding u-section-space-bottom aos-init aos-animate">
	<h2 class="u-heading-3"><?= $post->post_title ?></h2>
	<p class="content"><?= $post->post_content ?></p>
	</section>
       
</main>

	<script src="<?= FVN_THEME_URL?>js/scroll-to-footer.js"></script>
<?php
	get_footer();
