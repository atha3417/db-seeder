<?php

session_start();

use Faker\Factory;

require_once __DIR__ . '/../vendor/autoload.php';

if (isset($_POST['submit'])) {
    $locale = $_POST['locale'];
    $column = $_POST['column'];
    $amount = (int) $_POST['amount'];
    $option = explode(', ', $_POST['option']);

    if (!isset($_SESSION['db_config'])) {
        $_SESSION['db_config'] = true;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['database'] = $_POST['database'];
        $_SESSION['table'] = $_POST['table'];
    }

    $_SESSION['amount'] = $amount;

    if (isset($_SESSION['db_config'])) {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $database = $_SESSION['database'];
        $table = $_SESSION['table'];
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $database = $_POST['database'];
        $table = $_POST['table'];
    }

    $faker = Factory::create($locale);

    $conn = mysqli_connect('localhost', $username, $password, $database) or die(mysqli_error($conn));

    function set_data()
    {
        global $faker;
        global $table;
        global $column;
        global $option;
        $sql = "INSERT INTO $table ($column) VALUES (";
        for ($i = 0; $i < count($option); $i++) {
            $sql .= "'{$faker->{$option[$i]}}'";
            if ($i < (count($option) - 1)) {
                $sql .= ', ';
            }
        }
        $sql .= ")";
        return $sql;
    }


    for ($i = 1; $i <= $amount; $i++) {
        $query = mysqli_query($conn, set_data());
    }

    if ($query) {
        $_SESSION['status'] = "success";
    } else {
        $_SESSION['status'] = "failed";
    }
    header("Location: ../index.php");
}

if (isset($_POST['reset'])) {
    session_destroy();
    session_unset();
    unset($_POST);
    header("Location: ../index.php");
}
