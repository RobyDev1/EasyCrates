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
        switch(strtolower($command->getName())){
            case "crate":
                if($sender instanceof Player){
                    $sender->sendMessage("Usage: /crate open uncommon:common:legendary");
                    if(isset($args[1]){
                        switch($args[0]){
                            case "open":
                                $sender->sendMessage(TF::RED . "Usage: /crate open uncommon:common:legendary");
                        }
                    }
                }
        }
    }
}
