<?php
require_once("../../../Model/Demande.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <title>Document</title>
</head>
<body>
    <nav class="side-nav">
      <div class="wrapper">
        <div class="three-dots-container">
          <div class="dot d1"></div>
          <div class="dot d2"></div>
          <div class="dot d3"></div>
        </div>
        <div class="nav-bloc n-1">
          <img src="img/letters.png" alt=""width="40px"height="40px" srcset="">
            <path
              d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zM332.1 128H256V51.9l76.1 76.1zM48 464V48h160v104c0 13.3 10.7 24 24 24h104v288H48z"
            ></path>
          </svg>
          <div class="sub-nav">
            <h2>Nouveau</h2>
            <ul>
              <li>
                <a href="Demande.php">Faire une demande d'achat</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="nav-bloc n-2">
          <img src="img/loading.png" alt="" width="40px"height="40px" srcset="">
            <path
              d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0 112 64.5 112 144s64.5 144 144 144zm128 32h-55.1c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16H128C57.3 320 0 377.3 0 448v16c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48v-16c0-70.7-57.3-128-128-128z"
            ></path>
          </svg>
          <div class="sub-nav">
            <h2>Situation</h2>
            <ul>
              <li>
                <a href="../Requete/Progression.php">Voir la Situation de votre Demande</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="nav-bloc n-3">
          <img src="img/gmail.png" alt="" width="40px"height="40px" srcset="">
            <path
              d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0 112 64.5 112 144s64.5 144 144 144zm128 32h-55.1c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16H128C57.3 320 0 377.3 0 448v16c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48v-16c0-70.7-57.3-128-128-128z"
            ></path>
          </svg>
          <div class="sub-nav">
            <h2>E-mail</h2>
            <ul>
              <li>
                <a href="../../../Mail/Message.php">Envoyer un E-mail</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <main class="main-content">
      <h1>Boite de reception</h1>
      <p>Ici s'affichera les demandes envoyer au Departement Achat et les demande recu par le departement Achat.</p>
      <form action="" method="post"><p><input type="text"name="dm_nom">
    <input type="submit" value="Afficher"></p></form><hr>
    <?php
    if(isset($_POST['dm_nom'])){
      extract($_POST);
      $dm = new Demande();
      $dm -> setDmNom($dm_nom);
      $dm -> afficher();
    }
    ?>
    </main>
</body>
</html>