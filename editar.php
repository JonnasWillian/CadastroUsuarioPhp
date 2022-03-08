<?php

//Aqui realizamos a alteração dos usuários

$conn = require('connection.php');

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? null;

    $stmt = $conn->prepare('UPDATE users SET email=? WHERE id=?');
    $stmt->bind_param('si', $email, $id);
    $stmt->execute();

    header('location: /');
    die();
}

$stmt = $conn->prepare('SELECT * FROM users WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edição de funcionários</title>
</head>
<body>
    <h1>Editar usuário</h1>

    <form action="/editar.php?id=<?php echo $user['id']; ?>" method="post">
        <input type="text" name="email" value="<?php echo $user['email']; ?>">
        <input type="submit" value="enviar">
    </form>

    <p><a href="/">voltar</a></p>
</body>
</html>