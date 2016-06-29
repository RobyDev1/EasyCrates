<?php

namespace EasyCrates;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
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
                                            if($sender->getInventory()->getItemInHand() == 341){
-                                               $sender->sendMessage(TF::BLUE . "You just opened an Uncommon Crate");
-                                               $sender->getInventory()->addItem(267,0,1);
-                                               $sender->getInventory()->addItem(301,0,1);
                                            } else {
                                                $sender->sendMessage(TF::RED . "The crate key must be in your hand to open this Uncommon Crate!");
                                            }
                                            break;
                                        case "common":
                                            if($sender->getInventory()->getItemInHand() == 341){
-                                               $sender->sendMessage(TF::BLUE . "You just opened a Common Crate");
-                                               $sender->getInventory()->addItem(317,0,1);
-                                               $sender->getInventory()->addItem(49,0,10);
                                            } else {
                                                $sender->sendMessage(TF::RED . "The crate key must be in your hand to open this Common Crate!");
                                            }
                                            break;
                                        case "legendary":
                                            if($sender->getInventory()->getItemInHand() == 341){
-                                               $sender->sendMessage(TF::BLUE . "You just opened a Legendary Crate");
-                                               $sender->getInventory()->addItem(276,0,1)
-                                               $sender->getInventory()->addItem(311,0,1)
                                            } else {
                                                $sender->sendMessage(TF::RED . "The crate key must be in your hand to open this Legendary Crate!");
                                            }
                                            break;
                                        default:
                                            $sender->sendMessage(TF::RED . "Usage: /crate open uncommon:common:legendary");
                                    }
                                }
                                break;
                            default:
                                $sender->sendMessage(TF::GREEN . "Usage: /crate open uncommon:common:legendary");
                        }
                    }
                }
                break;
        }
    }
}

