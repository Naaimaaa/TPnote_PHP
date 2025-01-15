<?php
namespace global\header
?>

<style>

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin : 0;
        padding : 0;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color : #43319D;
        width : 100%;
        position : fixed;
        top : 0;
        left: 0;
        z-index: 1000;
        filter : drop-shadow(0px 0px 4px);
    }

    .logo img {
        height: 40px;
        width: auto;
    }

    nav {
        display: flex;
        gap: 20px;
    }

    nav a {
        text-decoration: none;
        color : white;
        font-size: 16px;
        transition: font-weight 0.3s ease;
    }

    nav a:hover {
        font-weight : bold;
    }

    .user-space {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-right: 30px;
    }

    .user-space img {
        height : 40px;
        width : auto;
    }

    .user-space a {
        text-decoration: none;
        color: white;
        font-size : 16px;
        line-height: 1;
        margin: 0;
        padding: 5px 10px;
        display: inline-block;
    }


    /* Responsiveness du site */

    .burger-menu {
        display: none;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
    }

    .burger-menu div {
        width: 25px;
        height: 3px;
        background-color: white;
    }

    @media (max-width: 768px) {
        nav {
            display: none; /* Cache le menu par défaut */
            flex-direction: column;
            gap: 10px;
            background-color: #43319D;
            position: absolute;
            top: 70px;
            left: 0;
            width: 100%;
            padding: 20px;        
        }

        .burger-menu {
            display: flex;
        }

        nav.show {
            display: flex;
        }
    } 

</style>
<script>
    function toggleMenu() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('show');
    }
</script>
<header>
    <div class="logo">
        <a href="accueil.php">
            <img src="#" alt="logo">
        </a>
    </div>
    <div class="burger-menu" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <nav id="menu">
        <a href="../statistiques.php"> Statistiques </a>
        <a href="#"> Mes quiz </a>
        <a href="#"> Contact </a>
    </nav>
    <div class="user-space">
        <img src="img/user.webp" alt="icone-user">
        <a href="#"> Mon compte</a>
    </div>
</header>