# 🚀 دليل النشر والتطوير

شرح تفصيلي لكيفية نشر الموقع على منصات مختلفة.

---

## 📋 المتطلبات

- حساب GitHub
- متصفح ويب (Chrome, Firefox, Safari)
- محرر نصوص (VS Code, Sublime Text, إلخ)

---

## 1️⃣ GitHub Pages (مجاني وسهل)

### الخطوة 1: إنشاء Repository
```bash
# على جهازك المحلي
git init riysha-art-gallery
cd riysha-art-gallery

# أضف الملفات
git add .
git commit -m "Initial commit"

# اربط مع GitHub
git remote add origin https://github.com/yourusername/riysha-art-gallery.git
git branch -M main
git push -u origin main
```

### الخطوة 2: تفعيل GitHub Pages
1. اذهب إلى المستودع على GitHub
2. Settings → Pages
3. اختر Branch: `main`
4. اختر Folder: `/` (root)
5. اضغط Save

### الخطوة 3: النشر
الموقع سيكون متاح على:
```
https://yourusername.github.io/riysha-art-gallery
```

---

## 2️⃣ Netlify (موصى به)

### الخطوة 1: ربط المشروع
1. اذهب إلى [Netlify.com](https://netlify.com)
2. اضغط "New site from Git"
3. اختر GitHub
4. ابحث عن المستودع `riysha-art-gallery`

### الخطوة 2: الإعدادات
```
Build command: (اتركها فارغة - موقع static)
Publish directory: /
```

### الخطوة 3: النشر التلقائي
```
سيتم النشر تلقائياً عند كل push إلى main
```

---

## 3️⃣ Vercel (سريع جداً)

### الخطوة 1: الربط
1. اذهب إلى [Vercel.com](https://vercel.com)
2. اضغط "New Project"
3. اختر المستودع

### الخطوة 2: النشر
سيتم النشر تلقائياً!

```
الرابط: https://riysha-art-gallery.vercel.app
```

---

## 4️⃣ Hosting عبر FTP (الاستضافة التقليدية)

### الخطوة 1: الوصول إلى لوحة التحكم
- استخدم FileZilla أو WinSCP
- ادخل بيانات FTP

### الخطوة 2: رفع الملفات
```
انسخ جميع الملفات من المشروع
الصق في public_html/
```

### الخطوة 3: إعدادات Domain
- أضف اسم النطاق في settings
- انتظر 24 ساعة لانتشار DNS

---

## 🔧 التطوير المحلي

### باستخدام Python
```bash
# Python 3
python -m http.server 8000

# الرابط: http://localhost:8000
```

### باستخدام Node.js
```bash
npm install -g live-server
live-server

# سيفتح تلقائياً في المتصفح
```

### باستخدام VS Code
```
تثبيت تطبيق "Live Server"
اضغط بيمين على index.html → Open with Live Server
```

---

## 📱 اختبار قبل النشر

### 1. الاختبار المحلي
```bash
# اختبر على localhost
http://localhost:8000
```

### 2. اختبر على جميع المتصفحات
- Chrome
- Firefox
- Safari
- Edge

### 3. اختبر على الهاتف
```bash
# اعرف عنوان IP الجهاز
ipconfig (Windows)
ifconfig (Mac/Linux)

# ثم في هاتفك
http://192.168.1.X:8000
```

### 4. اختبر الوظائف
- ☑ السلة تعمل
- ☑ المفضلة تعمل
- ☑ البحث يعمل
- ☑ القوائم تعمل
- ☑ الصور تظهر
- ☑ الألوان صحيحة

---

## 🎨 تخصيص النطاق

### مع GitHub Pages
```
repo-settings → Pages → Custom Domain
أدخل: yourdomain.com
```

### مع Netlify
```
Site settings → Domain → Add a domain
أدخل: yourdomain.com
تابع التعليمات
```

---

## 🔐 HTTPS (آمان)

جميع المنصات أعلاه توفر HTTPS مجاناً:
- ✅ GitHub Pages
- ✅ Netlify
- ✅ Vercel

---

## 📊 مراقبة الأداء

### استخدم Google PageSpeed
```
https://pagespeed.web.dev/
أدخل رابط موقعك
```

### اختبر السرعة
```
https://www.gtmetrix.com/
أدخل رابط موقعك
```

---

## 🚨 استكشاف الأخطاء

### الصور لا تظهر
```
تأكد من مسار الصور
استخدم الروابط المطلقة
```

### الأنماط لا تعمل
```
افتح Console (F12)
ابحث عن 404 errors
تأكد من مسارات CSS
```

### الوظائف لا تعمل
```
افتح Console (F12)
ابحث عن JavaScript errors
تحقق من نحو الكود
```

---

## 📈 الخطوات التالية

بعد النشر:

1. **أضف Google Analytics**
   ```html
   <script async src="https://www.googletagmanager.com/gtag/js?id=GA_ID"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());
     gtag('config', 'GA_ID');
   </script>
   ```

2. **أضف sitemap**
   ```xml
   <!-- sitemap.xml -->
   تم إنشاؤه تلقائياً على معظم المنصات
   ```

3. **أضف robots.txt**
   ```
   User-agent: *
   Allow: /
   ```

4. **اختبر مع Search Console**
   - Google Search Console
   - Bing Webmaster Tools

---

## ✅ نموذج الفحص

قبل النشر تأكد من:
- [ ] جميع الصور تظهر بشكل صحيح
- [ ] الموقع متجاوب على الهاتف
- [ ] جميع الروابط تعمل
- [ ] لا توجد أخطاء في Console
- [ ] السرعة مقبولة
- [ ] الألوان صحيحة

---

**تم النشر بنجاح!** 🎉
