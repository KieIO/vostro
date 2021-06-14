<?php
	get_header();
	
$cat = get_the_category();
$post = get_post();
$meta = get_post_meta($post->ID);
$img = $meta['_thumbnail_id'][0] ? wp_get_attachment_image_src($meta['_thumbnail_id'][0], 'large')[0] : 'https://ui-avatars.com/api/?name='.urlencode($meta['name'][0]).'&color=98262B&background=F6A300';
?>
<main>
<section class="blog-article-wrap u-first-section-page u-section-padding">
        <div class="blog-article-title text-center"><?= $post->post_title ?></div>
        <div class="blog-article-actor">
          <img src="<?= $img?>" class="avatar" alt="actor" />
          <p>BY <?= $meta['name'][0]?></p>
          <button class="u-button u-button-ghost"><?= $cat[0]->name?></button>
        </div>
        <div class="blog-article-content">
         <?= $post->post_content ?>
        </div>
        <div class="blog-article-space"></div>
        <div class="blog-article-btn-share">
			<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/assisfery/SocialShareJS@1.3/social-share.min.css">
			<script src="https://cdn.jsdelivr.net/gh/assisfery/SocialShareJS@1.3/social-share.min.js"></script>
			
			<div class="ss-box"></div>-->


          <button class="u-button u-button-primary">Share this article</button>
        </div>
      </section>
      <section class="blog-article-related">
        <div class="article-related-title">Related articles</div>
        <div class="article-related-list">
          <ul class="blogs-list">
            <?= do_shortcode('[article_list search="" page="0" raw="1" per_page="4"]')?>
          </ul>
        </div>
      </section>
</main>
<?php
	get_footer();
