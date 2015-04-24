<?php
namespace TDroidd\SignTransfer;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\plugin\PluginManager;
use shoghicp\FastTransfer;
class Main extends PluginBase implements Listener {
	/**
	 * OnEnable
	 *
	 * (non-PHPdoc)
	 * 
	 * @see \pocketmine\plugin\PluginBase::onEnable()
	 */	
		public function onEnable(){
			$this->saveDefaultConfig();
            $this->getLogger()->info(TextFormat::GREEN . "SignTransfer 1.0 Enabled!");
		if ($this->getServer()->getPluginManager()->getPlugin("FastTransfer")){
			$this->getLogger()->info("Enabling Add-On for FastTransfer");
		}else{
			$this->getLogger()->info("Disabling Add-On for FastTransfer");
		}
		function playerTouchIt(PlayerInteractEvent $event){
		$p = $event->getPlayer();
		$this->transfer[$p->getName()] = time();
		$tr = $this->getServer()->getPluginManager()->getPlugin("FastTransfer");
		if (isset($this->text["transfer"][$sign[0]])) {
			$address = $sign[1];
			$port = $sign[2];
			if (empty($addr)) return null;
			$port = intval($port);
			if ($port == 0) $port = 19132; // Default Port
			return [$address,$port];
			$p->sendMessage(TextFormat::RED . "Unexpected error");
		}
	}
		$tr = $this->getServer()->getPluginManager()->getPlugin("FastTransfer");
		if (!$tr) {
			$this->getLogger()->info("FastTransfer plugin is not installed.");
			$p->sendMessage("FastTransfer not found...!");
			return;
		}
		$tr = $this->getServer()->getPluginManager()->getPlugin("FastTransfer");
		list($addr,$port) = $tr
		$tr->transferPlayer($p,$addr,$port);
		if ($this->broadcast)
		$this->getServer()->broadcastMessage($pl->getName()." transferred...");
			}
		}
