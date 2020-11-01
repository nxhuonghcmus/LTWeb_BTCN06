<?php
function findUserByUsername($username)
{

    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function findUserById($id)
{

    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getCurrentUser()
{
    if (isset($_SESSION['userId'])) {
        return findUserById($_SESSION['userId']);
    }
    return null;
}

function Update($username,$newpassword)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE username= ?");
    $stmt->execute(array( $newpassword, $username));
    return findUserById($db->lastInsertId());
}

function createUser($username, $password, $email)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO users(username,password,email) VALUES (?,?,?)");
    $stmt->execute(array($username, $password, $email));
    // $insertId=$db->lastInsertId();
    return findUserById($db->lastInsertId());
}
