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
    
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if($cmd->getName() == "crate"){
            if($sender instanceof Player){
                if(count($args) == 2){
                    if($args[0] == "open"){
                        if($args[1] == "uncommon"){
                            if($sender->getInventory()->getItemInHand()->getId() == 341){
                               $sender->sendMessage(TF::BLUE . "You just opened an Uncommon Crate");
                               $sender->getInventory()->addItem(Item::get(267,0,1));
                               $sender->getInventory()->addItem(Item::get(301,0,1));
                               } 
                               else {
                                    $sender->sendMessage(TF::RED . "The crate key must be in your hand to open this Uncommon Crate!");
                                }
                        }
                        if($cmd->getName() == "common"){
                            if($sender->getInventory()->getItemInHand()->getId() == 341){
                               $sender->sendMessage(TF::BLUE . "You just opened a Common Crate");
                               $sender->getInventory()->addItem(Item::get(317,0,1));
                               $sender->getInventory()->addItem(Item::get(49,0,1));
                               } 
                               else {
                                $sender->sendMessage(TF::RED . "The crate key must be in your hand to open this Common Crate!");
                               }
                        }
                        if($cmd->getName() == "legendary"){
                            if($sender->getInventory()->getItemInHand()->getId() == 341){
                               $sender->sendMessage(TF::BLUE . "You just opened a Legendary Crate");
                                $sender->getInventory()->addItem(Item::get(276,0,1));
                                $sender->getInventory()->addItem(Item::get(311,0,1));
                                }
                                else {
                                $sender->sendMessage(TF::RED . "The crate key must be in your hand to open this Legendary Crate!");
                                }
                        }
                    }
                    else{
                        $sender->sendMessage("Usage: /crate open uncommon:common:legendary");
                    }
                }
                else{
                    $sender->sendMessage("Usage: /crate open uncommon:common:legendary");
                }
            }
            else{
                $sender->sendMessage("Run command in game!");
            }
        }
    }
}
