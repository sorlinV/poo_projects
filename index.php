<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MJGame</title>
        <style>
            .player {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            session_start();
            include_once 'player.php';
            include_once 'mj.php';
            
            if (isset($_SESSION['mj'])) {
                $mj = unserialize($_SESSION['mj']);
            } else {
                $player1 = new player("LOUIS", 42);
                $player2 = new player("JEAN", 42);
                $mj = new mj([$player1, $player2]);
            }
            if (isset($post['attacked'])) {
                $mj->att($post['attacked']);
            } elseif (isset($post['healed'])) {
                $mj->heal($post['healed']);
            }
            if (isset($post['name']) && isset($post['hp'])) {
                $newplayer = new player($post['name'], intval($post['hp']));
                $mj->addPlayer($newplayer);
            }
            
            $mj->affPlayerStats();
            $mj->affPlayer();
            $_SESSION['mj'] = serialize($mj);
        ?>
        <form method="POST">
            <label>Ajouter un Joueur</label>
            <input type="text" name="name" placeholder="Name"/>
            <input type="text" name="hp" placeholder="HP"/>
            <input type="submit" value="Ajouter" />
        </form>
    </body>
</html>
