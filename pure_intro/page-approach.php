<?php
	get_header();
	$query = array(
		'post_type' => 'post',
		'posts_per_page' => 4,
		//'s' => $search,
		'category_name' => 'approach',
		'offset'         => 0,
		'orderby'        => 'ID',  
		'order'          => 'DESC',
		//'meta_key' => $metakey,
	);
	$post_list = new WP_Query($query);
	$posts  = $post_list->get_posts(); 
?>
<main class="approach">
			<section
				class="
					banner-with-text
					u-section-padding
					u-first-section-page
					u-section-space-bottom
					home-banner-with-text-1
				"
				data-aos="fade-up"
			>
				<h1 class="u-heading-1 title-left-particle">
					A brighter livelihood for you and your family.
				</h1>
				<figure class="img-wrap">
					<img src="<?= FVN_THEME_URL?>assets/images/banner1.png" alt="" />
				</figure>
			</section>
			<article class="cart-item-wrapper">
				<?php foreach($posts as $i=>$post){
				  $meta = get_post_meta($post->ID);
				  $img= wp_get_attachment_image_src($meta['_thumbnail_id'][0], 'large')[0];
				  //$cat = get_the_category($post);
				  //$tag = get_the_tags($post);
				  
				  ?>
				<div class="grid-item grid-item-line" data-aos="fade-up" onclick="window.location.href='<?= get_permalink($post)?>'">
					<section class="cart-item-article">
						<!-- <div class="tag">Lorem</div> -->
						<div class="img-wrap" data-num="<?= $i+1?>">
							<img
								class="approach-cart-item-image"
								src="<?= $img?>"
								alt=""
							/>
						</div>
						<h4 class="title u-title-card">
							<?= $post->post_title ?>
						</h4>
						<p class="content">
							<?= $post->post_excerpt ? $post->post_excerpt : substr($post->post_content,0,200)?>
							
						</p>
					</section>
				</div>
				<?php }?>
				
			</article>
			<section
				class="
					title-center
					u-section-padding u-section-space-top
					padding-bottom-sm
				"
				data-aos="fade-up"
			>
				<h2 class="u-heading-2 title-main">OUR ADVICE SPANS</h2>
			</section>
			<section class="check-list" data-aos="fade-up">
				<div class="check-list-wrapper">
					<span class="check-list-item">
						Wealth Creation, Accumulation & Consolidation
					</span>
					<div class="check-list-item">
						Retirement Planning Strategies
					</div>
					<div class="check-list-item">Investment Advice</div>
					<div class="check-list-item">Finance</div>
					<div class="check-list-item">Superannuation Advice</div>
					<div class="check-list-item">Estate Planning</div>
					<div class="check-list-item">
						Wealth Protection & Life Insurance
					</div>
					<div class="check-list-item">Family Office Workshops</div>
					<div class="check-list-item">
						Business Succession Planning
					</div>
				</div>
			</section>
			<section
				class="
					article-with-img-text
					u-section-padding u-section-space-verticle
				"
				data-aos="fade-up"
			>
				<figure class="img-wrap">
					<img src="<?= FVN_THEME_URL?>assets/images/approach_banner_1.png" alt="" />
				</figure>
				<div class="second-column">
					<article class="content-article">
						<h2 class="u-heading-3">a warm outlook</h2>
						<p class="content">
							We see our relationship as a union of ambition. Your
							lens pictures your aspirational lifestyle, while
							ours visualises the best way to make it a reality.
						</p>
						<div class="bottom">
							<button class="u-button u-button-primary" onclick="scrollToFooter()">
								Let’s chat
							</button>
						</div>
					</article>
				</div>
			</section>
			<section
				class="title-center u-section-padding padding-bottom-md"
				data-aos="fade-up"
			>
				<h2 class="u-heading-2 title-main">COMPARE YOUR OPTIONS</h2>
			</section>
			<article class="cart-item-wrapper u-section-space-bottom">
				<div class="grid-item grid-item-line" data-aos="fade-up">
					<section class="cart-item-article">
						<h4 class="title u-title-card">ESSENTIAL</h4>
						<p class="content">
							This is a straight-forward management plan to
							accompany a straight-forward wealth strategy. If a
							formal ‘reset’ meeting every year is what you
							desire, this is the package for you.
						</p>
						<button class="u-button u-button-ghost card-button">
							<a href="#footer">Compare package</a>
						</button>
					</section>
				</div>
				<div class="grid-item grid-item-line" data-aos="fade-up" data-aos-delay="200">
					<section class="cart-item-article">
						<h4 class="title u-title-card">PLUS</h4>
						<p class="content">
							Perhaps you’d like the flexibility to catch up when
							adhoc opportunities arise? Or have 24/7 access to
							your own portal to track your goals progress and
							house your key documents?
						</p>
						<button class="u-button u-button-ghost card-button">
							<a href="#footer">Compare package</a>
						</button>
					</section>
				</div>
				<div class="grid-item grid-item-line" data-aos="fade-up" data-aos-delay="400">
					<section class="cart-item-article">
						<h4 class="title u-title-card">PREMIUM</h4>
						<p class="content">
							This more ambitious package is designed to regularly
							monitor your portfolio, with the added perks of
							access to market commentary and invitations to our
							events.
						</p>
						<button class="u-button u-button-ghost card-button">
							<a href="#footer">Compare package</a>
						</button>
					</section>
				</div>
				<div class="grid-item" data-aos="fade-up" data-aos-delay="600">
					<section class="cart-item-article">
						<!-- <div class="tag">Lorem</div> -->
						<h4 class="title u-title-card">PRIVATE</h4>
						<p class="content">
							This is the bells and whisles, with cherries and
							cream on top. Basically, we’ll be in your
							‘favourites’ phone list to promptly respond, pivot
							and optimise your strategy where required.
						</p>
						<button class="u-button u-button-ghost card-button">
							<a href="#footer">Compare package</a>
						</button>
					</section>
				</div>
			</article>
			<section
				class="description u-section-space-bottom"
				data-aos="fade-up"
			>
				<div class="description-content">
					Like us, you’ve worked hard to get to where you are. Now,
					it’s time to let us help you make your assets work harder.
				</div>
			</section>
        </main>
        <script src="<?= FVN_THEME_URL?>js/scroll-to-footer.js"></script>
<?php
	get_footer();
