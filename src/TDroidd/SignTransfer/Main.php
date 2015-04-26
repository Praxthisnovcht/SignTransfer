<?php
namespace TDroidd\SignTransfer;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\plugin\PluginManager;
use shoghicp\FastTransfer;
use pocketmine\tile\Sign;
use pocketmine\event\player\PlayerInteractEvent;
class Main extends PluginBase implements Listener {

    public function onEnable(){
     if ($this->getServer()->getPluginManager()->getPlugin("FastTransfer")){
     $this->getLogger()->info("Enabling Add-On for FastTransfer");
     }
}
     	if (isset($this->text["Transfer"][$sign[0]])) {
			// Fast transfer!
			if(!$pl->hasPermission("sign.transfer.place")) {
				$this->breakSign($pl,$tile,"You do not have permissions\nTto make a Transfer sign.");
				return;
				´}
     	}
     	
     		public function playerTouchIt(PlayerInteractEvent $event){
		if($event->getBlock()->getId() != Block::SIGN_POST &&
			$event->getBlock()->getId() != Block::WALL_SIGN) return;
		$pl = $event->getPlayer();
		$sign = $pl->getLevel()->getTile($event->getBlock());
		if(!($sign instanceof Sign)) return;
		$sign = $sign->getText();
		if (!isset($this->text["sign"][$sign[0]])) return;

		if(!$pl->hasPermission("sign.transfer.touch")) {
			$pl->sendMessage("Nothing happens...");
			return;
		}
		if ($event->getItem()->getId() == Item::SIGN) {
			// Check if the user is holding a sign this stops teleports
			$pl->sendMessage("Can not teleport while holding sign!");
			return;
		}
				if(!$pl->hasPermission("sign.transfer.touch")) {
			$pl->sendMessage("Did you expect something to happen?");
			return;
		}
		$this->teleporters[$pl->getName()] = time();
		$ft = $this->getServer()->getPluginManager()->getPlugin("FastTransfer");
		if (!$ft) {
			$this->getLogger()->info("FastTransfer is not installed on this server");
			$pl->sendMessage("Nothing happens!");
			$pl->sendMessage("Someone has removed FastTransfer.");
			return;
		}
		list($addr,$port) = $pos;
		$this->getLogger()->info("- Player:  ".$pl->getName()." => ".
										 $addr.":".$port);
		$ft->transferPlayer($pl,$addr,$port);
		if ($this->broadcast)
			$this->getServer()->broadcastMessage($pl->getName()." transferred...");
	}
}
