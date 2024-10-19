<?php
class userController
{
    public function login($username, $password)
    {
        $db = new database();
        $con = $db->initDatabase();
        $statement = $con->prepare("SELECT * FROM user WHERE username = ?");
        $statement->execute([$username]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return json_encode(['status' => 'success', 'message' => 'Login successful']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    }

    public function register()
    {
        try {
            $db = new database();
            $db->createTableIfNotExists();
            $con = $db->initDatabase();
            
            if (!$con) {
                throw new Exception("Database connection failed");
            }

            $username = $_POST['user'];
            $password = $_POST['pass'];

            // Check if the username already exists
            $checkStatement = $con->prepare("SELECT * FROM user WHERE username = ?");
            $checkStatement->execute([$username]);
            if ($checkStatement->fetch()) {
                return json_encode(['status' => 'error', 'message' => 'Username already taken']);
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $statement = $con->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, 'user')");
            $result = $statement->execute([$username, $hashedPassword]);

            if ($result) {
                return json_encode(['status' => 'success', 'message' => 'Registration successful']);
            } else {
                throw new Exception("Registration failed");
            }
        } catch (Exception $e) {
            return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
