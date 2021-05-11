<?php
class User
{

    // Connection
    private $db;

    // Tables
    private $users_table = "users";

    // Db connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser($post)
    {
        try {
            $q = $this->db->prepare("INSERT INTO $this->users_table VALUES(
                :user_id,
                :user_first_name,
                :user_last_name,
                :user_username,
                :user_email,
                :user_password,
                :user_verification_code,
                :user_verified,
                :user_active,
                :user_is_staff,
                :user_last_login,
                :user_created
                )");
            $q->bindValue(':user_id', null);
            $q->bindValue(':user_first_name', $post['first_name']);
            $q->bindValue(':user_last_name', $post['last_name']);
            $q->bindValue(':user_username', null);
            $q->bindValue(':user_email', $post['email']);
            $q->bindValue(':user_password', password_hash($post['password'], PASSWORD_DEFAULT));
            $q->bindValue(':user_verification_code', uniqid(true));
            $q->bindValue(':user_verified', 0);
            $q->bindValue(':user_active', 0);
            $q->bindValue(':user_is_staff', 0);
            $q->bindValue(':user_last_login', date("Y-m-d H:i:s"));
            $q->bindValue(':user_created', date("Y-m-d H:i:s"));
            $q->execute();
        } catch (Exception $ex) {
            echo "Database could not be connected: " . $ex->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            $q =  $this->db->prepare("SELECT * FROM $this->users_table WHERE user_email = :user_email LIMIT 1");
            $q->bindValue(':user_email', $email);
            $q->execute();
            $row = $q->fetch();
            if (!$row) {
                return "Wrong email";
            }
            if (password_verify($password, $row['user_password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_first_name'] = $row['user_first_name'];
                $_SESSION['user_last_name'] = $row['user_last_name'];
                header('Location: /');
            }
            return "Wrong password";
        } catch (Exception $ex) {
            echo "Database could not be connected: " . $ex->getMessage();
        }
    }
}
