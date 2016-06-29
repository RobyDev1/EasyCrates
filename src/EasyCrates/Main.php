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
                    $sender->sendMessage("Run command in game!");
                } else {
                    if(!isset($args[0])){
                        $sender->sendMessage("Usage: /crate open uncommon:common:legendary");
                    } else {
                        switch($args[0]){
                            case "open":
                                if(!isset($args[1])){
                                    $sender->sendMessage("Usage: /crate open uncommon:common:legendary");
                                } else {
                                    switch($args[1]){
                                        case "uncommon":
                                            //Do something here
                                            break;
                                        case "common":
                                            //Do something here
                                            break;
                                        case "legendary":
                                            //Do something here
                                            break;
                                        default:
                                            $sender->sendMessage(TF::RED . "Usage: /crate open uncommon:common:legendary");
                                    }
                                }
                                break;
                            default:
                                $sender->sendMessage("Usage: /crate open uncommon:common:legendary");
                        }
                    }
                }
                break;
        }
    }
}

