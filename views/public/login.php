<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="../../assets/js/login.js"></script>
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
<img src="../../assets/imgs/banner-login.png" alt="">
    <section class="login" >
        <h1>Faça seu login</h1>
        <p>Para divulgar ou adotar um animalzinho, você precisa ter um cadastros</p>
       
        <form action="../../assets/php/validaLogin.php" method="POST">
        <div class="input-data">
         <label for="email">E-mail</label>
         <input type="text" placeholder="Digite seu e-mail" name="email">
        </div>
        <div class="input-data">
         <label for="email">Senha</label>
         <input type="password" placeholder="Digite sua senha" name="senha">
        </div>
        <input type="submit" value="Entrar" class="btn-entrar" onclick="login()">
        <a href="../../views/public/cadastro.php"><input type="button" value="Cadastre-se" class="btn-cadastro"></a>
        <?php
        session_start();

        if (isset($_SESSION['erro'])) {
            echo '<div class="mensagem-erro">' . $_SESSION['erro'] . '</div>';
            unset($_SESSION['erro']);
        }
        ?>
        </form>
    </section>
</body>
</html>
