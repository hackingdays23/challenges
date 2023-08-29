<?php
// Inicialize as variáveis
$nomeUsuario = '';
$senha = '';
$mensagemErro = '';

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os valores do formulário
    $nomeUsuario = $_POST['nomeUsuario'];
    $senha = $_POST['senha'];

    // Verifique as credenciais
    if ($nomeUsuario === 'admin' && $senha === 'sup3r_1337') {
        // Autenticação bem-sucedida para o usuário "admin"
        session_start();
        $_SESSION['nomeUsuario'] = $nomeUsuario;
        echo "iFlag{N1c3_t0_b3_4dm1n}";
        exit();
    } else {
        // Autenticação falhou
        $mensagemErro = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Store super 1337</title>
    <!-- remember to change this: U15xVDGOL0OLOGmTS10`VDKKQU18QU18Bf<< -->
    <!-- do you think you are a cyberchef? uhuu nice haha -->
    
    <style>
        body {
            background-color: #000;
            font-family: 'Arial', sans-serif;
            color: #ff0000;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 36px;
            color: #ff0000;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
        }

        label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
            color: #ff0000;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 0, 0, 0.2);
            color: #ff0000;
            outline-color: #ff0000;
        }

        input[type="submit"] {
            background-color: #ff0000;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ff3333;
        }

        p.error-message {
            color: #ff0000;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="post" action="">
            <label for="nomeUsuario">User:</label>
            <input type="text" id="nomeUsuario" name="nomeUsuario" value="<?php echo htmlspecialchars($nomeUsuario); ?>">

            <label for="senha">Password:</label>
            <input type="password" id="senha" name="senha">

            <input type="submit" value="Login">
        </form>
        <p class="error-message"><?php echo $mensagemErro; ?></p>
    </div>
</body>
</html>
