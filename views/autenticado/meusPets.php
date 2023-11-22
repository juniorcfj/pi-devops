

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/meusPets.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Listagem de Pets</title>
</head>
<body>
<header>
      <ul>
          <a href='../../views/autenticado/home.php'> <li>
          <img src='../../assets/imgs/Adote-um-Amor-2.svg' alt=''class='logo'>
          </li></a> 
          </ul>
          <div class='dropdown'> 
          <div class='perfil-img' style='display:flex; align-items:center; justify-content:center;'>      
    <li class='dropdown-btn'>Perfil</li>
    <svg xmlns='http://www.w3.org/2000/svg' style='width:10px; color:green;' viewBox='0 0 320 512'><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z'/ ></svg>
    </div>
    <ul class='dropdown-menu'>
    <a href='#'><li>Perfil</li></a>
    <a href='../../assets/php/logout.php'><li>Sair</li></a>
    </ul>
  </div> 
  </header>
    <h1>Listagem de Pets para adoção</h1>
    
    <?php 
    require '../../assets/php/listarPets.php';
    listarPets(); ?>

</body>
</html>
<script>
  const dropdownBtn = document.querySelector('.dropdown-btn');
const dropdownMenu = document.querySelector('.dropdown-menu');

dropdownBtn.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

window.addEventListener('click', (event) => {
  if (!event.target.matches('.dropdown-btn') && !event.target.matches('.dropdown-menu')) {
    dropdownMenu.classList.remove('show');
  }
});


</script>