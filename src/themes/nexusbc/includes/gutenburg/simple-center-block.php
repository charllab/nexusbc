<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'center-layout-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
?>

<?php if (is_admin()): ?>

    <div class="components-placeholder wp-testimonial-carousel">
        <div class="components-placeholder__label">
            <span class="editor-block-icon block-editor-block-icon has-colors">
                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img"
                     aria-hidden="true" focusable="false"><path d="M0,0h24v24H0V0z" fill="none"></path><path
                        d="M19,4H5C3.89,4,3,4.9,3,6v12c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V6C21,4.9,20.11,4,19,4z M19,18H5V8h14V18z"></path></svg></span>Simple
            Center Layout Block
        </div>
    </div>

<?php else: ?>

    <section class="bg-soft my-150" style="padding-bottom: 1px;">
        <div class="pt-1 px-1 px-lg-2 page-indent-box">
            <?php the_field('block_content'); ?>
        </div>

    </section>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>