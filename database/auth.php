<?php
session_start();
require 'database.php';
class Auth extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }

    private function validate($email, $password) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Invalid email format.'];
        }
        if (strlen($password) < 6) {
            return ['success' => false, 'message' => 'Password must be at least 6 characters.'];
        }
        return ['success' => true];
    }

    private function emailCheck($email) {
        $checkEmail = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($checkEmail);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function usernameCheck($username) {
        $checkUsername = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($checkUsername);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($username, $email, $password) {
        $validation = $this->validate($email, $password);
        if (!$validation['success']) {
            return $validation;
        }

        $result = $this->emailCheck($email);
        if ($result) {
            return ['success' => false, 'message' => 'Email already exists.'];
        }

        $result = $this->usernameCheck($username);
        if ($result) {
            return ['success' => false, 'message' => 'Username already exists.'];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        if ($stmt->execute()) {
            $_SESSION['user'] = [
                'id' => $this->conn->lastInsertId(),
                'username' => $username,
                'email' => $email,
                'role' => 'user'
            ];
            return ['success' => true, 'message' => 'Registration successful.'];
        } else {
            return ['success' => false, 'message' => 'An error occurred during registration.'];
        }
    }

    public function login($email, $password) {
        $validation = $this->validate($email, $password);
        if (!$validation['success']) {
            return $validation;
        }

        $user = $this->emailCheck($email);
        if (!$user) {
            return ['success' => false, 'message' => 'Email does not exist.'];
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            return [
                'success' => true,
                'message' => 'Login successful.',
                'user' => $user
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Password is incorrect.'
            ];
        }
    }

    public function googleLogin($email, $username, $image, $password) {
        $user = $this->emailCheck($email);
        if (!$user) {
            $sql = "INSERT INTO user (email, username, password, role, image) VALUES (:email, :username, :password, 'user', :image)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':image', $image);
            if ($stmt->execute()) {
                $_SESSION['user'] = [
                    'id' => $this->conn->lastInsertId(),
                    'username' => $username,
                    'email' => $email,
                    'role' => 'user'
                ];
                return ['success' => true, 'message' => 'Registration successful.'];
            } else {
                return ['success' => false, 'message' => 'An error occurred during registration.'];
            }
        } else {
            $sql = "UPDATE user SET username = :username, image = :image WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':image', $image);
            if ($stmt->execute()) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $username,
                    'email' => $email,
                    'role' => $user['role']
                ];
                return ['success' => true, 'message' => 'Login successful.'];
            } else {
                return ['success' => false, 'message' => 'An error occurred during login.'];
            }
        }
    }
}