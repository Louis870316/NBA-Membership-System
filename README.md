# NBA 會員系統

![Index text](https://img.onl/k1If65)
![Index text](https://img.onl/y5eNGZ)

## 專案簡介
這是一個使用 PHP 和 MariaDB 建立的會員系統，包含會員註冊、登入和 NBA 球員資料CRUD功能。前端使用 HTML 和 CSS 實現。

## 功能描述
1. **會員登入系統**
   - 用戶可以通過註冊頁面創建一個新帳戶。
   - 註冊成功後，用戶可以登入系統。
   - 登入後，用戶可以在一個表格中管理 NBA 相關的數據。
   - 數據包括球員姓名、所屬球隊、位置、身高和國家。
   - 用戶可以新增、刪除、瀏覽和修改這些數據。

## 使用技術
- **後端**：PHP （版本 8.0.30）
- **資料庫**：MariaDB 
- **前端**：HTML, CSS
- **開發環境**：XAMPP（版本 3.3.0，啟用 Apache 和 MySQL）
- **密碼加密**：使用 `password_hash()` 函數對密碼進行bcrypt加密，並在驗證時使用 `password_verify()` 函數進行匹配。
- **資料庫連接**：使用 PDO（PHP Data Objects）來連接資料庫，並啟用預處理語句以防止SQL注入攻擊。
- **面向對象設計**：使用 PHP 類 (Class) 來設計程式碼。`Connector` 類負責資料庫連接，`Account` 類負責管理用戶帳戶和 NBA 球員數據，包括新增、刪除、更新和查詢功能。

### 密碼加密示例

在用戶註冊和登入過程中，使用bcrypt算法來處理密碼加密和驗證。以下是在PHP中的實現示例：

```php
// 註冊時加密密碼
$password = trim($_POST['password']);
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// 儲存加密後的密碼到資料庫
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
$stmt->execute(['username' => $username, 'password' => $hashedPassword]);

// 登入時驗證密碼
$enteredPassword = trim($_POST['password']);
$stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (password_verify($enteredPassword, $row['password'])) {
    // 密碼驗證成功
} else {
    // 密碼驗證失敗
}
```

## 安裝和運行
1. **安裝 XAMPP**
   - 下載並安裝 [XAMPP](https://www.apachefriends.org/index.html)。
   - 啟動 XAMPP 控制面板，並啟動 Apache 和 MySQL 服務。

2. **克隆專案**
   - 打開終端或命令提示符，導航到你的 Web 伺服器根目錄（例如，`C:\xampp\htdocs`）。
   - 克隆專案代碼庫：
     ```sh
     git clone https://github.com/yourusername/your-repository-name.git
     ```
   - 或者將專案文件手動複製到 `htdocs` 目錄中。

3. **配置資料庫**
   - 打開瀏覽器，訪問 `http://localhost/phpmyadmin`。
   - 創建一個新的資料庫，例如 `nba_membership`。
   - 導入專案中的資料庫結構。

4. **運行專案**
   - 打開瀏覽器，訪問 `http://localhost/your-repository-name`。
   - 能夠看到登入頁面，並進行註冊、登入和管理 NBA 球員信息。

## 使用說明
- **註冊**：訪問註冊頁面，輸入必要的信息創建一個新帳戶。
- **登入**：使用註冊時的用戶名和密碼登入系統。
- **管理數據**：登入後，你可以在表格中新增、刪除、查詢和修改球員信息。
