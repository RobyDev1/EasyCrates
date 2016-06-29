<?php

namespace EasyCrates;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener {
    
    public function onEnable() {
        $this->getLogger()->info(TF::BLUE . "[EasyCrates] Enabled");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        switch($command->getName()){
            case "crate":
                if($sender instanceof Player) {
                    $sender->sendMessage(TF::AQUA . "Usage: /crate open {uncommon:vote:key}");
                }
        }
    }
}
