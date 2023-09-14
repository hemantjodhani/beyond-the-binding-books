<?php include 'includes/db.php' ?>
<?php include 'includes/functions.php' ?>
<?php include 'includes/header.php' ?>
        <section class="section-2">
            <div class="hero">
                <div class="hero-content-left">
                    <h1 class="hero-heading">New Releases This Week</h1>
                    <p class="hero-content-para">It's time to update your reading list with some of the latest and
                        greatest releases in the literary world. From heart-pumping thrillers to captivating memoirs,
                        this week's new releases offer something for everyone</p>
                    <a href="#" class="subscribe-btn">Subscribe</a>
                </div>
                
                <div class="hero-content-right">
                    <img src="template-images/Animation.jpg">
                </div>

            </div>
        </section>
        <!-- Ending of Section 2-->


        <!-- Starting of section 4 -->

        <section class="all-books-here">
            <?php display_books(); ?>
        </section>
        <!-- Ending of section 4 -->

        <!-- Starting of section 5 -->
        <section class="section-5">
            <h1 class="news-section-heading">News</h1>

            <div class="news-wrap">
                <div class="news">
                    <div>
                        <h2 class="news-heading">The Books You Need to Read in 2023</h2>
                        <div class="news-bar"></div>
                        <p class="news-content">his is the blog we know you've all been waiting for. We present the top 10 titles for 2023 in fiction, non-fiction and children's books; a glorious mix of masterful storytelling, compelling subject matter and page-turning thrills...</p>
                    </div>
                    <div class="news-image">
                        <img src="template-images/Photo news.jpg">
                    </div>
                </div>

                <div class="news">
                    <div>
                        <h2 class="news-heading">February's Best Children's Books</h2>
                        <div class="news-bar"></div>
                        <p class="news-content">Some of the finest children's authors currently writing have books publishing this month, from Natasha Farrant to Elle McNicoll and from Tahereh Mafi to Harriet Muncaster. Across all areas and age ranges there are plenty of fantastic titles...</p>
                    </div>
                    <div class="news-image">
                        <img src="template-images/Photo news1.jpg">
                    </div>
                </div>

            </div>
        </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
    <!-- modal body  -->
    <?php include 'includes/modal.php' ?>
    <!-- End of modal body -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>