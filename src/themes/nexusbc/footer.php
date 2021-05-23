<footer>
    <section class="section section--sm text-md text-muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p>&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?></p>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <p>Designed, Developed and Hosted by <a href="https://sproing.ca" target="_blank">Sproing&nbsp;Creative</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</footer>

<!--allow custom donation embedding for post-->
<?php if( get_field('post_script')) {the_field('post_script');} ?>

<?php wp_footer(); ?>

</body>

</html>