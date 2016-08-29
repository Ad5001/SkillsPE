<?php
namespace Ad5001\Skills;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;


class Main extends PluginBase implements Listener{


   public function onEnable(){
        $this->reloadConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->enablePlugin(new WallJump());
        $this->getServer()->getPluginManager()->enablePlugin(new Timber());
        $this->getServer()->getPluginManager()->enablePlugin(new WallWalk());
    }


    public function onLoad(){
        $this->saveDefaultConfig();
    }
}