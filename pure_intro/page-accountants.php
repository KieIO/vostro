<?php
	get_header();
?>
<main class="accountant">
        <section class="banner-with-text u-first-section-page u-section-padding u-section-space-bottom page-banner-with-text-1"  data-aos="fade-up">
            <h1 class="title u-heading-1 title-left-particle">ACCOUNTING PARTNERS</h1>
            <figure class="img-wrap">
                <img src="<?= FVN_THEME_URL?>assets/images/Sieva_2.png" alt="">
            </figure>
        </section>

        <section class="description" data-aos="fade-up">
            <div class="description-content">
                We understand that <u>enjoying our work</u> is as much about the people we work with, as it is about the <u>difference we make to livelihoods.</u> 
            </div>
        </section>

        <section class="article-with-img-text u-first-section-page u-section-padding u-section-space-bottom" data-aos="fade-up">
            <section class="video-thumbnail">
                <div class="video-thumbnail-wrap">
                    <img src="<?= FVN_THEME_URL?>assets/images/pexels-anna-shvets-1.png" alt="image" />
                    <div class="video-play-button" onclick="onOpenModal(this.dataset.link)" data-link="https://www.youtube.com/embed/vmtumt8cv8c">
                    <img src="<?= FVN_THEME_URL?>assets/particles/play.svg" alt="play" />
                    </div>
                </div>
            </section>
            
            <div class="second-column">
                <article class="content-article">
                    <h2 class="u-heading-3">A COMMON VISION</h2>
                    <p class="content">We see our clients as part of our extended family, and so we sincerely advise them like we would with our own. That’s why we like to be discerning about who we partner with. If you share in this level of client care and you’d like to strengthen your service offering, then it only makes sense for us to ask - ‘care for a coffee’?</p>
                    <div class="bottom">
                        <button class="u-button u-button-primary" onclick="scrollToFooter()">Let’s Chat</button>
                    </div>
                </article>
            </div>
        </section>
        <section class="title-center u-section-space-bottom" data-aos="fade-up">
            <h2 class="u-heading-2 title-main">
                Our partnerships prosper because:
            </h2>
        </section>
        <section class="check-list u-section-space-bottom" data-aos="fade-up">
            <div class="check-list-wrapper">
                <span class="check-list-item">
                    We provide wealth training for your team
                </span>
                <span class="check-list-item">
                    Access our content library to share with your clients
                </span>
                <span class="check-list-item">
                    Expand your services and your team
                </span>
            </div>
        </section>
	</main>
	<section class="modal-video" id="video-modal">
      <div class="modal-content" id="modal-content">
          <iframe id="iframe-video-modal" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <span class="close">&times;</span>
  </section>
	<script src="<?= FVN_THEME_URL?>js/modal-video.js"></script>
	<script src="<?= FVN_THEME_URL?>js/scroll-to-footer.js"></script>
<?php
	get_footer();
