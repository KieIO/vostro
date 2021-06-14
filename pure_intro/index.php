<?php
	get_header ();
	
	$args = array( 'numberposts' => 10, 'category_name' => 'article' );
	$posts = get_posts( $args );
?>
<main class="home-page">
      <section
        class="
          banner-with-text
          u-section-padding u-first-section-page u-section-space-bottom
          home-banner-with-text-1
        "
        data-aos="fade-up"
      >
        <h1 class="u-heading-1 title-left-particle">
          A brighter livelihood for you and your family.
        </h1>
       <section class="video-thumbnail img-wrap" id="video-thumbnail">
            <div class="video-thumbnail-wrap">
                <img src="<?= FVN_THEME_URL ?>assets/images/banner1.png" alt="image">
                <div class="video-play-button" onclick="onOpenModal(this.dataset.link)" data-link="https://www.youtube.com/embed/vmtumt8cv8c">
                    <img src="<?= FVN_THEME_URL ?>assets/particles/play.svg" alt="play">
                </div>
            </div>
        </section>
       
      </section>

      <section class="description" data-aos="fade-up">
        <div class="description-content">
          We’re experts at creating a <u>wealth strategy</u> and on-going
          <u>management plan</u> that responds to your current situation
          and reflects what a fulfilling future looks like to you. Delivered
          with the uttermost transparency, from day uno.
        </div>
      </section>

      <section
        class="article-with-img-text u-section-padding u-section-space-verticle"
        data-aos="fade-up"
      >
        <figure class="img-wrap">
          <img src="<?= FVN_THEME_URL ?>assets/images/home_a_warm_out_look.png" alt="" />
        </figure>
        <div class="second-column">
          <article class="content-article">
            <h2 class="u-heading-3">a warm outlook</h2>
            <p class="content">
              We see our relationship as a union of ambition. Your lens pictures
              your aspirational lifestyle, while ours visualises the best way to
              make it a reality.
            </p>
            <div class="bottom">
              <button class="u-button u-button-primary">
                <a href="#footer">Let’s chat</a>
              </button>
            </div>
          </article>
        </div>
      </section>

      <section class="title-center home-title-get-ready" data-aos="fade-up">
        <h2 class="u-heading-2 title-main">
          We’re excited to begin your wealth journey,whenever you’re ready.
        </h2>
      </section>

      <section
        class="
          article-with-img-text
          revert
          u-section-padding u-section-space-verticle
        "
        data-aos="fade-up"
      >
        <figure class="img-wrap">
          <img src="<?= FVN_THEME_URL ?>assets/images/home_before_we_meet.png" alt="" />
        </figure>
        <div class="second-column">
          <article class="content-article">
            <h2 class="u-heading-3">BEFORE WE MEET</h2>
            <p class="content">
              Ask yourself what’s really important to you and your family. We
              look forward to chatting about how we can build your financial
              future around your answer.
            </p>
            <div class="bottom">
              <button class="u-button u-button-primary">
                <a href="/approach">What happens next?</a>
              </button>
            </div>
          </article>
        </div>
      </section>

      <section class="testimonial-item" data-aos="fade-up">
        <div class="content"  data-aos="fade-up">
          <p>
            Vostro really took the time to get to know us and understand our
            values and goals. Now we have a financial strategy has given us
            confidence in our long term direction and the peace of mind.
          </p>
          <address class="author">Jim & Pam</address>
        </div>
      </section>

      <section class="accreditation u-border-bottom" data-aos="fade-up">
        <h3 class="u-heading-3">OUR AccReditation</h3>
        <ul class="items">
          <li class="item">
            <img src="<?= FVN_THEME_URL ?>assets/images/accreditation_1.png" alt="" />
          </li>
          <li class="item">
            <img src="<?= FVN_THEME_URL ?>assets/images/accreditation_2.png" alt="" />
          </li>
          <li class="item">
            <img src="<?= FVN_THEME_URL ?>assets/images/accreditation_3.png" alt="" />
          </li>
        </ul>
      </section>

      <section
        class="
          article-with-img-text
          u-section-padding u-border-bottom u-section-space-verticle
        "
        data-aos="fade-up"
      >
        <figure class="img-wrap">
          <img src="<?= FVN_THEME_URL ?>assets/images/home_meet_our_team.png" alt="" />
        </figure>
        <div class="second-column">
          <article class="content-article">
            <h2 class="u-heading-3">MEET OUR TEAM</h2>
            <p class="content">
              We go about our work with minimum fuss, but with the uttermost
              focus on making a brighter future for you and your family. That’s
              our sincere promise to you.
            </p>
            <div class="bottom">
              <button class="u-button u-button-primary">
                <a href="/about">Learn more</a>
              </button>
            </div>
          </article>
        </div>
      </section>

      <section class="partners-slider u-border-bottom" data-aos="fade-up">
        <h3 class="u-heading-3">OUR PARTNERS</h3>
        <div class="partners-slider-content">
          <ul class="items">
            <div class="column">
              <li class="item">
                <img src="<?= FVN_THEME_URL ?>assets/images/partner_1.png" alt="" />
              </li>
              <li class="item">
                <img src="<?= FVN_THEME_URL ?>assets/images/partner_2.png" alt="" />
              </li>
              <li class="item">
                <img src="<?= FVN_THEME_URL ?>assets/images/partner_3.png" alt="" />
              </li>
            </div>
            <div class="column">
              <li class="item">
                <img src="<?= FVN_THEME_URL ?>assets/images/partner_4.png" alt="" />
              </li>
              <li class="item">
                <img src="<?= FVN_THEME_URL ?>assets/images/partner_5.png" alt="" />
              </li>
              <li class="item">
                <img src="<?= FVN_THEME_URL ?>assets/images/partner_6.png" alt="" />
              </li>
            </div>
          </ul>
        </div>
      </section>

      <div class="blogs u-section-space-verticle">
        <section class="title-center" data-aos="fade-up">
          <h2 class="u-heading-2 title-main">Advice to help you get ahead</h2>
        </section>

        <section class="tag-buttons-list" data-aos="fade-up">
          <div class="tag-buttons-list-warpper">
            <div class="tag-buttons-list-item">LinkedIn</div>
            <div class="tag-buttons-list-item">Facebook</div>
            <div class="tag-buttons-list-item">Blog</div>
          </div>
        </section>
		
		
        <section class="blogs-list-wrap">
          <ul class="blogs-list">
           <?= do_shortcode('[article_list search="" page="0" raw="1" per_page="8"]')?>
          </ul>
        </section>
      </div>

      <section class="title-center u-section-space-bottom" data-aos="fade-up">
        <h2 class="u-heading-2 title-main">
          Our focus is TO influencE a brighter livelihood for you and your
          family.
        </h2>
      </section>
	</main>
	<section class="modal-video" id="video-modal">
		<div class="modal-content" id="modal-content">
		<iframe id="iframe-video-modal" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<span class="close">&times;</span>
		</section>
<script src="<?= FVN_THEME_URL ?>js/partner-slider.js"></script>
<script src="<?= FVN_THEME_URL ?>js/modal-video.js"></script>
<?php
	get_footer();
