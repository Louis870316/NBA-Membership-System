# NBA Membership System

![Index text](https://img.onl/k1If65)
![Index text](https://img.onl/y5eNGZ)

## Project Overview
This is a membership system built using PHP and MariaDB, featuring member registration, login, and CRUD functionalities for NBA player data. The frontend is implemented using HTML and CSS.

## Features
  **Member Login System**
   - Users can create a new account through the registration page.
   - After successful registration, users can log in to the system.
   - Once logged in, users can manage NBA-related data in a table.
   - Data includes player name, team, position, height, and country.
   - Users can add, delete, view, and modify this data.

## Technologies Used
- **Backend**: PHP (version 8.0.30)
- **Database**: MariaDB
- **Frontend**: HTML, CSS
- **Development Environment**: XAMPP (version 3.3.0, with Apache and MySQL enabled)
- **Password Encryption**: Uses the `password_hash()` function for bcrypt encryption, and the `password_verify()` function for password verification.
- **Database Connection**: Utilizes PDO (PHP Data Objects) for database connection, and enables prepared statements to prevent SQL injection.
- **Object-Oriented Design**: PHP classes are used to design the code. The `Connector` class handles the database connection, and the `Account` class manages user accounts and NBA player data, including creation, deletion, updating, and retrieval.

### Password Encryption Example

During user registration and login, bcrypt algorithm is used for password hashing and verification. Below is the implementation example in PHP:

```php
// Password hashing during registration
$password = trim($_POST['password']);
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Storing the hashed password in the database
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
$stmt->execute(['username' => $username, 'password' => $hashedPassword]);

// Password verification during login
$enteredPassword = trim($_POST['password']);
$stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (password_verify($enteredPassword, $row['password'])) {
    // Password verification successful
    session_start();
    $_SESSION['id'] = $row['id'];
    header("Location: dashboard.php");
    exit();
} else {
    // Password verification failed
    header("Location: index.php?process=failedlogin");
    exit();
}

## Installation and Running
1. **Install XAMPP**
   - Download and install [XAMPP](https://www.apachefriends.org/index.html)。
   - Start the XAMPP control panel and enable Apache and MySQL services.

2. **Clone the Project**
   - Open a terminal or command prompt and navigate to your web server root directory (e.g., C:\\xampp\\htdocs).
   - Clone the project repository:
     ```sh
     git clone https://github.com/yourusername/your-repository-name.git
     ```
   - Alternatively, manually copy the project files into the htdocs directory.

3. **Configure the Database**
   - Open a browser and visit `http://localhost/phpmyadmin`.
   - Create a new database, for example, `nba_membership`.
   - Import the database structure from the project.

4. **Run the Project**
   - Open a browser and visit `http://localhost/your-repository-name`.
   - You should see the login page, where you can register, log in, and manage NBA player information.

## Usage Instructions
- **Register**：Visit the registration page and enter the required information to create a new account.
- **Log In**：Log in to the system using the username and password created during registration.
- **Manage Data**：After logging in, you can add, delete, view, and modify player information in the table.
