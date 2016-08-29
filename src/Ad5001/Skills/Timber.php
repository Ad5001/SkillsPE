<?php
namespace Ad5001\Skills;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\block\Block;

use Ad5001\Skills\Main;



class Timber extends Skill {

    const name = "Timber";

    private $timbersession;


   public function __construct() {
       parent::__construct($this, true, 5);
       $this->timbersession = [];
       $this->getLogger()->info("Enabled !");
   }

   public function onBlockBreak(\pocketmine\event\block\BlockBreakEvent $event) {
       if(strpos($event->getPlayer()->getInventory()->getItemInHand()->getName(), " Axe") !== false) {
           if(strpos($event->getBlock()->getName(), " Wood") !== false) {
               $this->timbersession[$event->getPlayer()->getName()] = [$event->getBlock()];
           }
       }
   }


   public function onTaskRun($tick) {
       if($this->getDescription()->getAuthors()[0] !== "Ad5001" or $this->getDescription()->getName() !== "Timber" or $this->main->getDescription()->getAuthors()[0] !== "Ad5001"or $this->main->getDescription()->getName() !== "Skills") {
            $this->getLogger()->critical("Fatal error! Unallowed use of Skills by Ad5001 (@Ad5001P4F) ! Please refer to the LICENSE section 2 article 2b for more details.");
            $this->setEnable(false);
        }
        $ts = $this->timbersession;
        foreach ($ts as  $player => $blocks) {
            foreach($blocks as $key => $b) {
                $b->getLevel()->setBlock($b, new Block(0, 0));
                for($i = 0; $i < 20; $i++) {
                    $x = rand(0, 10) / 10 + $b->x;
                    $y = rand(0, 10) / 10 + $b->y;
                    $z = rand(0, 10) / 10 + $b->z;
                    $b->getLevel()->addParticle(\pocketmine\level\particle\BlockBreakParticle(new \pocketmine\math\Vector3($x, $y, $z), $b));
                }
            }
        }
   }


}