<?php
/**
 * Agency Sales Coaching Theme Functions
 *
 * @package Agency_Sales_Coaching
 */

// Theme Setup
function agency_sales_coaching_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'agency-sales-coaching'),
    ));
}
add_action('after_setup_theme', 'agency_sales_coaching_setup');

// Enqueue Scripts and Styles
function agency_sales_coaching_scripts() {
    // Enqueue styles
    wp_enqueue_style('agency-sales-coaching-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue JavaScript
    wp_enqueue_script('agency-sales-coaching-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
    
    // Localize script for API URL
    wp_localize_script('agency-sales-coaching-script', 'agencyData', array(
        'apiUrl' => 'https://jsonplaceholder.typicode.com/posts',
    ));
}
add_action('wp_enqueue_scripts', 'agency_sales_coaching_scripts');

// Add SEO Meta Tags
function agency_sales_coaching_seo_meta() {
    $description = 'Professional agency sales coaching services to help your team achieve better results. Expert B2B sales coaching for agencies.';
    $keywords = 'agency sales coaching, sales coaching for agencies, B2B sales coach';
    
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";
    echo '<meta name="author" content="Agency Sales Coaching">' . "\n";
    
    // Open Graph Meta Tags
    echo '<meta property="og:title" content="Agency Sales Coaching - Expert Sales Training">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    
    // Twitter Card Meta Tags
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="Agency Sales Coaching - Expert Sales Training">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
}
add_action('wp_head', 'agency_sales_coaching_seo_meta');

// Add Schema.org JSON-LD Structured Data
function agency_sales_coaching_schema() {
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'Agency Sales Coaching',
        'description' => 'Professional agency sales coaching services to help your team achieve better results.',
        'url' => home_url(),
        'serviceType' => 'Sales Coaching',
        'areaServed' => 'Worldwide',
    );
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'agency_sales_coaching_schema');

// Shortcode for Services Section
function agency_services_shortcode($atts) {
    $services = array(
        array(
            'title' => 'Sales Strategy Development',
            'description' => 'We help agencies develop comprehensive sales strategies tailored to their unique market position and target audience.',
        ),
        array(
            'title' => 'Team Training & Coaching',
            'description' => 'Our expert coaches provide hands-on training to improve your sales team\'s performance and close more deals.',
        ),
        array(
            'title' => 'B2B Sales Optimization',
            'description' => 'Specialized coaching for B2B sales teams to enhance their approach and maximize conversion rates.',
        ),
    );
    
    ob_start();
    ?>
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <div class="services-grid">
                <?php foreach ($services as $service) : ?>
                    <div class="service-card">
                        <h3><?php echo esc_html($service['title']); ?></h3>
                        <p><?php echo esc_html($service['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('agency_services', 'agency_services_shortcode');

// Shortcode for Dynamic Content Section
function agency_dynamic_content_shortcode() {
    ob_start();
    ?>
    <section class="dynamic-content-section">
        <div class="container">
            <h2 class="section-title">Latest Insights</h2>
            <div id="articles-container">
                <div class="loading-state">Loading articles...</div>
            </div>
            <button class="reload-button" id="reload-articles">Reload Articles</button>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('agency_articles', 'agency_dynamic_content_shortcode');

// Shortcode for FAQ Section
function agency_faq_shortcode($atts) {
    $faqs = array(
        array(
            'question' => 'What is agency sales coaching?',
            'answer' => 'Agency sales coaching is a specialized service that helps sales teams within agencies improve their performance, develop better strategies, and achieve higher conversion rates through expert guidance and training.',
        ),
        array(
            'question' => 'How can sales coaching benefit my agency?',
            'answer' => 'Sales coaching can significantly improve your agency\'s revenue by enhancing your team\'s skills, refining sales processes, and providing strategic insights that lead to better client relationships and increased deal closures.',
        ),
        array(
            'question' => 'What makes your B2B sales coaching different?',
            'answer' => 'Our B2B sales coaching focuses on the unique challenges of agency-to-business sales, providing tailored strategies, proven methodologies, and hands-on support that addresses the specific needs of agency sales teams.',
        ),
        array(
            'question' => 'How long does it take to see results?',
            'answer' => 'While results vary depending on your team\'s current performance and commitment, most agencies see noticeable improvements within 30-60 days of implementing our coaching strategies and training programs.',
        ),
    );
    
    ob_start();
    ?>
    <section class="faq-section">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="faq-container">
                <?php foreach ($faqs as $index => $faq) : ?>
                    <div class="faq-item" data-index="<?php echo $index; ?>">
                        <button class="faq-question"><?php echo esc_html($faq['question']); ?></button>
                        <div class="faq-answer">
                            <p><?php echo esc_html($faq['answer']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('agency_faq', 'agency_faq_shortcode');

// Filter to modify page title for SEO
function agency_sales_coaching_title($title) {
    if (is_front_page()) {
        return 'Agency Sales Coaching - Expert Sales Training for Agencies';
    }
    return $title;
}
add_filter('wp_title', 'agency_sales_coaching_title', 10, 1);
add_filter('document_title_parts', function($title) {
    if (is_front_page()) {
        $title['title'] = 'Agency Sales Coaching';
        $title['tagline'] = 'Expert Sales Training for Agencies';
    }
    return $title;
});

// Add body class for styling hooks
function agency_sales_coaching_body_class($classes) {
    $classes[] = 'agency-sales-coaching';
    return $classes;
}
add_filter('body_class', 'agency_sales_coaching_body_class');

// Default menu fallback
function agency_default_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="#home">Home</a></li>';
    echo '<li><a href="#services">Services</a></li>';
    echo '<li><a href="#about">About</a></li>';
    echo '<li><a href="#contact">Contact</a></li>';
    echo '</ul>';
}

// Add booking form modal to footer
function agency_booking_modal() {
    ?>
    <div id="booking-modal" class="booking-modal">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h2>Book a Free Consultation</h2>
            <p class="modal-subtitle">Fill out the form below and we'll get back to you within 24 hours.</p>
            <form id="booking-form" class="booking-form">
                <div class="form-group">
                    <label for="name">Full Name <span class="required">*</span></label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group-row">
                    <div class="form-group half-width">
                        <label for="booking-date">Preferred Date <span class="required">*</span></label>
                        <input type="date" id="booking-date" name="booking_date" required>
                    </div>
                    <div class="form-group half-width">
                        <label for="booking-time">Time Slot <span class="required">*</span></label>
                        <select id="booking-time" name="booking_time" required>
                            <option value="">Select a time</option>
                            <option value="09:00">9:00 AM - 10:00 AM</option>
                            <option value="10:00">10:00 AM - 11:00 AM</option>
                            <option value="11:00">11:00 AM - 12:00 PM</option>
                            <option value="13:00">1:00 PM - 2:00 PM</option>
                            <option value="14:00">2:00 PM - 3:00 PM</option>
                            <option value="15:00">3:00 PM - 4:00 PM</option>
                            <option value="16:00">4:00 PM - 5:00 PM</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" id="company" name="company">
                </div>
                <div class="form-group">
                    <label for="message">Tell us about your needs</label>
                    <textarea id="message" name="message" rows="4"></textarea>
                </div>
                <button type="submit" class="submit-button">Submit Request</button>
            </form>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'agency_booking_modal');

