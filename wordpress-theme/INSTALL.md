# 📖 دليل التثبيت - WordPress Theme

شرح مفصل لتثبيت وتفعيل موضوع ريشة على WordPress.

---

## 🎯 الخطوات السريعة (5 دقائق)

### 1️⃣ نسخ الملفات

```bash
# انسخ مجلد الموضوع إلى WordPress
cp -r wordpress-theme /path/to/wordpress/wp-content/themes/riysha-art-gallery
```

### 2️⃣ تفعيل الموضوع

```
Dashboard → Appearance → Themes
ابحث عن: "Riysha Art Gallery"
اضغط: Activate
```

### 3️⃣ إعداد القوائم

```
Dashboard → Appearance → Menus

أنشئ "Primary Menu":
- الرئيسية (Home)
- المتجر (Shop)
- اتصل بنا (Contact)
```

### 4️⃣ تثبيت WooCommerce (اختياري)

```
Plugins → Add New
ابحث عن: WooCommerce
Install + Activate
```

**خلاص! الموقع جاهز!** ✅

---

## 📋 الخطوات التفصيلية

### أ. التحضير

**قبل البدء، تأكد من:**

- [ ] WordPress 5.0 أو أحدث
- [ ] PHP 7.2 أو أحدث
- [ ] الوصول إلى cPanel أو FTP
- [ ] نسخة احتياطية من الموقع

### ب. التثبيت على الاستضافة

#### الطريقة 1: عبر FTP

```
1. افتح FileZilla أو WinSCP
2. اتصل بـ الخادم
3. اذهب إلى: public_html/wp-content/themes/
4. انسخ مجلد wordpress-theme هنا
5. أعد تسمية المجلد إلى: riysha-art-gallery
```

#### الطريقة 2: عبر File Manager (cPanel)

```
1. cPanel → File Manager
2. اذهب إلى: public_html/wp-content/themes/
3. Upload المجلد riysha-art-gallery
4. Extract الملفات إذا كانت مضغوطة
```

#### الطريقة 3: عبر Git

```bash
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/elhassandouki/riysha-art-gallery.git riysha-art-gallery
```

### ج. التفعيل من Dashboard

**الخطوة 1:**
```
اذهب إلى: WordPress Dashboard
اختر: Appearance (المظهر)
اختر: Themes (المواضيع)
```

**الخطوة 2:**
```
ابحث عن: Riysha Art Gallery
اضغط على الصورة
اختر: Activate (تفعيل)
```

**الخطوة 3:**
```
انتظر تحميل الموقع
الموضوع الآن مفعّل! ✅
```

---

## ⚙️ الإعدادات الأساسية

### 1. إعداد الصفحة الرئيسية

```
Dashboard → Settings → Reading

اختر:
☑ A static page
Homepage: Home (أنشئها إذا لم تكن موجودة)
```

### 2. تفعيل الروابط الدائمة

```
Dashboard → Settings → Permalinks

اختر: Post name
اضغط: Save Changes
```

### 3. إعداد القوائم

#### أنشئ القائمة الرئيسية:

```
Appearance → Menus → Create a new menu
اسم القائمة: Primary Menu

أضف الفئات:
☑ Home
☑ Shop
☑ About
☑ Contact
☑ Blog

Save to Menu:
☑ Display location: Primary Menu
Save Menu
```

### 4. إعداد WooCommerce

```
Plugins → Add New
ابحث عن: WooCommerce
Install Now
Activate Plugin

اتبع Setup Wizard:
- أضف معلومات المتجر
- اختر طرق الدفع
- اختر أنواع الشحن
```

---

## 🎨 التخصيص الأولي

### أ. تخصيص الألوان

```
Appearance → Customize → Riysha Theme Options

غيّر:
- اللون الأساسي
- اللون الثانوي
- الخط (Font Family)

Preview والتحديث
```

### ب. إضافة الشعار

```
Appearance → Customize → Site Identity

Logo:
- Upload صورة الشعار
- اختر الحجم (200x100 موصى)

Save & Publish
```

### ج. تحرير نص البداية

```
Appearance → Customize → Riysha Theme Options

Hero Title:
"فعبّر عن الجمال بلوحة فريدة"

Hero Description:
"اكتشف مجموعة من اللوحات الفنية الأصلية"

Save & Publish
```

---

## 📸 إضافة المحتوى

### أ. أضف الصفحات

```
Pages → Add New

اكتب المحتوى:
- عن الموقع
- سياسة الخصوصية
- شروط الخدمة
- اتصل بنا
```

### ب. أضف المنتجات

```
Products → Add New

ملء:
✓ اسم المنتج
✓ الوصف
✓ الصورة
✓ السعر
✓ الفئة
✓ الحجم (للوحات)

Publish
```

---

## 🔧 استكشاف المشاكل

### المشكلة: الموقع فارغ

**الحل:**
```
1. تأكد من تفعيل الموضوع
2. تأكد من تعيين الصفحة الرئيسية
3. امسح الكاش
```

### المشكلة: الأنماط لا تظهر

**الحل:**
```php
// في wp-config.php، أضف:
define( 'WP_DEBUG', true );
define( 'SCRIPT_DEBUG', true );

// ثم امسح الكاش
```

### المشكلة: القوائم لا تظهر

**الحل:**
```
1. اذهب إلى Menus
2. تأكد من ربط المتجر الصحيح
3. اعد حفظ المتجر
```

### المشكلة: الهاتف لا يعمل بشكل صحيح

**الحل:**
```
1. تأكد من: <meta viewport>
2. اختبر على أجهزة حقيقية
3. استخدم Chrome DevTools
```

---

## 🚀 الخطوات التالية

بعد التثبيت:

- [ ] اختبر الموقع على الهاتف والكمبيوتر
- [ ] أضف Google Analytics
- [ ] اختبر الدفع والشحن
- [ ] اختبر البحث والتصفية
- [ ] قم بنسخة احتياطية

---

## 📊 نصائح الأداء

### تحسين السرعة

```
1. تثبيت: WP Super Cache
2. تثبيت: Imagify (لضغط الصور)
3. تثبيت: Autoptimize
4. استخدام CDN (Cloudflare)
```

### تحسين الأمان

```
1. تثبيت: Wordfence Security
2. تفعيل: Two-Factor Authentication
3. تحديث: WordPress وجميع الإضافات
4. غيّر: الـ wp-admin URL
```

---

## ✅ نموذج الفحص

بعد التثبيت، تأكد من:

- [ ] الموقع يحمّل بسرعة
- [ ] جميع الصور تظهر بشكل صحيح
- [ ] الموقع متجاوب على الهاتف
- [ ] الروابط تعمل بشكل صحيح
- [ ] لا توجد أخطاء في Console
- [ ] الدفع يعمل (إذا كان محفزاً)
- [ ] البحث يعمل
- [ ] القوائم تظهر بشكل صحيح

---

## 📞 الدعم

إذا واجهت مشاكل:

1. **اقرأ README.md**
2. **ابحث في GitHub Issues**
3. **اتصل بـ: info@reysha-art.com**
4. **اسأل في المنتديات**

---

**تهانينا! موقعك الآن جاهز للعمل!** 🎉
