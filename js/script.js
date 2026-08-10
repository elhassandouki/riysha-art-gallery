// ====== Shopping Cart ======
let cart = [];
const cartBtn = document.querySelector('.cart-btn');
const cartCount = document.querySelector('.cart-count');

// Add to Cart Function
function addToCart(productName, price) {
    const product = {
        id: Date.now(),
        name: productName,
        price: price,
        quantity: 1
    };
    
    cart.push(product);
    updateCartCount();
    showNotification('تم إضافة المنتج إلى السلة ✓');
}

// Update Cart Count
function updateCartCount() {
    cartCount.textContent = cart.length;
}

// Show Notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #4CAF50;
        color: white;
        padding: 15px 20px;
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        z-index: 1000;
        animation: slideIn 0.3s ease-in-out;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Add event listeners to all "Add to Cart" buttons
document.addEventListener('DOMContentLoaded', function() {
    const addToCartBtns = document.querySelectorAll('.product-info .btn-small');
    addToCartBtns.forEach((btn, index) => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const productCard = btn.closest('.product-card');
            const productName = productCard.querySelector('.product-info h3').textContent;
            const priceText = productCard.querySelector('.product-info .price').textContent;
            const price = parseFloat(priceText);
            
            addToCart(productName, price);
        });
    });

    // Wishlist functionality
    const wishlistBtns = document.querySelectorAll('.wishlist-btn');
    wishlistBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            btn.classList.toggle('active');
            const icon = btn.querySelector('i');
            
            if (btn.classList.contains('active')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                showNotification('تمت إضافة المنتج إلى المفضلة ❤️');
            } else {
                icon.classList.add('far');
                icon.classList.remove('fas');
            }
        });
    });

    // Primary buttons functionality
    const primaryBtns = document.querySelectorAll('.btn-primary');
    primaryBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.textContent.includes('تسوق') || this.textContent.includes('طلب')) {
                e.preventDefault();
                showNotification('سيتم التوجيه إلى صفحة الشراء قريباً...');
                setTimeout(() => {
                    // Add redirect logic here
                    // window.location.href = '/checkout';
                }, 1500);
            }
        });
    });

    // Search functionality
    const searchBtn = document.querySelector('.search-btn');
    searchBtn.addEventListener('click', function() {
        const query = prompt('ابحث عن لوحة...');
        if (query) {
            showNotification(`البحث عن: ${query}`);
            // Add search logic here
        }
    });

    // Cart button functionality
    cartBtn.addEventListener('click', function() {
        if (cart.length === 0) {
            showNotification('السلة فارغة');
        } else {
            showCartSummary();
        }
    });

    // Smooth scroll for navigation links
    const navLinks = document.querySelectorAll('.nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });

    // Category cards click
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const categoryName = this.querySelector('h3').textContent;
            showNotification(`تصفح فئة: ${categoryName}`);
        });
    });

    // Add animation style
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

        /* Fade-in animation for page load */
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
});

// Show Cart Summary
function showCartSummary() {
    if (cart.length === 0) {
        alert('السلة فارغة');
        return;
    }

    let summary = 'السلة الخاصة بك:\n\n';
    let total = 0;

    cart.forEach((item, index) => {
        summary += `${index + 1}. ${item.name} - ${item.price} د.م\n`;
        total += item.price;
    });

    summary += `\nالإجمالي: ${total} د.م`;
    alert(summary);
}

// Track page scroll for animations
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
    } else {
        header.style.boxShadow = '0 1px 3px rgba(0,0,0,0.05)';
    }
});

// Add product data for better functionality
const products = [
    { name: 'ألق هادئة', price: 1200, dimensions: '80 × 60 سم' },
    { name: 'غروب في البحر', price: 1400, dimensions: '70 × 100 سم' },
    { name: 'زهور بيضاء', price: 900, dimensions: '70 × 50 سم' },
    { name: 'مساء ساحر', price: 1100, dimensions: '80 × 100 سم' },
    { name: 'تناغم الألوان', price: 1600, dimensions: '100 × 80 سم' }
];

// Export for testing
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { addToCart, products, cart };
}
