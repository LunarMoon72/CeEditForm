<?php

namespace LunarMoon72\EnchantCarnage;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;

use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI;

class Main extends PluginBase
{
	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
		switch($cmd->getName()){
			case "ecarnage":
			  if($sender instanceof Player){
			  	$sender->select($sender);
			  } else {
			  	$this->getLogger()->info("Go ingame to use this command");
			  }
		}
		return true;
	}
    public function select($player){
		$form = new SimpleForm(function(Player $player, $data){
			if($data === null){
				return true;
			}
    		switch($data){
    			case 0:
    			  $sender->weapon($sender);

    			break;

    			case 1:
    			  $sender->tool($sender);

    			break;
    		}
    	});
    	$form->setTitle("Select a Catagory");
    	$form->addButton("Weapon");
    	$form->addButton("Tools");
    	$form->sendToPlayer($player);
    	return $form;   
    }
    public function weapon($player){
    	$form = new CustomForm(function(Player $player, $data){
    		if($data === null){
    			return true;
    		}
    		switch($data){

    			case 0:
    			  $this->getServer()->dispatchCommand($player, "enchant " . $player->getName() . " sharpness " . $data[0]);

    			break;

    			case 1:
    			  $this->getServer()->dispatchCommand($player, "enchant " . $player->getName() . " unbreaking " . $data[1]);
    			break;

    			case 2:
    			  $this->getServer()->dispatchCommand($player, "enchant " . $player->getName() . " knockback " . $data[2]);
    			break;

    			case 3:
    			  $this->getServer()->dispatchCommand($player, "enchant " . $player->getName() . " fire_aspect " . $data[3]);
    			break;
    		}
    	});
    	$form->setTitle("Press an enchant");
    	$form->addSlider("Sharpness", 0, 10);
    	$form->addSlider("Unbreaking", 0, 5);
    	$form->addSlider("KnockBack", 0, 5);
    	$form->addSlider("Fire Aspect", 0, 5);
    	$form->sendToPlayer($player);
    	return $form;
    }
    public function tool($player){
    	$form = new CustomForm(function(Player $player, $data){
    		if($data === null){
    			return true;
    		}
    		switch($data){
    			case 0:
    			  $this->getServer()->dispatchCommand($player, "enchant " . $player->getName() . " efficency " . $data[0]);
    			break;

    			case 1:
    			  $this->getServer()->dispatchCommand($player, "enchant " . $player->getName() . " unbreaking " . $data[1]);
    			break;

    			case 2:
    			  $this->getServer()->dispatchCommand($player, "enchant " . $player->getName() . " fortune " . $data[2]);
    			break;
    		}
    	});
    	$form->setTitle("Select an Enchant");
    	$form->addSlider("Efficency", 0, 10);
    	$form->addSlider("Fortune", 0, 10);
    	$form->sendToPlayer($player);
    	return $form;
    }
}
