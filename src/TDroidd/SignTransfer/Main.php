<?php
namespace TDroidd\SignTransfer;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\plugin\PluginManager;
use shoghicp\FastTransfer;
class Main extends PluginBase implements Listener {
