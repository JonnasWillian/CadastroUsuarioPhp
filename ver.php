<?php

//Função que exibe os usuários

$conn = require('connection.php');

$id = $_GET['id'] ?? null;

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
    <title>Visualização do funcionário</title>
</head>
<body>
    <h1><?php echo $user['email']; ?></h1>

    <p>O id deste usuário é <?php echo $user['id']; ?></p>

    <p>
        <a href="/editar.php?id=<?php echo $user['id']; ?>">editar</a>
        <a href="/remover.php?id=<?php echo $user['id']; ?>">remover</a>
    </p>

    <p><a href="/">voltar</a></p>
</body>
</html>