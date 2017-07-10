<?php

// @Team Tesseract
// @Author Rateek

namespace pocketmine\command\defaults;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;

class ClearCommand extends VanillaCommand {

    /**
     * ClearCommand constructor.
     * @param string $name
     */
    public function __construct($name){
        parent::__construct($name);
        $this->setPermission("pocketmine.command.clear");
    }

    /**
     * @param CommandSender $sender
     * @param string $currentAlias
     * @param array $args
     * @return mixed|void
     */
    public function execute(CommandSender $sender, $currentAlias, array $args){
        if(!$this->testPermission($sender)){
            return true;
        }elseif($sender instanceof ConsoleCommandSender){
            $sender->sendMessage(TextFormat::DARK_RED . "Don't use the command with console.");
        }else{
            $sender->getInventory()->clearAll();
            $sender->sendMessage(TextFormat::GREEN . "Succesfully cleared your inventory");
        }
        return true;
    }
}
