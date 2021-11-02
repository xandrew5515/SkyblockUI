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
		$form->settitle("§bSky§1Block §eMenu");
		$form->setcontent("§6» »eThis is the »6SkyBlock Menu. §eSelect what you want to do next down below. §6More functions cooming soon.");
		$form->addbutton("§1» §aCreate Island §e[TAP]");
		$form->addbutton("§1» §dTeleport to your Is §e[TAP]");
		$form->addbutton("§1» §cLock or Unlock Is §e[TAP]");
		$form->addbutton("§1» §2Visit an Is §e[TAP]");
		$form->addbutton("§1» §5Leave Island §e[TAP]");	
		$form->addbutton("§1» §4Delete Island §e[TAP]");
		$form->addbutton("§1» §3Kick Player §e[TAP]");
	        $form->addbutton("§1» §bPromote Player §e[TAP]");
		$form->addbutton("§1» §6Setspawn §e[TAP]");
		$form->addbutton("§1» §0Back to Spawn §a[TP]"); 
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
