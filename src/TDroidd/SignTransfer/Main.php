<?php
namespace TDroidd\SignTransfer;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\plugin\PluginManager;
use shoghicp\FastTransfer;
use pocketmine\tile\Sign;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerInteractEvent;

class Main extends PluginBase implements Listener {
    public function onEnable(){
     if ($this->getServer()->getPluginManager()->getPlugin("FastTransfer")){
     $this->getLogger()->info("Enabling Add-On for FastTransfer");
	 $this->getServer()->getPluginManager()->registerEvents($this, $this);
     }
}

    public function playerBlockTouch(PlayerInteractEvent $event){
        if($event->getBlock()->getID() == 323 || $event->getBlock()->getID() == 63 || $event->getBlock()->getID() == 68){
            $sign = $event->getPlayer()->getLevel()->getTile($event->getBlock());
            if(!($sign instanceof Sign)){
                return;
            }
     	}
		if ($event->getItem()->getId() == Item::SIGN) {
			// Check if the user is holding a sign this stops teleports
			$pl = $event->getPlayer();
			$pl->sendMessage("Can not teleport while holding sign!");
			return;
		}
				if(!$pl->hasPermission("sign.transfer.touch")) {
			$pl = $event->getPlayer();
			$pl->sendMessage("Did you expect something to happen?");
			return;
		}
			$sign = $sign->getText();
            if($sign[0]=='[Transfer]'){
			$address = $sign[1];
			$port = $sign[2];
			if (empty($address)) return null;
			$port = intval($port);
			if ($port == 0) $port = 19132; // Default for Minecraft PE
			return [$address,$port];
		}
		$this->teleporters[$pl->getName()] = time();
		$ft = $this->getServer()->getPluginManager()->getPlugin("FastTransfer");
		if (!$ft) {
			$this->getLogger()->info("FastTransfer is not installed on this server");
			$pl->sendMessage("Nothing happens!");
			$pl->sendMessage("Someone has removed FastTransfer.");
			return;
		}
		$this->getLogger()->info("- Player:  ".$pl->getName()." => ".
										 $addr.":".$port);
		$ft->transferPlayer($pl,$addr,$port);
		if ($this->broadcast)
			$this->getServer()->broadcastMessage($pl->getName()." transferred...");
		}
	}
