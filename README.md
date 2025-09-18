# SalamCMS

SalamCMS is a lightweight **Headless CMS** built with **PHP** and **MySQL**.  
It provides a simple yet flexible backend to manage content and expose it through RESTful APIs, so developers can build websites, apps, or services with any frontend framework.

---

## ✨ Features
- 🗂️ **Headless architecture** – decouple backend from frontend  
- 🔑 **Authentication system** (JWT/session-based)  
- 📦 **Content management** – define content types, create & manage entries  
- 🌐 **REST API** to deliver content anywhere  
- ⚡ Lightweight and easy to deploy (pure PHP + MySQL)  
- 🔧 Extensible – can be customized or integrated with any PHP project  

---

## 🚀 Installation

### Requirements
- PHP >= 8.0  
- MySQL >= 5.7  
- Web server (Apache/Nginx)  
- Composer (recommended)  

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/shaltoook/salamcms.git
   cd salamcms
   ```
2. Install dependencies (if using Composer):
   ```bash
   composer install
   ```
3. Create a database in MySQL:
   ```sql
   CREATE DATABASE salamcms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
4. Copy the example environment file:
   ```bash
   cp .env.example .env
   ```
   And update your DB credentials.

5. Run migrations (if available) or import `database.sql`:
   ```bash
   mysql -u username -p salamcms < database.sql
   ```

6. Start your PHP server (for development):
   ```bash
   php -S localhost:8000 -t public
   ```

7. Visit `http://localhost:8000` 🎉

---

## 📚 Usage

- Access the **Admin Panel** at: `/admin`  
- Content is exposed via RESTful endpoints under: `/api/...`  
- Example:
  ```
  GET /api/posts
  GET /api/posts/{id}
  ```

---

## 🛠️ Roadmap
- [ ] GraphQL support  
- [ ] Role-based access control  
- [ ] File & media management  
- [ ] Plugin system  

---

## 🤝 Contributing
Contributions are welcome!  
1. Fork the repository  
2. Create a feature branch (`git checkout -b feature/my-feature`)  
3. Commit your changes  
4. Push to your fork and open a Pull Request  

---

## 📄 License
This project is licensed under the **MIT License** – see the [LICENSE](LICENSE) file for details.

---

## 👤 Author
Developed by **[shaltoook](https://github.com/shaltoook)**  

---

# SalamCMS (فارسی)

**SalamCMS** یک **سیستم مدیریت محتوای بدون واسط (Headless CMS)** سبک و ساده است که با **PHP** و **MySQL** ساخته شده.  
این پروژه یک بک‌اند انعطاف‌پذیر برای مدیریت محتوا فراهم می‌کند و از طریق APIهای REST محتوا را در اختیار فرانت‌اند یا اپلیکیشن‌ها قرار می‌دهد.  

---

## ✨ امکانات
- 🗂️ معماری Headless — جداسازی بک‌اند از فرانت‌اند  
- 🔑 سیستم احراز هویت (JWT یا Session)  
- 📦 مدیریت محتوا — تعریف انواع محتوا و ساخت و مدیریت داده‌ها  
- 🌐 APIهای REST برای ارائه محتوا در هر محیطی  
- ⚡ سبک و قابل استقرار سریع (فقط PHP + MySQL)  
- 🔧 قابل توسعه و قابل ادغام با هر پروژه‌ی PHP  

---

## 🚀 نصب

### نیازمندی‌ها
- PHP نسخه 8 به بالا  
- MySQL نسخه 5.7 به بالا  
- وب‌سرور (Apache یا Nginx)  
- Composer (پیشنهادی)  

### مراحل نصب
1. کلون کردن مخزن:
   ```bash
   git clone https://github.com/shaltoook/salamcms.git
   cd salamcms
   ```
2. نصب وابستگی‌ها (در صورت استفاده از Composer):
   ```bash
   composer install
   ```
3. ایجاد دیتابیس در MySQL:
   ```sql
   CREATE DATABASE salamcms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
4. کپی فایل تنظیمات نمونه:
   ```bash
   cp .env.example .env
   ```
   و سپس مشخصات دیتابیس خود را ویرایش کنید.

5. اجرای migrationها (اگر وجود دارد) یا وارد کردن فایل `database.sql`:
   ```bash
   mysql -u username -p salamcms < database.sql
   ```

6. اجرای سرور PHP (برای توسعه):
   ```bash
   php -S localhost:8000 -t public
   ```

7. بازدید از `http://localhost:8000` 🎉

---

## 📚 استفاده

- پنل مدیریت: `/admin`  
- API برای محتوا: `/api/...`  
- نمونه:
  ```
  GET /api/posts
  GET /api/posts/{id}
  ```

---

## 🛠️ نقشه راه
- [ ] پشتیبانی از GraphQL  
- [ ] مدیریت دسترسی مبتنی بر نقش (Role-based)  
- [ ] مدیریت فایل‌ها و رسانه‌ها  
- [ ] سیستم افزونه‌ها  

---

## 🤝 مشارکت
از مشارکت شما استقبال می‌کنیم!  
1. ریپازیتوری را Fork کنید  
2. یک شاخه جدید بسازید (`git checkout -b feature/my-feature`)  
3. تغییرات خود را commit کنید  
4. روی Fork خود Push کرده و Pull Request باز کنید  

---

## 📄 مجوز
این پروژه تحت مجوز **MIT** منتشر شده است — برای جزئیات بیشتر فایل [LICENSE](LICENSE) را ببینید.  

---

## 👤 توسعه‌دهنده
توسعه داده شده توسط **[shaltoook](https://github.com/shaltoook)**  
