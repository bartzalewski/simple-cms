# Simple CMS

Welcome to the Simple CMS! This project is a PHP-based Content Management System (CMS) with user roles and permissions. It allows users to register, log in, create, edit, and delete posts. Administrators have additional permissions to manage the content.

## Features

- User Registration and Authentication
- User Roles: Admin, Editor, and User
- Create, Edit, and Delete Posts
- Dashboard for Managing Content
- Secure Password Hashing
- Simple and Clean UI

## Project Structure

```
cms/
├── config/
│ └── database.php
├── public/
│ ├── index.php
│ ├── login.php
│ ├── logout.php
│ ├── register.php
│ ├── dashboard.php
│ ├── create_post.php
│ ├── edit_post.php
│ └── delete_post.php
├── src/
│ ├── User.php
│ ├── Post.php
│ └── Auth.php
├── templates/
│ ├── header.php
│ ├── footer.php
│ ├── login_form.php
│ ├── register_form.php
│ ├── dashboard.php
│ └── post_form.php
└── .htaccess
```

## Getting Started

### Prerequisites

Make sure you have the following software installed on your machine:

- PHP
- MySQL
- A web server (e.g., Apache, Nginx)
- Visual Studio Code (VSCode) or any other code editor

### Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/bartzalewski/simple-cms.git
   cd simple-cms
   ```

2. **Set up the database:**

   - Start your MySQL server.
   - Create a new database named `cms` and run the following SQL commands to set up the tables:

     ```sql
     CREATE DATABASE cms;

     USE cms;

     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(50) NOT NULL,
         password VARCHAR(255) NOT NULL,
         role ENUM('admin', 'editor', 'user') NOT NULL DEFAULT 'user'
     );

     CREATE TABLE posts (
         id INT AUTO_INCREMENT PRIMARY KEY,
         title VARCHAR(255) NOT NULL,
         content TEXT NOT NULL,
         author_id INT NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
         updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
         FOREIGN KEY (author_id) REFERENCES users(id)
     );
     ```

3. **Configure the database connection:**

   - Open `config/database.php` and update the database connection details:

     ```php
     <?php
     // config/database.php
     $host = 'localhost';
     $dbname = 'cms';
     $username = 'root';
     $password = '';

     try {
         $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } catch (PDOException $e) {
         die("Could not connect to the database $dbname :" . $e->getMessage());
     }
     ?>
     ```

### Running the Application

1. **Start the PHP server:**

   - Open the `public` folder in your project.
   - Use the following command to start the PHP built-in server:

     ```sh
     php -S localhost:8000
     ```

   - Alternatively, you can use the PHP Server extension in VSCode:
     - Install the `PHP Server` extension.
     - Right-click on `index.php` in the `public` folder and select `PHP Server: Serve Project`.

2. **Navigate to the Application:**

   - Open your browser and go to `http://localhost:8000`.
   - Register a new user by navigating to `http://localhost:8000/register.php`.
   - Log in with your new user by navigating to `http://localhost:8000/login.php`.

### File Descriptions

- **config/database.php:** Database connection configuration.
- **public/index.php:** Home page of the CMS.
- **public/login.php:** User login page.
- **public/logout.php:** User logout page.
- **public/register.php:** User registration page.
- **public/dashboard.php:** User dashboard for managing posts.
- **public/create_post.php:** Page to create a new post.
- **public/edit_post.php:** Page to edit an existing post.
- **public/delete_post.php:** Page to delete a post.
- **src/User.php:** User-related operations.
- **src/Post.php:** Post-related operations.
- **src/Auth.php:** User authentication operations.
- **templates/header.php:** HTML header and navigation.
- **templates/footer.php:** HTML footer.
- **templates/login_form.php:** HTML login form.
- **templates/register_form.php:** HTML registration form.
- **templates/dashboard.php:** HTML dashboard to display posts.
- **templates/post_form.php:** HTML form to create/edit posts.
- **.htaccess:** Apache configuration for URL rewriting.

### License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

### Acknowledgments

- Thanks to the open-source community for providing excellent resources and tutorials.
- Special thanks to all contributors to this project.
