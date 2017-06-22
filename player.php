<?php
class player {
    private $name;
    private $hp;
    private $hpMax;

    function __construct($name, $hpMax) {
        $this->name = $name;
        $this->hp = $hpMax;
        $this->hpMax = $hpMax;
    }

    function affStats() {
        echo '<article class="player">';
            echo '<p>' . $this->name . ' ' . $this->hp . '/' . $this->hpMax . 'HP</p>';
        echo '</article>';
    }
    
    function att(player $player) {
        $player->get_dmg(5);
    }

    function heal(player $player) {
        $player->get_heal(5);
    }
    
    function get_dmg(int $dmg) {
        $this->hp -= $dmg;
        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }
    
    function get_heal(int $soin) {
        $this->hp += $soin;
        if ($this->hp > $this->hpMax) {
            $this->hp = $this->hpMax;
        }
    }
    
    function html($players) {
        echo $this->name;
        echo '<form method="POST">';
        echo '<label for="enemy">attack :</label></br>';
        foreach ($players as $player){
            echo '<input type="submit" name="attacked" value="' . $player->getName() . '"/>';
        }
        echo '</br><label for="enemy">heal :</label></br>';
        foreach ($players as $player){
            echo '<input type="submit" name="healed" value="' . $player->getName() . '"/>';
        }
        echo '</form>';
    }
    
    function getName() {
        return $this->name;
    }
}
