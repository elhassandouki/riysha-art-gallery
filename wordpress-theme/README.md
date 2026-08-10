# 🎨 Riysha Art Gallery - WordPress Theme

موضوع ووردبريس احترافي متخصص في بيع اللوحات الفنية الأصلية.

## ✨ المميزات

✅ **تصميم RTL كامل** - دعم العربية بشكل كامل  
✅ **توافق WooCommerce** - متجر تجارة إلكترونية كامل  
✅ **متجاوب** - يعمل على جميع الأجهزة  
✅ **سريع الأداء** - محسّن للسرعة  
✅ **قابل للتخصيص** - لوحة تحكم سهلة الاستخدام  
✅ **آمن** - معايير WordPress الأمنية  

## 📁 بنية الملفات

```
riysha-art-gallery/
├── style.css              # الأنماط والـ Metadata
├── functions.php          # وظائف الموضوع
├── header.php            # رأس الصفحة والـ Navigation
├── footer.php            # تذييل الصفحة
├── front-page.php        # الصفحة الرئيسية
├── index.php             # الصفحة الافتراضية
├── js/
│   └── script.js         # سكريبتات JavaScript
├── css/
│   └── custom.css        # أنماط إضافية (اختياري)
└── languages/
    └── ar.po             # ملفات الترجمة (اختياري)
```

## 🚀 التثبيت

### الطريقة 1: النسخ اليدوي

```bash
# 1. انسخ مجلد الموضوع
cp -r riysha-art-gallery /path/to/wordpress/wp-content/themes/

# 2. في WordPress Dashboard:
# Appearance → Themes
# ابحث عن "Riysha Art Gallery" وفعّله
```

### الطريقة 2: من GitHub

```bash
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/elhassandouki/riysha-art-gallery.git wordpress-theme
```

## 📋 المتطلبات

- WordPress 5.0 أو أحدث
- PHP 7.2 أو أحدث
- WooCommerce (اختياري، للمتجر)

## ⚙️ التكوين

### 1. تفعيل الموضوع

```
Dashboard → Appearance → Themes
اختر "Riysha Art Gallery" → Activate
```

### 2. إعداد القوائم

```
Dashboard → Appearance → Menus

أنشئ قائمة جديدة:
- الرئيسية
- المتجر
- عن الموقع
- اتصل بنا

اربط القائمة بـ "Primary Menu Location"
```

### 3. تخصيص الموضوع

```
Dashboard → Appearance → Customize

في "Riysha Theme Options":
- عدّل عنوان البداية
- عدّل وصف البداية
- اختر الألوان المفضلة
```

### 4. إعداد WooCommerce (اختياري)

```
1. Plugins → Add New
2. ابحث عن: WooCommerce
3. Install + Activate
4. اتبع معالج الإعداد
5. أضف المنتجات
```

## 🎨 التخصيص

### تغيير الألوان

في `style.css`، عدّل متغيرات CSS:

```css
:root {
    --primary-color: #8B6F47;    /* اللون الأساسي */
    --secondary-color: #2c2c2c;  /* اللون الثانوي */
    --accent-color: #D4AF37;     /* لون التركيز */
}
```

### تغيير الخطوط

في `functions.php`:

```php
wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/...' );
```

### إضافة منطقة ويدجت

في `functions.php`:

```php
register_sidebar( array(
    'name'    => 'Sidebar Name',
    'id'      => 'sidebar-id',
) );
```

## 🔌 Hooks المتاحة

### Filters

```php
// تغيير عدد المنتجات في الصفحة
apply_filters( 'loop_shop_per_page', 5 );

// تغيير اللون الأساسي
apply_filters( 'riysha_primary_color', '#8B6F47' );
```

### Actions

```php
// قبل تحميل Scripts
do_action( 'wp_enqueue_scripts' );

// بعد إعداد الموضوع
do_action( 'after_setup_theme' );
```

## 🚀 الميزات المتقدمة

### AJAX Add to Cart

```javascript
// إضافة منتج للسلة بدون تحديث الصفحة
addToCart(productId, quantity);
```

### إشعارات مخصصة

```javascript
showNotification('الرسالة', 'success');
showNotification('خطأ', 'error');
```

### النقل السلس

```javascript
// التمرير السلس للأقسام
$('html, body').animate({ scrollTop: target }, 800);
```

## 📊 الدعم للإضافات

### WooCommerce

- ✅ معرض المنتجات المتقدم
- ✅ سلة التسوق
- ✅ عملية الدفع
- ✅ صفحة حسابي

### Elementor

يمكنك استخدام Elementor مع هذا الموضوع:

```
Plugins → Add New
ابحث عن: Elementor
Install + Activate
```

## 🐛 استكشاف الأخطاء

### الموقع يظهر بشكل خاطئ

```php
// اختبر في wp-config.php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
```

### CSS لا يحمّل

```php
// امسح الكاش في functions.php
define( 'SCRIPT_DEBUG', true );
```

### JavaScript لا يعمل

افتح Console (F12) وابحث عن الأخطاء.

## 📞 الدعم

- 📧 البريد: info@reysha-art.com
- 🐛 Issues: https://github.com/elhassandouki/riysha-art-gallery/issues
- 💬 Discussions: https://github.com/elhassandouki/riysha-art-gallery/discussions

## 📄 الترخيص

GPL v2 or later

تفاصيل كاملة في ملف `LICENSE`

## 👨‍💻 المطورون

- **El Hassan Douki** - المطور الرئيسي

## 🙏 شكر وتقدير

شكر لمجتمع WordPress العربي على الدعم المستمر.

---

**الإصدار:** 1.0.0  
**آخر تحديث:** 2024  
**الحالة:** مستقر وجاهز للإنتاج ✅
