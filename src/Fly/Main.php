<?php

namespace Fly;

use pocketmine\player\Player;
use pocketmine\Server;

use pocketmine\event\Listener as L;
use pocketmine\plugin\PluginBase as P;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

#libs
use libs\FormAPI\SimpleForm;

class Main extends P implements L {
  
  public $prefix = "§l§5Fly §r§7» ";
  
  public function onEnable(): void{
    
    $this->getServer()->getLogger()->info($this->prefix."Plugin Enable");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
    
  }
  
  public function onCommand(CommandSender $pl, Command $cmd, string $label, array $args): bool{
    switch($cmd->getName()){
      case "fly":
        if($pl->hasPermission("fly.cmd")){
          $this->getFly($pl);
        }else{
          
        }
      break;
    }
    return true;
  }
  
  public function getFly(Player $pl){
    
  }
}