<?php

namespace ThoDak;

use pocketmine\player;
use pocketmine\server;
use pocketmine\plugin\pluginbase;
use pocketmine\command\command;
use pocketmine\command\commandsender;

class main extends PluginBase
{

	public function onenable()
	{

	}

	public function oncommand(commandsender $sender, command $cmd, string $label, array $args) : bool
	{

		switch($cmd->getname())
		{
			case "sbui":
			 if($sender Instanceof player)
			 {
			 	$this->ui($sender);
			 }
		}
		return true;
	}

	public function ui($player)
	{
		$form = $this->getserver()->GetPluginManager()->getplugin("FormAPI")->createsimpleform(function (player $player, int $data = null){
			if($data === null)
			{
				return true;
			}
			Switch($data)
			{
				case 0:
				    $this->Getserver()->dispatchcommand($player, "is create");
				    break;

				case 1:  
				    $this->Getserver()->dispatchcommand($player, "is join");
				    break; 

				case 2:  
				    $this->Getserver()->dispatchcommand($player, "is lock"); 
				    break;

				case 3:  
				    $this->visit($player); 
				    break;

				case 4:  
				    $this->Getserver()->dispatchcommand($player, "is leave"); 
				    break;

				case 5:  
				    $this->Getserver()->dispatchcommand($player, "is disband"); 
				    break;      
 
                case 6:  
				    $this->kick($player); 
				    break; 

				case 7:  
				    $this->promote($player); 
				    break;     

				case 8:  
				    $this->Getserver()->dispatchcommand($player, "is setspawn"); 
				    break;     

				case 9:  
				    $this->Getserver()->dispatchcommand($player, "Hub");
				    break;     

			}
		});
		$form->settitle("Galaxy SkyBlock Menu");
		$form->setcontent("» This is the SkyBlock Menu. Select what you want to do next down below. More functions coming soon.");
		$form->addbutton("» Create Island");
		$form->addbutton("» Teleport to your Island");
		$form->addbutton("» Lock or Unlock Island");
		$form->addbutton("» Visit an Island");
		$form->addbutton("» Leave Island");	
		$form->addbutton("» Delete Island");
		$form->addbutton("» Kick Player");
	        $form->addbutton("» Promote Player");
		$form->addbutton("» Island Setspawn");
		$form->addbutton("» Back to Hub"); 
		$form->sendtoplayer($player);
		return $form;
    }

    public function visit($player)
    {
    	$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function (Player $player, array $data = null){
			if($data === null)
		    {
		    	return True;
		    }
		    $this->getServer()->dispatchCommand($player, " is invite " . $data[0]);
		});
		$form->setTitle("Menu SkyBLock");
		$form->addInput("Type player name to visit");
		$form->sendToPlayer($player);
		return $form;
    }

    public function kick($player)
    {
    	$form = $this->getserver()->GetPluginManager()->getplugin("FormAPI")->createcustomform(function (player $player, array $data = null){
			if($data === null)
		    {
		    	return True;
		    }
		    $this->getServer()->dispatchCommand($player, "is fire " . $data[0]);
		});
		$form->settitle("Menu SkyBLock");
		$form->addinput("type player name to kick");
		$form->sendtoplayer($player);
		return $form;
    }

    public function promote($player)
    {
    	$form = $this->getserver()->GetPluginManager()->getplugin("FormAPI")->createcustomform(function (player $player, array $data = null){
			if($data === null)
		    {
		    	return True;
		    }
		    $this->Getserver()->dispatchcommand($player, "is Promote " . $data[0]);
		});
		$form->settitle("MenuSkyBLock");
		$form->addinput("Type player name to promote");
		$form->sendtoplayer($player);
		return $form;
    }


 }
