<?php
namespace Ad5001\Skills;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginLogger;

use Ad5001\Skills\Main;



abstract class Skill implements Listener, Plugin  {


   public function __construct(Skill $skill, bool $takeTask = false, int $taskTick = 20) {
        $this->main = Server::getInstance()->getPluginManager()->getPlugin("Skills"); //One of the example why the plugin des not work when you change it's name'
        $this->takeTask = $takeTask;
        $this->skill = $skill;
        $this->taskTick = $taskTick;
        $this->description = new \pocketmine\plugin\PluginDescription(["name" => get_class($this->skill)::name, "version" => $this->main->getDescription()->getVersion(), "api" =>  $this->main->getDescription()->getCompatibleApis(), "main" =>  get_class($this->skill), "prefix" => explode("\\" ,get_class($this->skill))[count(explode("\\" ,get_class($this->skill))) - 1], "author" => "Ad5001"]);
        $this->logger = new PluginLogger($this);
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
        if(get_class($this->skill)::name == null) {
            throw new RuntimeExeption("Name not defined for " . get_class($this->skill));
        }
        if($this->takeTask) {
            Server::getInstance()->getScheduler()->scheduleRepeatingTask($this->task = new SkillTask($this->skill), $taskTick);
        }
    }


    public function onEnable() {}



    public function onDisable() {}


    public function getConfig() {
        return $this->main->getConfig();
    }


    public function saveDefaultConfig() {
        return $this->main->saveDefaultConfig();
    }


    public function isEnabled() {
        return true;
    }


    public function onLoad() {}


    public function getDataFolder() {
        return $this->main->getDataFolder();
    }


    public function isDisabled() {
        return false;
    }


    public function getDescription() {
        return $this->description;
    }


    public function getResource($resource) {
        return $this->main->getResource($resource);
    }


    public function saveResource($resource, $replace = false) {
        return $this->main->saveResource($resource, $replace);
    }


    public function saveConfig() {
        return $this->main->saveConfig();
    }


    public function reloadConfig() {
        return $this->main->reloadConfig();
    }


    public function getResources() {
        return $this->main->getResources();
    }


    public function getName() {
        return $this->getDescription()->getName();
    }


    public function getServer() {
        return $this->main->getServer();
    }


    public function getLogger() {
        return $this->logger;
    }


    public function getTask() {
        return $this->task;
    }


    public function getPluginLoader() {
        return $this->main->getPluginLoader();
    }


    public function onCommand(\pocketmine\command\CommandSender $sender, \pocketmine\command\Command $cmd, $label, array $args) {}


    public function onTaskRun($tick) {$this->getLogger()->info("Default skill task running !");}

}