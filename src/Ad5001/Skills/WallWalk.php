<?php
namespace Ad5001\Skills;

use pocketmine\Server;
use pocketmine\Player;

use Ad5001\Skills\Main;



class WallWalk extends Skill {

    const name = "WallWalk";


   public function __construct() {
       parent::__construct($this, true, 1);
       $this->getLogger()->info("Enabled !");
   }



   public function onTaskRun($tick) {
       $wb =  (\pocketmine\item\Item::fromString($this->getConfig()->get("WallWalkBlock")));
       foreach($this->getServer()->getOnlinePlayers() as $player) {
            if($player->getTargetBlock(1)->getId() == $wb->getId() and  $player->getTargetBlock(1)->getDamage()  == $wb->getDamage() and $player->distance($player->getTargetBlock()) == 1) {
                $this->wallWalk($player);
            }
       }
   }
 

   protected function wallWalk(Player $player) {
		$f = 1 / $f;

		$motion = $player->getMotion();

		$motion->y = 0;

        $player->setMotion($motion);
   }

}