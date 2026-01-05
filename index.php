<?php
/**
 * Main Template File
 *
 * @package Agency_Sales_Coaching
 */

get_header();
?>

<main id="main-content">
    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Agency Sales Coaching</h1>
                <p>Transform your agency's sales performance with expert coaching and proven strategies. We help B2B sales teams achieve exceptional results through personalized training and strategic guidance.</p>
                <a href="#contact" class="cta-button"><span>Book a Free Consultation</span></a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services">
        <?php echo do_shortcode('[agency_services]'); ?>
    </section>

    <!-- Dynamic Content Section -->
    <?php echo do_shortcode('[agency_articles]'); ?>

    <!-- FAQ Section -->
    <?php echo do_shortcode('[agency_faq]'); ?>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>We are a team of experienced sales coaches dedicated to helping agencies achieve their sales goals. With over 10 years of combined experience in B2B sales and agency management, we understand the unique challenges agencies face.</p>
                    <p>Our proven methodologies and personalized approach have helped hundreds of agencies increase their revenue, improve team performance, and build stronger client relationships.</p>
                </div>
                <div class="about-stats">
                    <div class="stat-item">
                        <h3>500+</h3>
                        <p>Agencies Trained</p>
                    </div>
                    <div class="stat-item">
                        <h3>95%</h3>
                        <p>Success Rate</p>
                    </div>
                    <div class="stat-item">
                        <h3>10+</h3>
                        <p>Years Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title">Get in Touch</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><strong>Email:</strong> info@agencysalescoaching.com</p>
                    <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                    <p><strong>Address:</strong> 123 Business Street, New York, NY 10001</p>
                </div>
                <div class="contact-cta">
                    <h3>Ready to Transform Your Sales Team?</h3>
                    <p>Book a free consultation call with our experts today.</p>
                    <a href="#contact" class="cta-button">Schedule a Call</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>

