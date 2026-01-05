# Complete XAMPP Setup Guide - Agency Sales Coaching Theme


### Step 1: Install XAMPP

1. **Download XAMPP**
   - Go to: https://www.apachefriends.org/
   - Click "Download" (Windows version)
   - Run the installer

2. **Install XAMPP**
   - Click "Next" through the installation
   - **Important:** Select these components:
     - Apache
     - MySQL
     - PHP
     - phpMyAdmin
   - Choose installation location: `C:\xampp\` (default is fine)
   - Click "Install" and wait for completion

---

### Step 2: Start XAMPP Services

1. **Open XAMPP Control Panel**
   - Find "XAMPP Control Panel" in Start Menu
   - Or go to: `C:\xampp\xampp-control.exe`

2. **Start Services**
   - Click "Start" button next to **Apache**
   - Wait until it turns **green** and shows "Running"
   - Click "Start" button next to **MySQL**
   - Wait until it turns **green** and shows "Running"
   - Both should be green/running

3. **Verify XAMPP is Working**
   - Open browser
   - Go to: `http://localhost/`
   - You should see the XAMPP dashboard page
   - If you see it, XAMPP is working correctly!

---

### Step 3: Download WordPress

1. **Download WordPress**
   - Go to: https://wordpress.org/download/
   - Click "Download WordPress"
   - Save the ZIP file to your Desktop or Downloads folder

2. **Extract WordPress**
   - Right-click the ZIP file
   - Select "Extract All..."
   - Extract to Desktop (you'll get a `wordpress` folder)

---

### Step 4: Set Up WordPress Folder

**IMPORTANT: Folder Naming**

You have two options:

#### Option A: Use "agency" folder name (Recommended)
- This allows you to access site at: `http://localhost/agency/`

#### Option B: Use "wordpress" folder name
- This allows you to access site at: `http://localhost/wordpress/`

**We'll use Option B (wordpress folder) for this guide:**

1. **Copy WordPress Files**
   - Go to your Desktop
   - Open the extracted `wordpress` folder
   - Select ALL files and folders inside (Ctrl + A)
   - Copy them (Ctrl + C)

2. **Paste to htdocs**
   - Go to: `C:\xampp\htdocs\`
   - Create a new folder named: `wordpress`
   - Open the `wordpress` folder
   - Paste all WordPress files here (Ctrl + V)

3. **Verify Files**
   - You should see these folders/files in `C:\xampp\htdocs\wordpress\`:
     - `wp-admin` folder
     - `wp-content` folder
     - `wp-includes` folder
     - `wp-config-sample.php`
     - `index.php`
     - And other WordPress files

---

### Step 5: Create Database

1. **Open phpMyAdmin**
   - Go to: http://localhost/phpmyadmin
   - Or click "Admin" next to MySQL in XAMPP Control Panel

2. **Create Database**
   - Click "New" in the left sidebar
   - Under "Create database", enter: `agency_coaching`
   - Click "Create" button
   - Database created!

---

### Step 6: Install WordPress

1. **Start WordPress Installation**
   - Open browser
   - Go to: `http://localhost/wordpress/`
   - You should see WordPress installation screen
   - Select your language → Click "Continue"

2. **Database Connection**
   - Click "Let's go!" button
   - Enter these details:
     ```
     Database Name:    agency_coaching
     Username:         root
     Password:         (leave empty - blank)
     Database Host:    127.0.0.1:3307
     Table Prefix:     wp_
     ```
   - Click "Submit"

3. **Run Installation**
   - If connection successful, click "Run the installation"
   - If you see an error, check:
     - MySQL is running (green in XAMPP)
     - Database name is exactly: `agency_coaching`
     - Username is: `root`
     - Password is empty

4. **Create Admin Account**
   - Site Title: `Agency Sales Coaching`
   - Username: (create your admin username - remember it!)
   - Password: (create a strong password - save it!)
   - Your Email: (your email address)
   - Click "Install WordPress"

5. **Login**
   - Click "Log In" button
   - Enter your username and password
   - Click "Log In"
   - You're now in WordPress Admin!

---

### Step 7: Install Your Theme

1. **Copy Theme Files**
   - Go to your theme folder: `C:\Users\HP\OneDrive\Desktop\Agency Sales Coaching\`
   - Select ALL files and folders
   - Copy them (Ctrl + C)

2. **Paste Theme to WordPress**
   - Go to: `C:\xampp\htdocs\agency\wp-content\themes\`
   - Create a new folder named: `agency-sales-coaching`
   - Open this folder
   - Paste all theme files here (Ctrl + V)

3. **Verify Theme Files**
   - Check these files exist in `C:\xampp\htdocs\agency\wp-content\themes\agency-sales-coaching\`:
     - `style.css`
     - `functions.php`
     - `index.php`
     - `header.php`
     - `footer.php`
     - `js/main.js`
     - And other files

---

### Step 8: Activate Theme

1. **Go to WordPress Admin**
   - Open: `http://localhost/wordpress/wp-admin`
   - Login if needed

2. **Activate Theme**
   - In left sidebar, click: **Appearance → Themes**
   - Find "Agency Sales Coaching" theme
   - Click "Activate" button
   - Theme activated!

---

### Step 9: View Your Site

1. **Visit Your Site**
   - Open a new browser tab
   - Go to: `http://localhost/wordpress/`
   - You should see your landing page!

2. **Clear Cache (Important!)**
   - Press `Ctrl + Shift + Delete`
   - Clear browser cache
   - Or use Incognito/Private mode: `Ctrl + Shift + N`
   - Visit: `http://localhost/wordpress/`
   - Press `Ctrl + F5` (hard refresh)

---

## 🎯 Quick Reference

### Important URLs:
```
WordPress Admin:    http://localhost/wordpress/wp-admin
View Your Site:     http://localhost/wordpress/
phpMyAdmin:         http://localhost/phpmyadmin
XAMPP Dashboard:    http://localhost/
```
---

