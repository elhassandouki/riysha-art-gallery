/**
 * Riysha Art Gallery - WordPress Theme JavaScript
 */

(function($) {
    'use strict';

    /**
     * Add to Cart Functionality
     */
    $(document).on('click', 'a.add_to_cart_button', function(e) {
        e.preventDefault();
        
        const $this = $(this);
        const $product = $this.closest('li.product');
        const productId = $product.attr('data-product-id');
        
        if (!productId) {
            // Fallback: get product ID from href
            const href = $this.attr('href');
            if (href && href.includes('product=')) {
                const productIdMatch = href.match(/product=(\d+)/);
                if (productIdMatch) {
                    const id = productIdMatch[1];
                    addToCart(id, 1);
                }
            }
        } else {
            addToCart(productId, 1);
        }
    });

    /**
     * Add to Cart via AJAX
     */
    function addToCart(productId, quantity) {
        $.ajax({
            type: 'POST',
            url: riysha.ajax_url,
            data: {
                action: 'riysha_add_to_cart',
                product_id: productId,
                quantity: quantity,
                nonce: riysha.nonce
            },
            success: function(response) {
                if (response.success) {
                    showNotification(response.data.message);
                    updateCartCount(response.data.cart_count);
                    
                    // Redirect to cart after 1.5 seconds
                    setTimeout(function() {
                        window.location.href = riysha.cart_url;
                    }, 1500);
                } else {
                    showNotification(response.data.message, 'error');
                }
            },
            error: function() {
                showNotification('حدث خطأ. حاول مرة أخرى', 'error');
            }
        });
    }

    /**
     * Show Notification
     */
    function showNotification(message, type = 'success') {
        const $notification = $('<div class="notification notification-' + type + '">' + message + '</div>');
        
        $('body').append($notification);
        
        $notification.css({
            'position': 'fixed',
            'top': '20px',
            'right': '20px',
            'background': type === 'error' ? '#e74c3c' : '#4CAF50',
            'color': 'white',
            'padding': '15px 20px',
            'border-radius': '4px',
            'z-index': '9999',
            'animation': 'slideIn 0.3s ease-in-out'
        });
        
        setTimeout(function() {
            $notification.fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    }

    /**
     * Update Cart Count
     */
    function updateCartCount(count) {
        $('.cart-count').text(count);
    }

    /**
     * Wishlist Functionality
     */
    $(document).on('click', '.wishlist-btn', function(e) {
        e.preventDefault();
        
        const $this = $(this);
        const $icon = $this.find('i');
        
        $this.toggleClass('active');
        
        if ($this.hasClass('active')) {
            $icon.removeClass('far').addClass('fas');
            showNotification('تمت إضافة المنتج إلى المفضلة ❤️');
        } else {
            $icon.addClass('far').removeClass('fas');
        }
    });

    /**
     * Search Functionality
     */
    $(document).on('click', '.search-btn', function() {
        const query = prompt('ابحث عن لوحة...');
        if (query) {
            window.location.href = '?s=' + encodeURIComponent(query);
        }
    });

    /**
     * Smooth Scroll for Navigation
     */
    $(document).on('click', 'a[href^="#"]', function(e) {
        const href = $(this).attr('href');
        if (href !== '#' && $(href).length) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(href).offset().top - 100
            }, 800);
        }
    });

    /**
     * Header Shadow on Scroll
     */
    $(window).on('scroll', function() {
        const $header = $('header.header');
        if ($(this).scrollTop() > 50) {
            $header.css('box-shadow', '0 2px 10px rgba(0,0,0,0.1)');
        } else {
            $header.css('box-shadow', '0 1px 3px rgba(0,0,0,0.05)');
        }
    });

    /**
     * Add Animation Style
     */
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .wishlist-btn.active {
            background: #ff6b6b !important;
            color: white !important;
        }

        section {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);

    /**
     * Initialize on Document Ready
     */
    $(document).ready(function() {
        console.log('Riysha Art Gallery Theme Loaded');
    });

})(jQuery);
