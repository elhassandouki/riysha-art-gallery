# 📖 دليل GitHub خطوة بخطوة

كيفية إنشاء ونشر المشروع على GitHub

---

## 1️⃣ إنشاء حساب GitHub (إذا لم تكن لديك واحد)

1. اذهب إلى [github.com](https://github.com)
2. اضغط "Sign up"
3. أدخل:
   - البريد الإلكتروني
   - كلمة المرور
   - اسم المستخدم (مثل: yourusername)
4. اضغط "Create account"

---

## 2️⃣ إنشاء Repository جديد

### الطريقة الأولى (عبر الويب)

1. اذهب إلى [github.com/new](https://github.com/new)
2. ملء الحقول:
   ```
   Repository name: riysha-art-gallery
   Description: موقع متخصص في بيع اللوحات الفنية الأصلية
   Visibility: Public
   ```
3. اختر:
   - ☑ Add a README file
   - ☑ Add .gitignore
4. اضغط "Create repository"

---

## 3️⃣ رفع الملفات

### الطريقة الأولى (عبر الويب - للمبتدئين)

```
1. في صفحة المستودع، اضغط "Add file" → "Upload files"
2. اختر جميع الملفات من مجلد riysha-art-gallery
3. اضغط "Commit changes"
```

### الطريقة الثانية (Git Command Line - الأفضل)

#### الخطوة أ: تثبيت Git
- **Windows:** [git-scm.com](https://git-scm.com/download/win)
- **Mac:** `brew install git`
- **Linux:** `sudo apt-get install git`

#### الخطوة ب: تكوين Git
```bash
git config --global user.name "اسمك"
git config --global user.email "بريدك@example.com"
```

#### الخطوة ج: رفع المشروع
```bash
# 1. اذهب لمجلد المشروع
cd path/to/riysha-art-gallery

# 2. ابدأ git
git init

# 3. أضف جميع الملفات
git add .

# 4. سجل التغييرات
git commit -m "🎨 Initial commit: Riysha art gallery"

# 5. أضف رابط المستودع البعيد
git remote add origin https://github.com/yourusername/riysha-art-gallery.git

# 6. أرسل الملفات
git branch -M main
git push -u origin main
```

---

## 4️⃣ تفعيل GitHub Pages (النشر)

1. اذهب إلى المستودع
2. Settings (في الأعلى)
3. الجانب الأيسر: Pages
4. ملء:
   ```
   Branch: main
   Folder: / (root)
   ```
5. اضغط Save

**موقعك الآن على:**
```
https://yourusername.github.io/riysha-art-gallery
```

---

## 5️⃣ تحديث الموقع (بعد النشر)

كلما تريد تغيير شيء:

```bash
# 1. تأكد من أنك في المجلد الصحيح
cd riysha-art-gallery

# 2. عدّل الملفات

# 3. أضف التغييرات
git add .

# 4. سجل التعليق
git commit -m "🐛 Fixed: description of change"

# 5. أرسل التحديثات
git push
```

---

## 📝 أنواع الرسائل (Commit Messages)

```
🎨 Style: تحسينات الواجهة
✨ Feature: ميزة جديدة
🐛 Bug Fix: إصلاح خطأ
📱 Mobile: تحسينات الهاتف
📝 Docs: تحديثات التوثيق
♻️ Refactor: إعادة هيكلة
⚡ Performance: تحسين الأداء
🚀 Deploy: نشر جديد
```

---

## 🔑 مفاتيح Git المهمة

```bash
# رؤية حالة المشروع
git status

# رؤية السجل
git log

# العودة للإصدار السابق
git revert HEAD

# حذف تغيير محلي
git reset --hard

# إنشاء branch جديد
git checkout -b feature/new-feature

# الانتقال بين branches
git checkout branch-name

# دمج branch
git merge branch-name
```

---

## 🌳 Branch Workflow

```
main (الرئيسي - جاهز للنشر)
├── develop (التطوير)
├── feature/new-products
├── bugfix/cart-issue
└── hotfix/urgent-fix
```

**مثال:**
```bash
# 1. إنشاء branch جديد
git checkout -b feature/payment-system

# 2. تطوير الميزة
# (عدّل الملفات)

# 3. رفع الـ branch
git push -u origin feature/payment-system

# 4. اطلب merge عبر Pull Request

# 5. بعد الموافقة، دمج مع main
```

---

## 🔒 الأمان على GitHub

### عدم رفع:
```
❌ كلمات المرور
❌ مفاتيح API
❌ بيانات شخصية
❌ ملفات سرية
```

### استخدم .env للحساسة:
```bash
# .env (لا ترفعه)
API_KEY=secret_key_here
DB_PASSWORD=password123

# .gitignore
.env
.env.local
secrets/
```

---

## 👥 التعاون (Collaboration)

### دعوة متعاون:

1. Settings → Collaborators
2. اضغط "Add people"
3. ابحث عن اسم المستخدم
4. اختر صلاحيات

### حقوق الوصول:
- **Pull:** قراءة فقط
- **Push:** قراءة وكتابة
- **Admin:** كل الصلاحيات

---

## 🐛 استكشاف الأخطاء

### "fatal: not a git repository"
```bash
git init
```

### "Permission denied (publickey)"
```bash
# توليد مفتاح SSH
ssh-keygen -t rsa -b 4096 -C "email@example.com"

# أضفه إلى GitHub:
Settings → SSH and GPG keys → New SSH key
```

### "origin already exists"
```bash
git remote remove origin
git remote add origin https://github.com/yourusername/repo.git
```

---

## 📊 شارات (Badges) للـ README

أضف هذه الشارات:

```markdown
![GitHub](https://img.shields.io/badge/github-riysha--art--gallery-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![Status](https://img.shields.io/badge/status-active-brightgreen)
```

---

## 🚀 الخطوات النهائية

```
✅ إنشاء Repository
✅ رفع الملفات
✅ تفعيل GitHub Pages
✅ اختبار الموقع
✅ مشاركة الرابط
✅ تطوير مستمر
```

---

## 💡 نصائح مهمة

1. **Commit بانتظام** - كل ساعة تقريباً
2. **اكتب رسائل واضحة** - تساعد في الفهم لاحقاً
3. **استخدم branches** - لكل ميزة جديدة
4. **اختبر قبل الرفع** - تجنب الأخطاء
5. **اقرأ error messages** - تساعد في الحل

---

## 📚 موارد مفيدة

- [GitHub Docs](https://docs.github.com)
- [Git Cheat Sheet](https://github.github.com/training-kit/downloads/github-git-cheat-sheet.pdf)
- [How to Use GitHub](https://www.youtube.com/watch?v=w3jLJU7DT5E)

---

**أنت الآن جاهز!** 🎉  
ابدأ بمشروعك على GitHub الآن! 🚀
