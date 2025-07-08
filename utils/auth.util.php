<?php
declare(strict_types=1);

class Auth
{
    // 🔁 Always make sure the session is started
    public static function init(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // 🔐 Login function
    public static function login(PDO $pdo, string $username, string $password): bool
    {
        self::init();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            $_SESSION['user'] = [
                'id'        => $user['id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'full_name' => $user['first_name'] . ' ' . $user['last_name'],
            ];
            return true;
        }

        return false;
    }

    // 🙋 Get the current user
    public static function user(): ?array
    {
        self::init();
        return $_SESSION['user'] ?? null;
    }

    // ✅ Check if user is logged in
    public static function check(): bool
    {
        self::init();
        return isset($_SESSION['user']);
    }

    // 🔓 Logout user
    public static function logout(): void
    {
        self::init();
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 3600); // Remove session cookie
    }
}