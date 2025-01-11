<?php
$args = array(
    'category_name' => 'knowledge', 
    'posts_per_page' => 12, 
);
$query = new WP_Query($args);

if ($query->have_posts()) : 
?>
<div class="custom-slider">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="slider-item">
            <?php if (has_post_thumbnail()) : ?>
                <div class="slider-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
        </div>
    <?php endwhile; ?>
</div>
<?php
endif;
wp_reset_postdata();
?>


<style>


.slider-item {
    background-color: #f9f9f9;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    text-align: center;
    margin: 10px;
}
.slider-item h3 {
    font-size: 18px;
    margin: 0 0 10px;
}
.slider-item p {
    font-size: 14px;
    color: #666;
}


.slider-item{
	min-height:450px !important;
	max-height:450px;
	display:flex !important;
	align-items:center;
	flex-direction:column;
}



.custom-slider {
    max-width: 1280px; 
    box-sizing: border-box;
	margin-bottom:20%;
}

.custom-slider .slick-list {
    overflow: hidden; 
	display:block !important;
}

@media only screen and (max-width:700px){
	.custom-slider {
	margin-bottom:200px;
}
}

    </style>



<script>

jQuery(document).ready(function ($) {
    $('.custom-slider').slick({
        slidesToShow: 4, 
        slidesToScroll: 5,
        autoplay: true, 
        autoplaySpeed: 3000, 
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });
});



    </script>
    