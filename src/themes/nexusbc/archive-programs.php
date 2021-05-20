<?php
get_header();
?>
archive-programs.php

<?php

$programs = new WP_Query(array(
    'posts_per_pagee' => -1,
    'post_type' => 'programs'
));

while($programs->have_posts()) {
$programs->the_post(); ?>
    <h1><?php the_title(); ?></h1>
<?php }

?>

<?php get_footer(); ?>
