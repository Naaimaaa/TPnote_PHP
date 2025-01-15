<?php
namespace global\header
?>

<style>

    body {
        font-family: Arial, sans-serif;
        line-height: 2 ;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        margin : 0;
        background-color : #43319D;
        width : 100%;
        position : fixed;
        top : 0;
        left: 0;
        z-index: 1000;
        filter : drop-shadow(0px 0px 4px);
    }

    a {
        text-decoration: none;
        color : white;
        height : 10px;
        width : auto;
        margin: 10px 80px; 
        
    }

    a:hover {
        font-weight : bold;
    }




    @media (max-width: 768px) {
    nav {
        display: none;
    }
    .user-space, .logo {
        margin: 0 auto;
    }
    }

    .user-space {
        display: flex;
        align-items: stretch;
    }

    .user-space img {
        height : 50px;
        width : auto;
    }
    

</style>
<header>
    <div class="logo">
        <a href="accueil.php">
            <img src="#" alt="logo">
        </a>
       </div>
    <nav>
        <a href="#"> Statistiques </a>
        <a href="#"> Mes quiz </a>
        <a href="#"> Contact </a>
    </nav>
    <div class="user-space">
        <img src="img/user.webp" alt="icone-user">
        <a href="#"> Mon compte</a>
    </div>
</header>