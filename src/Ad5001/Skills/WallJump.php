<?php
namespace Ad5001\Skills;

use pocketmine\Server;
use pocketmine\Player;

use Ad5001\Skills\Main;



class WallJump extends Skill {


    const name = "WallJump";


   public function __construct() {
       parent::__construct($this, true, 5);
       $this->getLogger()->info("Enabled !");
   }
 

   public function onTaskRun($tick) {
       $wb =  (\pocketmine\item\Item::fromString($this->getConfig()->get("WallJumpBlock")));
       foreach($this->getServer()->getOnlinePlayers() as $player) {
            if($player->getTargetBlock(1)->getId() == $wb->getId() and  $player->getTargetBlock(1)->getDamage()  == $wb->getDamage()) {
                $this->wallJump($player);
            }
       }
   }


   protected function wallJump($player) {
       $x = $player->getTargetBlock(1)->x;
       $z = $player->getTargetBlock(1)->z;
       if($x < $player->x) { // To set it to one in the direction
              $x += $player->x;
       }
       if($x > $player->x) {
              $x -= $player->x;
       }
       if($x < $player->x) {
              $x = 0;
       }
       if($z < $player->z) { // To set it to one in the direction
              $z += $player->z;
       }
       if($z > $player->z) {
              $z -= $player->z;
       }
       if($z < $player->z) {
              $z = 0;
       }

       $f = sqrt($x * $x + $z * $z);
		if($f <= 0){
			return;
		}

		$f = 1 / $f;

		$motion = $player->getMotion();

        $base = 3;

		$motion->x /= 2;
		$motion->y /= 2;
		$motion->z /= 2;
		$motion->x += $x * $f;
		$motion->y += $base;
		$motion->z += $z * $f;

        $player->setMotion($motion);

        $this->getLogger()->info($motion->x . "/" . $motion->y . "/" . $motion->z);
   }


}