# 🎨 دليل إعداد WordPress - ريشة متجر الفن

شرح شامل لكيفية استخدام موضوع WordPress الجديد ديالك

---

## 📁 ما تم إنشاؤه

```
✅ موضوع WordPress كامل في مجلد: wordpress-theme/
✅ جميع الملفات الضرورية موجودة
✅ دعم WooCommerce متكامل
✅ RTL وعربي 100%
✅ متجاوب على جميع الأجهزة
```

---

## 📂 بنية الموضوع

```
wordpress-theme/
│
├── style.css                 # الأنماط + Metadata
├── functions.php             # الوظائف والـ Hooks
├── header.php               # الرأس والـ Navigation
├── footer.php               # التذييل
├── front-page.php           # الصفحة الرئيسية
├── index.php                # الصفحة الافتراضية
│
├── js/
│   ├── script.js            # WordPress JavaScript
│   └── script-original.js   # النسخة الأصلية
│
├── languages/               # ملفات الترجمة (اختياري)
│
├── README.md                # توثيق كامل
├── INSTALL.md              # دليل التثبيت
└── composer.json           # معلومات المشروع
```

---

## 🚀 التثبيت السريع (10 دقائق)

### الخطوة 1: نسخ الموضوع

#### الطريقة A: من GitHub

```bash
# اذهب إلى مجلد WordPress Themes
cd /path/to/wordpress/wp-content/themes/

# انسخ المستودع
git clone https://github.com/elhassandouki/riysha-art-gallery.git

# اذهب للموضوع
cd riysha-art-gallery/wordpress-theme
```

#### الطريقة B: من FTP

```
1. افتح FileZilla
2. اتصل بـ الخادم
3. اذهب إلى: public_html/wp-content/themes/
4. Upload مجلد wordpress-theme
5. أعد تسمية إلى: riysha-art-gallery
```

### الخطوة 2: التفعيل

```
1. اذهب إلى: WordPress Dashboard
2. اختر: Appearance → Themes
3. ابحث عن: Riysha Art Gallery
4. اضغط: Activate
```

### الخطوة 3: الإعدادات الأساسية

```
Dashboard → Settings → Reading

اختر:
☑ A static page
Homepage: Home
```

### الخطوة 4: القوائم

```
Dashboard → Appearance → Menus

أنشئ قائمة جديدة:
- Home (الرئيسية)
- Shop (المتجر)
- Contact (اتصل بنا)

ربط مع: Primary Menu Location
```

**خلاص! الموقع جاهز!** ✅

---

## 🎨 الملفات الرئيسية وشرحها

### 1. `style.css` - الأنماط

```css
/*
Theme Name: Riysha Art Gallery
Version: 1.0.0
*/

/* يحتوي على:
- متغيرات CSS للألوان
- أنماط Header و Footer
- أنماط WooCommerce
- دعم RTL
*/
```

**كيفية التخصيص:**
```css
:root {
    --primary-color: #8B6F47;   /* غيّر هنا */
    --secondary-color: #2c2c2c; /* أو هنا */
}
```

### 2. `functions.php` - الوظائف

```php
<?php
// يحتوي على:
- تحميل CSS و JavaScript
- دعم الصور المميزة
- تسجيل القوائم
- دعم WooCommerce
- AJAX Add to Cart
- خيارات Customize
?>
```

**الـ Hooks الرئيسية:**
```php
add_action( 'wp_enqueue_scripts', 'riysha_enqueue_assets' );
add_action( 'after_setup_theme', 'riysha_setup' );
add_filter( 'loop_shop_per_page', function() { return 5; } );
```

### 3. `header.php` - الرأس

```php
<!DOCTYPE html>
<html>
<head>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
        <!-- الشعار والقائمة -->
    </header>
```

**يحتوي على:**
- DOCTYPE وـ Meta Tags
- CSS و Scripts
- الشعار والقائمة
- أيقونات البحث والسلة

### 4. `footer.php` - التذييل

```php
    </body>
    <?php wp_footer(); ?>
</html>
```

**يحتوي على:**
- روابط التذييل
- معلومات التواصل
- وسائل التواصل الاجتماعي

### 5. `front-page.php` - الصفحة الرئيسية

```php
<?php
// الأقسام:
- Hero Section
- Features Grid
- Latest Products من WooCommerce
?>
```

### 6. `js/script.js` - JavaScript

```javascript
// الوظائف:
- Add to Cart via AJAX
- Wishlist Management
- Notifications
- Smooth Scroll
- Header Shadow on Scroll
```

---

## 🔧 التكوين المتقدم

### إضافة صور WooCommerce

في `functions.php`:

```php
add_image_size( 'product-medium', 400, 400, true );
add_image_size( 'product-large', 600, 600, true );
```

### إضافة Custom CSS

انشئ ملف: `css/custom.css`

```css
/* CSS المخصص ديالك هنا */
```

ثم في `functions.php`:

```php
wp_enqueue_style( 'custom-style', RIYSHA_URI . '/css/custom.css' );
```

### إضافة Custom Post Type

في `functions.php`:

```php
function riysha_register_post_types() {
    register_post_type( 'gallery', array(
        'label'       => 'الصور',
        'public'      => true,
        'has_archive' => true,
    ));
}
add_action( 'init', 'riysha_register_post_types' );
```

