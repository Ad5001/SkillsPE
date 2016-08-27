<?php
namespace Ad5001\Skills;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;

use Ad5001\Skills\Main;



class SkillTask extends PluginTask {


   public function __construct(Skill $main) {
        $plugin = Server::getInstance()->getPluginManager()->getPlugin("Skills"); //One of the example why the plugin des not work when you change it's name
        $this->main = $main;
        parent::__construct($plugin);
    }


    public function onRun($tick) {
        $this->main->onTaskRun($tick);
    }


}