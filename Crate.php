<?php
namespace GolemCrate\Dew\Commands;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\inventory\Inventory;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;

class crate extends PluginBase implements CommandExecutor{
	      public function __construct($plugin){
	           $this->plugin = $plugin;
		}
		public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		     $cmd = strtolower($command->getName());
		     switch($cmd){
		        case "gcrate":
		              if($sender instanceof Player){
			              $inv = $sender->getInventory();
			              $it = Item::get(131,0,1);
			              $it->setCustomName("§bGkey §7don't put in chest or throw");
			              if($inv->contains($it)){
				              $level = $sender->getLevel();
				              $player = $sender->getName();
				              $inv->removeItem($it);
				              $result = rand(1,3);
					          switch($result){
			                case 1:
			                     $command = "lagg clear";
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), $command);
				                $sender->sendMessage("§b------------");
				                $sender->sendMessage("§bGcrate > §aYou won 500 Money!");
				                $sender->sendMessage("§b------------");
				             break;
				             case 2:
				                $i = Item::get(19,0,1);
				                $i->setCustomName("500 Money");
				                $e = Item::get(19,0,1);
				                $e->setCustomName("500 Money.");
				                $en = Enchantment::getEnchantment(1);
				                $en->setLevel(4);
				                $i->addEnchantment($en);
				                $e->addEnchantment($en);
				                $inv->addItem($i);
				                $inv->addItem($e);
				                $sender->sendMessage("§b------------");
				                $sender->sendMessage("§bGcrate > §aYou won 1000 Money!");
				                $sender->sendMessage("§b------------");
				             break;
				             case 3:
				                $i = Item::get(276,0,1);
                                    $i->setCustomName("§bDiam Sword");
                                    $inv->addItem($i);
      			                $sender->sendMessage("§bGcrate > §aYou won Diamond Sword");
				             break;
				    }
				}else{
				               $sender->sendMessage("§e[Gcrate] §fyou need a Gkey!");
			    	}
				}else{
				               $sender->sendMessage("§cRun this command on Game!");
				}
			}
		}
	}
