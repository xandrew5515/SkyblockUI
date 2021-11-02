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
				    $this->Getserver()->dispatchcommand($player, "hub");
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
		$form->setTitle("Visit another Island");
		$form->addInput("» To visit another island, please insert the island founder name down below.");
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
		$form->settitle("Kick a member from your island");
		$form->addinput("» To continue, please insert the player name from your island that you want to kick down below.");
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
		$form->settitle("Promote a member from your island");
		$form->addinput("» To continue, please insert the player name from your island that you want to kick down below.");
		$form->sendtoplayer($player);
		return $form;
    }


 }
