# NBA 會員系統

## 專案簡介
這是一個簡單的會員系統，允許用戶註冊、登入，並管理 NBA 相關的數據。功能包括新增、刪除、查詢和修改球員信息。

## 功能描述
1. **會員登入系統**
   - 用戶可以通過註冊頁面創建一個新帳戶。
   - 註冊成功後，用戶可以登入系統。
   - 登入後，用戶可以在一個表格中管理 NBA 相關的數據。
   - 數據包括球員姓名、所屬球隊、位置、身高和國家。
   - 用戶可以新增、刪除、瀏覽和修改這些數據。

## 使用技術
- **後端**：PHP
- **數據庫**：MySQL
- **前端**：HTML, CSS
- **開發環境**：XAMPP（需要啟用 Apache 和 MySQL）

## 安裝和運行
1. **安裝 XAMPP**
   - 下載並安裝 [XAMPP](https://www.apachefriends.org/index.html)。
   - 啟動 XAMPP 控制面板，並啟動 Apache 和 MySQL 服務。

2. **克隆專案**
   - 打開終端或命令提示符，導航到你的 Web 服務器根目錄（例如，`C:\xampp\htdocs`）。
   - 克隆專案代碼庫：
     ```sh
     git clone https://github.com/yourusername/your-repository-name.git
     ```
   - 或者將專案文件手動複製到 `htdocs` 目錄中。

3. **配置數據庫**
   - 打開瀏覽器，訪問 `http://localhost/phpmyadmin`。
   - 創建一個新的數據庫，例如 `nba_membership`。
   - 導入專案中的數據庫結構（通常是一個 `.sql` 文件）。

4. **更新數據庫連接設置**
   - 在專案的 `function/connect.php` 文件中，更新數據庫連接配置：
     ```php
     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "`nba_membership";

     // 創建連接
     $connect = new PDO($dsn, $userName, $password, $options);

     // 檢查連接
    catch (PDOException $e) {
           die("連接失敗: " . $e->getMessage());
    }
     ?>
     ```

5. **運行專案**
   - 打開瀏覽器，訪問 `http://localhost/your-repository-name`。
   - 你應該能夠看到登入頁面，並進行註冊、登入和管理 NBA 球員信息。

## 使用說明
- **註冊**：訪問註冊頁面，輸入必要的信息創建一個新帳戶。
- **登入**：使用註冊時的用戶名和密碼登入系統。
- **管理數據**：登入後，你可以在表格中新增、刪除、查詢和修改球員信息。

