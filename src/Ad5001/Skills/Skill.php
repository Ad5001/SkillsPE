<?php
namespace Ad5001\Skills;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use Ad5001\Skills\Main;



abstract class Skill extends PluginBase implements Listener  {


   public function __construct(Skill $skill, bool $takeTask = false, int $taskTick = 20) {
        $main = Server::getInstance()->getPluginManager()->getPlugin("Skills"); //One of the example why the plugin des not work when you change it's name'
        parent::__construct($main);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if(get_class($skill)::name == null) {
            throw new RuntimeExeption("Name not defined for " . get_class($skill));
        }
        if($takeTask) {
            $this->getServer()->getScheduler()->scheduleRepeatingTask($this->task = new SkillTask($this), $taskTick);
        }
    }



    public function getTask() {
        return $this->task;
    }

}