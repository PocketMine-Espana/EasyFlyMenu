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
    $form = new SimpleForm(function (Player $pl, int $data = null){
      if($data === null){
        return true;
      }
      switch($data){
        case 0:
          $pl->setAllowFlight(true);
          $pl->setFlying(true);
          $pl->sendMessage($this->prefix."Fly Activado");
        break;
        case 1:
          $pl->setAllowFlight(false);
          $pl->setFlying(false);
          $pl->sendMessage($this->prefix."Fly Desactivado");
        break;
      }
    });
    $form->setTitle("§l§5Fly Menu");
    $form->addButton("§l§5FLY ON");
    $form->addButton("§l§5FLY OFF");
    $form->addButton("§l§4SALIR",0,"textures/ui/redX1");
    $form->sendToPlayer($pl);
    return $form;
  }
}
