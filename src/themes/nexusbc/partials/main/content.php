<div class="col-lg-7 col-xl-8">
    <div class="pr-xl-2">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>


        <?php if (!is_tree([48, 42])) : ?>
        <div class="py-1 mt-1">
            <a href="javascript:history.go(-1)" class="btn btn-primary">Back</a>
        </div>
        <?php endif; ?>


    </div><!-- pr -->
</div><!-- col-->