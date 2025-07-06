(function ($) {
    /**
     * Mobile Menu Functionality
     * Handles mobile menu open/close and sub-menu interactions
     */
    function initMobileMenu() {
        // Open menu
        $('#touch-menu').click(function () {
            $('body').addClass('active-menu');
        });

        // Close menu
        $('.line-dark, #close-menu').click(function () {
            $('body').removeClass('active-menu');
        });

        // Add dropdown arrows and handle sub-menu toggle
        $("#menu-mobile .menu li.menu-item-has-children> a").after('<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>');
        
        $('#menu-mobile .menu li.menu-item-has-children svg').click(function () {
            $(this).parent('li').children('ul').stop(0).slideToggle(300);
            $(this).parent('li').toggleClass('re-arrow');
        });
    }

    /**
     * UI Enhancement Functions
     * Handles various UI improvements and styling
     */
    function enhanceUI() {
        // Initialize select2
        $('.select2').select2({});

        // Add classes to tables
        $('table').addClass('table table-bordered').wrap('<div class="table-responsive"></div>');

        // Add classes to WooCommerce elements
        $('.woocommerce-product-details__short-description').addClass('content-post clearfix');
        $('.page-description').addClass('term-description');
        $('.term-description').addClass('content-post clearfix');
        $('.woocommerce-MyAccount-content').addClass('content-post clearfix');

        // Account page modifications
        $('.account-body #customer_login')
            .removeClass('u-columns col2-set')
            .children('.u-column1').removeClass('col-1')
            .end()
            .children('.u-column2').removeClass('col-2');

        $('.account-body .box-login .lost_password')
            .insertAfter('.account-body .box-login .woocommerce-form-login__rememberme');

        // Account toggle handlers
        $('.account-body .box-login .note .note1 a').click(function () {
            $('.account-body .box-login').addClass('active');
        });
        $('.account-body .box-login .note .note2 a').click(function () {
            $('.account-body .box-login').removeClass('active');
        });
    }

    /**
     * Scroll-related Functions
     * Handles back-to-top, fixed header, and smooth scroll
     */
    function initScrollFunctions() {
        // Back to top functionality
        $("#back-top").hide();
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        $('#back-top').click(function () {
            $('body,html').animate({scrollTop: 0}, 800);
            return false;
        });

        // Fixed header on scroll
        var navfixed = $(".head");
        $(window).scroll(function () {
            navfixed.toggleClass("navbar-fixed-top", $(this).scrollTop() > 10);
        });

        // Menu fixed functionality
        const mainMenu = document.querySelector('#menu-main-menu');
        const header = document.querySelector('#header');
        const threshold = mainMenu.offsetTop + mainMenu.offsetHeight;

        window.addEventListener('scroll', () => {
            header.classList.toggle('fixed', window.scrollY > threshold);
        });

        // Smooth scroll for anchor links
        document.addEventListener('click', function (event) {
            if (event.target.tagName === 'A' && event.target.getAttribute('href')?.startsWith('#')) {
                event.preventDefault();
                const targetId = event.target.getAttribute('href').slice(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({behavior: 'smooth'});
                }
            }
        });
    }

    /**
     * Slider Initializations
     * Initializes various Swiper sliders
     */
    function initSliders() {
        // Banner slider
        new Swiper(".swiper-banner-home", {
          loop: true,
          speed: 1000,
          slidesPerView: 1,
          spaceBetween: 30,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });

        // Testimonials slider
        new Swiper(".swiper-testimonials", {
            loop: true,
            autoplay: {delay: 6000},
            speed: 500,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {slidesPerView: 2, spaceBetween: 20},
                575: {slidesPerView: 2, spaceBetween: 50},
                768: {slidesPerView: 3, spaceBetween: 80}
            },
        });

        // Posts slider
        new Swiper(".swiper-posts", {
            loop: true,
            autoplay: {delay: 6000},
            speed: 500,
            navigation: {
                nextEl: ".post-slider-next",
                prevEl: ".post-slider-prev",
            },
            breakpoints: {
                0: {slidesPerView: 2, spaceBetween: 20},
                575: {slidesPerView: 2, spaceBetween: 30},
                1199: {slidesPerView: 3, spaceBetween: 50}
            },
        });

        // Media slider
        new Swiper(".swiper-media", {
            loop: true,
            autoplay: {delay: 6000},
            speed: 500,
            navigation: {
                nextEl: ".image-slider-next",
                prevEl: ".image-slider-prev",
            },
            breakpoints: {
                0: {slidesPerView: 2, spaceBetween: 20},
                575: {slidesPerView: 2, spaceBetween: 50},
                992: {slidesPerView: 3, spaceBetween: 80}
            },
        });
    }

    /**
     * Contact Form 7 Ajax Handler
     * Manages loading state of contact form submit button
     */
    function initContactForm() {
        $('.wpcf7-submit').click(function () {
            const thisElement = $(this);
            const oldVal = thisElement.val();
            const textLoading = 'Đang xử lý ...';
            
            $('.cf7_submit .ajax-loader').remove();
            thisElement.val(textLoading);
            
            document.addEventListener('wpcf7submit', function () {
                thisElement.val(oldVal);
            }, false);
        });
    }

    /**
     * Quick Order Functionality
     * Handles calculations for order totals and shipping
     */
    function initQuickOrder() {
        document.addEventListener('DOMContentLoaded', function () {
            const qtyInputs = document.querySelectorAll('.qty-input');
            const tableBody = document.querySelector('tbody[data-shipping]');
            const shippingFeeCell = document.querySelector('.shipping-fee');
            const totalCell = document.querySelector('.total-realtime');

            const shippingFee = parseInt(tableBody.dataset.shipping) || 0;
            const freeThreshold = parseInt(tableBody.dataset.threshold) || 2000000;

            function updateAllTotals() {
                let total = 0;

                qtyInputs.forEach(input => {
                    const price = parseFloat(input.dataset.price);
                    const qty = parseInt(input.value) || 0;
                    const subtotal = price * qty;

                    const row = input.closest('tr');
                    const subtotalCell = row.querySelector('.subtotal-realtime');
                    subtotalCell.textContent = subtotal.toLocaleString('vi-VN') + 'đ';

                    total += subtotal;
                });

                let shippingCost = shippingFee;
                if (total >= freeThreshold) {
                    shippingCost = 0;
                    shippingFeeCell.textContent = "Miễn phí";
                } else {
                    shippingFeeCell.textContent = shippingFee.toLocaleString('vi-VN') + 'đ';
                }

                const grandTotal = total + shippingCost;
                totalCell.textContent = grandTotal.toLocaleString('vi-VN') + 'đ';
            }

            qtyInputs.forEach(input => {
                input.addEventListener('input', updateAllTotals);
            });

            updateAllTotals();
        });
    }

    /**
     * Video Modal Functionality
     * Handles video modal functionality for Bootstrap 5.2.2
     * Fixed: Modal instance conflicts after closing
     */
    function initVideoModal() {
        let currentModalInstance = null; // Track current modal instance
        
        function showVideoModal(videoUrl) {
            console.log('Attempting to show video modal:', videoUrl);
            
            if (!videoUrl) {
                console.error('No video URL provided');
                return;
            }
            
            const modal = document.getElementById('videoModal');
            const iframe = modal ? modal.querySelector('iframe') : null;
            
            if (!modal || !iframe) {
                console.error('Video modal or iframe not found');
                return;
            }
            
            // Dispose any existing modal instance first
            if (currentModalInstance) {
                try {
                    currentModalInstance.dispose();
                    console.log('Previous modal instance disposed');
                } catch (error) {
                    console.warn('Error disposing previous modal:', error);
                }
                currentModalInstance = null;
            }
            
            // Reset modal state
            modal.classList.remove('show');
            modal.style.display = 'none';
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
            
            // Remove any existing backdrop
            const existingBackdrop = document.querySelector('.modal-backdrop');
            if (existingBackdrop) {
                existingBackdrop.remove();
            }
            
            // Set video URL
            iframe.src = videoUrl;
            console.log('Set iframe src:', videoUrl);
            
            // Wait a bit for cleanup, then show modal
            setTimeout(() => {
                // Try Bootstrap 5 API first
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    try {
                        currentModalInstance = new bootstrap.Modal(modal, {
                            backdrop: true,
                            keyboard: true,
                            focus: true
                        });
                        currentModalInstance.show();
                        console.log('Modal shown with Bootstrap 5 API');
                        return;
                    } catch (error) {
                        console.error('Bootstrap 5 Modal error:', error);
                        currentModalInstance = null;
                    }
                }
                
                // Fallback to jQuery if Bootstrap API fails
                if (typeof $ !== 'undefined' && $.fn.modal) {
                    try {
                        $(modal).modal('show');
                        console.log('Modal shown with jQuery/Bootstrap 4 fallback');
                        return;
                    } catch (error) {
                        console.error('jQuery Modal error:', error);
                    }
                }
                
                console.error('No working modal API found');
            }, 100);
        }
        
        function cleanupModal() {
            console.log('Cleaning up modal');
            const modal = document.getElementById('videoModal');
            const iframe = modal ? modal.querySelector('iframe') : null;
            
            // Stop video
            if (iframe) {
                iframe.src = '';
            }
            
            // Dispose modal instance
            if (currentModalInstance) {
                try {
                    currentModalInstance.dispose();
                    console.log('Modal instance disposed on cleanup');
                } catch (error) {
                    console.warn('Error disposing modal on cleanup:', error);
                }
                currentModalInstance = null;
            }
            
            // Ensure modal is properly hidden
            if (modal) {
                modal.classList.remove('show');
                modal.style.display = 'none';
                modal.setAttribute('aria-hidden', 'true');
            }
            
            // Clean up body classes and backdrop
            document.body.classList.remove('modal-open');
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.remove();
            }
        }
        
        // Wait for DOM and all scripts to load
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Video modal init - DOM ready');
            
            // Check Bootstrap availability
            if (typeof bootstrap !== 'undefined') {
                console.log('Bootstrap 5 object available');
            } else if (typeof $ !== 'undefined' && $.fn.modal) {
                console.log('jQuery Bootstrap available (fallback)');
            } else {
                console.warn('No Bootstrap modal API detected');
            }
        });
        
        // Use event delegation for dynamic content
        $(document).on('click', '.video-thumbnail', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const videoUrl = $(this).data('video') || $(this).attr('data-video');
            console.log('Video thumbnail clicked (jQuery):', videoUrl);
            showVideoModal(videoUrl);
        });
        
        // Also add vanilla JS event delegation as backup
        document.addEventListener('click', function(e) {
            const thumbnail = e.target.closest('.video-thumbnail');
            if (thumbnail) {
                e.preventDefault();
                e.stopPropagation();
                
                const videoUrl = thumbnail.getAttribute('data-video');
                console.log('Video thumbnail clicked (vanilla JS):', videoUrl);
                showVideoModal(videoUrl);
            }
        });
        
        // Modal close event handling
        const videoModal = document.getElementById('videoModal');
        if (videoModal) {
            // Bootstrap 5 events
            videoModal.addEventListener('hidden.bs.modal', function () {
                console.log('Modal closed (BS5), cleaning up');
                cleanupModal();
            });
            
            // Bootstrap 4/jQuery events fallback
            $(videoModal).on('hidden.bs.modal', function () {
                console.log('Modal closed (jQuery), cleaning up');
                cleanupModal();
            });
            
            // Handle ESC key and backdrop clicks
            videoModal.addEventListener('hide.bs.modal', function () {
                console.log('Modal hiding...');
            });
        }
    }

    // Initialize all functionality
    initMobileMenu();
    enhanceUI();
    initScrollFunctions();
    initSliders();
    initContactForm();
    initQuickOrder();
    initVideoModal();
})(jQuery);
