
(function() {
    'use strict';

    // FAQ Accordion Functionality
    function initFAQ() {
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            if (question) {
                question.addEventListener('click', function() {
                    const isActive = item.classList.contains('active');
                    
                    // Close all FAQ items
                    faqItems.forEach(faqItem => {
                        faqItem.classList.remove('active');
                    });
                    
                    // Open clicked item if it wasn't active
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            }
        });
    }

    // Dynamic API Content Loading
    let allPosts = [];
    let currentStartIndex = 0;
    
    async function loadArticles() {
        const container = document.getElementById('articles-container');
        const apiUrl = agencyData?.apiUrl || 'https://jsonplaceholder.typicode.com/posts';
        
        if (!container) return;
        
        // Show loading state
        container.innerHTML = '<div class="loading-state">Loading articles...</div>';
        
        try {
            // Fetch all posts if not already loaded
            if (allPosts.length === 0) {
                const response = await fetch(apiUrl);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                allPosts = await response.json();
            }
            
            if (allPosts.length === 0) {
                container.innerHTML = '<div class="error-state">No articles found.</div>';
                return;
            }
            
            // Display 5 items starting from current index (for reload, show different articles)
            const articlesToShow = allPosts.slice(currentStartIndex, currentStartIndex + 5);
            
            // If we've reached the end, start from beginning
            if (articlesToShow.length < 5) {
                currentStartIndex = 0;
                const remaining = allPosts.slice(0, 5 - articlesToShow.length);
                articlesToShow.push(...remaining);
            }
            
            // Render articles
            let html = '<div class="articles-grid">';
            
            articlesToShow.forEach(post => {
                // Get excerpt (first 80-100 characters)
                const excerpt = post.body.substring(0, 90).trim() + '...';
                
                html += `
                    <div class="article-card">
                        <h3>${escapeHtml(post.title)}</h3>
                        <p>${escapeHtml(excerpt)}</p>
                    </div>
                `;
            });
            
            html += '</div>';
            container.innerHTML = html;
            
            // Update index for next reload (cycle through articles)
            currentStartIndex = (currentStartIndex + 5) % allPosts.length;
            
        } catch (error) {
            console.error('Error loading articles:', error);
            container.innerHTML = `
                <div class="error-state">
                    <p>Failed to load articles. Please try again later.</p>
                    <p><small>Error: ${escapeHtml(error.message)}</small></p>
                </div>
            `;
        }
    }

    // Reload button functionality
    function initReloadButton() {
        const reloadButton = document.getElementById('reload-articles');
        
        if (reloadButton) {
            reloadButton.addEventListener('click', function() {
                loadArticles();
            });
        }
    }

    // Helper function to escape HTML
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Booking Form Modal Functionality
    function initBookingModal() {
        const ctaButtons = document.querySelectorAll('.cta-button');
        const modal = document.getElementById('booking-modal');
        const closeModal = document.querySelector('.modal-close');
        const bookingForm = document.getElementById('booking-form');
        const dateInput = document.getElementById('booking-date');
        
        // Set minimum date to today
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            dateInput.min = today;
        }
        
        // Open modal - Attach to all CTA buttons
        if (ctaButtons.length > 0 && modal) {
            ctaButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });
        }
        
        // Close modal
        if (closeModal && modal) {
            closeModal.addEventListener('click', function() {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
        
        // Close on backdrop click
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        }
        
        // Handle form submission
        if (bookingForm) {
            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                const formData = new FormData(bookingForm);
                const data = Object.fromEntries(formData);
                
                // Simple validation
                if (!data.name || !data.email || !data.phone || !data.booking_date || !data.booking_time) {
                    alert('Please fill in all required fields.');
                    return;
                }
                
                // Show success message (in production, this would send to server)
                alert(`Thank you ${data.name}! Your consultation request for ${data.booking_date} at ${data.booking_time} has been submitted. We will contact you soon.`);
                
                // Reset form and close modal
                bookingForm.reset();
                modal.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
    }

    // Mobile Menu Functionality
    function initMobileMenu() {
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        const mainNav = document.querySelector('.main-navigation');
        const navLinks = document.querySelectorAll('.main-navigation a');
        
        if (mobileToggle && mainNav) {
            mobileToggle.addEventListener('click', function() {
                mobileToggle.classList.toggle('active');
                mainNav.classList.toggle('active');
            });
            
            // Close menu when clicking a link
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileToggle.classList.remove('active');
                    mainNav.classList.remove('active');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!mainNav.contains(e.target) && !mobileToggle.contains(e.target) && mainNav.classList.contains('active')) {
                    mobileToggle.classList.remove('active');
                    mainNav.classList.remove('active');
                }
            });
        }
    }

    // Initialize when DOM is ready
    function init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                initFAQ();
                loadArticles();
                initReloadButton();
                initBookingModal();
                initMobileMenu();
            });
        } else {
            // DOM already loaded
            initFAQ();
            loadArticles();
            initReloadButton();
            initBookingModal();
            initMobileMenu();
        }
    }

    // Start initialization
    init();

})();

