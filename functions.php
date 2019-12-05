<?php

function clear() {
    global $conn;
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }
}

function save_mass() {
    global $conn;
    clear();
    extract($_POST);
    $query = "INSERT INTO gb (name, text) VALUES ('$name', '$text')";
    $res = mysqli_query($conn, $query);
}

function read_mass() {
    global $conn;
    $query = "SELECT * FROM gb ORDER BY id DESC";
    $res = mysqli_query($conn, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function delete() {
    global $conn;
    $id = $_GET['id'];
    $query = "DELETE FROM gb WHERE id = {$id}";
    $res = mysqli_query($conn, $query);
}