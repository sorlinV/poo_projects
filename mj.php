<?php
include_once 'player.php';
class mj {
    private $players;
    private $turn;

    function __construct($players) {
        $this->players = $players;
    }

    function affPlayerStats() {
        echo '<main>';
        foreach ($this->players as $player) {
            $player->affStats();
        }
        echo '</main>';
    }
    
    function affPlayer () {
        $this->players[$this->turn % count($this->players)]->html($this->players);
        echo "il y a " . count($this->players) . " joueurs";
    }
    
    function att ($playername) {
        foreach ($this->players as $player){
            if ($player->getName() == $playername) {
                $this->players[$this->turn % count($this->players)]->att($player);
            }
        }
        $this->turn++;
    }
    
    function heal ($playername) {
        foreach ($this->players as $player){
            if ($player->getName() == $playername) {
                $this->players[$this->turn % count($this->players)]->heal($player);
            }
        }
        $this->turn++;
    }
    
    function addPlayer ($player) {
        array_push($this->players, $player);
    }
}
