<?php

/**
 * Lookbook Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'lookbook-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lookbook';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Build unique tag list based on selected categories.
if( have_rows('lookbook') ):
    $categories = [];
    while( have_rows('lookbook') ) : the_row();
        $categories = array_merge($categories,get_sub_field('category'));
    endwhile; 
    $categories = array_unique($categories);
endif;

?>

<div id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">

    <div class="masonry">
        <div class="masonry__sizer"></div>
        <div class="masonry__item tags">
            <?php 
            foreach ($categories as $category) { 
                echo '<span class="' . $category . '">' . $category . ' </span>';
            } 
            ?>
            <span class="everything">Toon alles</a>
        </div>

        <?php 
        if( have_rows('lookbook') ):
            while( have_rows('lookbook') ) : the_row();

            $image = get_sub_field('image') ?: 295;
            $category = get_sub_field('category');
            $salon = get_sub_field('salon') ?: 'Naam Salon';
            $barber = get_sub_field('barber') ?: 'Naam kapper';

            ?>
            <div onclick="openModal();" class="masonry__item everything <?php if(!empty($category)) { foreach ($category as $categor) { echo $categor .' '; } }?>">
                <?php
                // Echo and set size for images in the masonry grid
                echo wp_get_attachment_image( $image, 'large' );  ?>
                <div class="masonry__info"><?= $salon ?> | <?= $barber ?></div>
            </div>

            <?php 
            endwhile;
        endif;
        ?>
    </div>

    <div id="lookbookModal">
        <span class="lookbookModal__close" onclick="closeModal()">&times;</span>
        <div class="lookbookModal__box">
            <?php 
            if( have_rows('lookbook') ):
                while( have_rows('lookbook') ) : the_row();

                $image = get_sub_field('image');
                $wysiwyg = get_sub_field('wysiwyg') ?: 'Content';
                ?>
                    <div class="lookbookModal__slides">
                        <div class="lookbookModal__content">
                            <div class="lookbookModal__img">
                                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                            </div>
                            <div class="lookbookModal__wysiwyg">
                                <?php echo $wysiwyg ?>
                            </div>
                        </div>
                    </div>
                <?php 
                endwhile;
            endif; 
            ?>    

            <a class="lookbookModal__prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="lookbookModal__next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
</div>