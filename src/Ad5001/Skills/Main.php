<?php
namespace Ad5001\Skills;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use Ad5001\Skills\dummy8;
use Ad5001\Skills\dummy7;
use Ad5001\Skills\dummy6;
use Ad5001\Skills\dummy5;
use Ad5001\Skills\dummy4;
use Ad5001\Skills\dummy3;
use Ad5001\Skills\dummy2;
use Ad5001\Skills\dummy1;


class Main extends PluginBase{


   public function onEnable(){
        $this->reloadConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }


    public function onLoad(){
        $this->saveDefaultConfig();
    }


    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        switch($cmd->getName()){
            case "default":
            break;
        }
     return false;
    }
}