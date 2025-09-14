<?php
/*
Template Name: Service Page
*/

get_header(); // Include header.php
?>

<!-- Service Section Start -- -->
<?php
$service_box_group = get_field('service_box_meta');

if ( ! empty( $service_box_group ) ):

    $section_title = $service_box_group['section_title_'] ?? '';
    $sub_title = $service_box_group['section_sub_title'] ?? '';
    $service_boxes = $service_box_group['single_service_box'] ?? [];

    ?>
    <div class="service-page section-padding">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="col-lg-7 offset-lg-3">
                    <div class="section-title">
                        <?php if ( ! empty( $section_title ) ): ?>
                            <h3><?php echo esc_html( $section_title ); ?></h3>
                        <?php endif; ?>

                        <?php if ( ! empty( $sub_title ) ): ?>
                            <p><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Service Boxes -->
            <?php if ( ! empty( $service_boxes ) ): ?>
                <div class="section-box-wraper">
                    <div class="row">
                        <?php foreach ( $service_boxes as $box ): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="single-service-box">
                                    <?php if ( ! empty( $box['icon_image'] ) && is_array($box['icon_image']) ): ?>
                                        <div class="icon">
                                            <img src="<?php echo esc_url( $box['icon_image']['url'] ); ?>" alt="<?php echo esc_attr( $box['icon_image']['alt'] ); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $box['title'] ) ): ?>
                                        <div class="title">
                                            <h4><?php echo esc_html( $box['title'] ); ?></h4>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $box['service_discription'] ) ): ?>
                                        <div class="content">
                                            <p><?php echo esc_html( $box['service_discription'] ); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<!-- Service Section End -->

<!-- Testimonial Section Start -->
<div class="testimonial-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-3">
                <div class="section-title">
                    <h3>What Our Clients Say</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="single-testimonial-box">
                    <p>"Great service and support! Highly recommend."</p>
                    <h5>- John Doe</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="single-testimonial-box">
                    <p>"Professional and efficient. Will use again."</p>
                    <h5>- Jane Smith</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="single-testimonial-box">
                    <p>"Exceeded my expectations in every way."</p>
                    <h5>- Mike Johnson</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Section End -->


<?php get_footer(); // Include footer.php ?>