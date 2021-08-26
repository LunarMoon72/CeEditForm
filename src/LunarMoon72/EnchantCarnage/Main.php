<?php

namespace LunarMoon72\EnchantCarnage;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase
{
	public function onEnabled(){
		$this->getLogger()->info("Plugin Enabled");
	}
	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
		switch($cmd->getName()){
			case "cmd":
			  if(!$sender instanceof Player){
			  	$this->getLogger()->info("Use this ingame!");			  
			  } else {
			  	$sender->newfunction($sender);
			  }

		}
		return true;
	}
	public function newfunction($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createCustomForm(function(Player $player, int $data = null){
			if($data === null){
				return true;
			}
			switch($data){
               case 0:
                  $this->dispatchCommand("rca " . $player . "ce enchant driller " . $data[0]);
               break;

               case 1:
                  $this->dispatchCommand("rca " . $player . "ce enchant deathbringer " . $data[1]);
               break;
			}
		});
		$form->setTitle("Select an Enchant");
		$form->addSlider("Driller", 0, 10);
		$form->addSlider("Death Bringer", 0, 10);
		$form->sendToPlayer();
		return $form;
	}
}
