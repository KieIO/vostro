<?php
	get_header();
?>
<main>
<section class="title-center u-first-section-page blog-title" data-aos="fade-up">
            <h2 class="u-heading-2 title-main">
                ADVICE TO HELP YOU GET AHEAD
            </h2>
        </section>
        <section class="blog-filter u-section-padding"">
            <div class="blog-filter-wrap">
                <div class="label">Filter:</div>
                <div class="filter-list">
                    <select class="filter-select">
                        <option>All</option>
                        <option>Tuesday Tip</option>
                        <option>Family First</option>
                        <option>Success Stories</option>
                        <option>Education</option>
                    </select>
                </div>
            </div>
        </section>
		<?= do_shortcode('[article_list search="" page="0"]')?>
        <section class="btn-show-more-blog">
            <button class="u-button u-button-primary" onclick="loadMoreArticles()">Load more articles</button>
        </section>
		<script>
		var page =1;
		
		function loadMoreArticles(){
			fetch("/?fvn_action=loadmore_article&page="+page, {
				method: 'get'
			})
			.then(res => {
				return res.text();
			})
			.then((response) => {
				document.getElementById('article_list').innerHTML += response;
				page += 1;
			})
			
		}
			
		</script>
</main>
<?php
	get_footer();