---

## 📊 التكامل مع WooCommerce

### الخطوة 1: تثبيت WooCommerce

```
Plugins → Add New
ابحث عن: WooCommerce
Install + Activate
```

### الخطوة 2: إعداد WooCommerce

اتبع معالج الإعداد:
- معلومات المتجر
- طرق الدفع
- طرق الشحن
- إعدادات الضرائب

### الخطوة 3: إضافة المنتجات

```
Products → Add New

ملء:
✓ اسم المنتج
✓ الوصف الطويل
✓ الصورة المميزة
✓ السعر
✓ الفئة
✓ الكمية
✓ الحالة (متاح/غير متاح)
```

### الخطوة 4: إضافة الفئات

```
Products → Categories

أضف:
- طبيعة ساحلية
- لوحات تجريدية
- مناظر طبيعية
- حيوانات
- خط عربي
```

---

## 🎯 الميزات الخاصة

### 1. AJAX Add to Cart

يضيف المنتجات للسلة بدون تحديث الصفحة:

```javascript
addToCart(productId, quantity);
```

### 2. Customizer Options

يمكن تغيير:
- عنوان البداية
- وصف البداية
- الألوان الرئيسية

```
Appearance → Customize → Riysha Theme Options
```

### 3. RTL Support

الموضوع يدعم العربية بشكل كامل:

```html
<html dir="rtl" lang="ar">
```

### 4. WooCommerce Ready

```php
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
```

---

## 🚨 المتطلبات

### الحد الأدنى:
- WordPress 5.0+
- PHP 7.2+
- MySQL 5.6+

### الموصى:
- WordPress 6.0+
- PHP 8.0+
- MySQL 8.0+

---

## 🐛 استكشاف الأخطاء الشائعة

### ❌ المشكلة: الموضوع لا يظهر

**الحل:**
```
1. تأكد من مسار الملفات الصحيح
2. امسح الكاش من Dashboard
3. عيّد تحميل الصفحة (Ctrl+Shift+Delete)
```

### ❌ المشكلة: CSS لا يحمّل

**الحل:**
في `functions.php`:
```php
wp_enqueue_style( 'riysha-style', RIYSHA_URI . '/style.css', array(), filemtime( RIYSHA_DIR . '/style.css' ) );
```

### ❌ المشكلة: JavaScript لا يعمل

**الحل:**
```
1. افتح Console (F12)
2. ابحث عن الأخطاء
3. تأكد من تحميل jQuery
```

### ❌ المشكلة: الموقع بطيء

**الحل:**
```
1. ثبّت: WP Super Cache
2. ثبّت: Imagify
3. ثبّت: Autoptimize
4. استخدم CDN
```

---

## 📈 تحسين الأداء

### 1. تخزين مؤقت (Caching)

```bash
# تثبيت WP Super Cache
Plugins → Add New → WP Super Cache
```

### 2. ضغط الصور

```bash
# تثبيت Imagify
Plugins → Add New → Imagify
```

### 3. تقليل الملفات

```bash
# تثبيت Autoptimize
Plugins → Add New → Autoptimize
```

---

## 🔐 الأمان

### 1. تحديث WordPress

```
Dashboard → Updates
تحديث WordPress والإضافات
```

### 2. تثبيت Wordfence

```bash
Plugins → Add New → Wordfence Security
```

### 3. تعطيل XML-RPC

في `wp-config.php`:
```php
define( 'XMLRPC_REQUEST', false );
```

---

## 📞 الملفات المرجعية

| الملف | الوصف |
|------|-------|
| `README.md` | توثيق الموضوع الكامل |
| `INSTALL.md` | دليل التثبيت التفصيلي |
| `composer.json` | معلومات المشروع |

---

## 🎓 موارد مفيدة

- [WordPress Developer Handbook](https://developer.wordpress.org/)
- [WooCommerce Documentation](https://docs.woocommerce.com/)
- [Customize API](https://developer.wordpress.org/themes/customize-api/)
- [Theme Hooks Alliance](https://www.themehooksalliance.com/)

---

## ✅ قائمة التحقق

قبل نشر الموقع، تأكد من:

- [ ] الموضوع مفعّل
- [ ] WooCommerce مثبت
- [ ] المنتجات مضافة
- [ ] القوائم معيّنة
- [ ] الصور تحمّل بشكل صحيح
- [ ] الموقع متجاوب على الهاتف
- [ ] الدفع يعمل
- [ ] البحث يعمل
- [ ] لا توجد أخطاء في Console

---

## 🎉 النتيجة النهائية

أنت الآن لديك:

✅ **موقع متكامل**
- صفحة رئيسية احترافية
- متجر تجارة إلكترونية كامل
- دعم الدفع والشحن
- نظام إدارة محتوى قوي

✅ **موضوع قابل للتخصيص**
- ألوان مخصصة
- خطوط مخصصة
- تخطيط مرن

✅ **أداء عالي**
- تحميل سريع
- متجاوب تمامًا
- محسّن للبحث

---

**مبروك! موقعك الآن LIVE! 🚀**

التالي: انشر الموقع واستقطب الزبائن! 💪
