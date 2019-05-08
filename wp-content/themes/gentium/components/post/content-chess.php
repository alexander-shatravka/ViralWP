<?php
/**
 * Template part for displaying posts.
 *
 * Chess Style
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gentium
 */

$excerpt_lenghth = get_theme_mod('post_excerpt_length',30);
?>
<div class="chess-item item uk-width-1-3@l uk-width-1-3@m uk-animation-slide-bottom">
    <article class="post type-post">
        <div class="outer uk-card">
            <div class="featured-image uk-card-media-right uk-cover-container chess">
                <div class="image pr__image__cover pr__ratio__square" data-src="<?php the_post_thumbnail_url('pixe-grid-image');?>" data-uk-img></div>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="link"></a>
            </div>
            <div class="inner uk-card-body chess">
                <div class="top">
                    <span class="category"><?php the_category(', '); ?></span>
                    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                    <p><?php echo pixe_words_limit(get_the_excerpt(), $excerpt_lenghth); ?></p>
                </div>
                <div class="bottom">
                    <ul class="meta">
                        <li class="meta-date"><?php echo get_the_date(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </article>
</div>