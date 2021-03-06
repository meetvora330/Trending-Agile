<?php /* Template Name: certificate pages */



get_header();

?>





<!--Inner Banner Start-->

<?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

<section class="inner-banner" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); ">

    <div class="container">

        <h1><?php echo get_the_title(); ?></h1>

    </div>

</section>



<!--Inner Banner End-->



<!--content start-->



<section class="inner-content certificate-content">

    <div class="container">
		<p><?php echo get_field("cl_description",$post->ID); ?></p>
        <div class="courses-content">
			
            <div class="row">

                <?php

                $loop = new WP_Query(array('post_type' => 'certified','posts_per_page' => -1));

                if ($loop->have_posts()) :

                    while ($loop->have_posts()) : $loop->the_post();

                        ?>

                        <div class="col-lg-4 col-md-6">

                            <div class="course_sep course_sep_index">

                                <?php

                                $image = get_field('listing_image', get_the_ID());

                                $size = 'full'; // (thumbnail, medium, large, full or custom size)

                                if( isset($image['url']) && $image['url']!='' ) {

                                    ?>

                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo$image['url']; ?>" alt=""></a>    

                                    <?php

                                }

                                ?>

                                <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<a href="<?php the_permalink(); ?>" class="box-link"></a>

                            </div>

                        </div>

                    <?php

                    endwhile;



                endif;

                wp_reset_postdata();

                ?>
 

            </div>
            
            <div class="row list-content">
                
                <div class="col-lg-8">
                    <?php
                    $img  = get_field("cl_additional_image",$post->ID);
                    ?>
                    <img src="<?php echo $img['url']; ?>"/>
                </div>
                <div class="col-lg-4 route-detail">
                    <p>
                        <?php echo get_the_content($post->ID); ?>
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>



<!--content end-->





<?php get_footer(); ?>

