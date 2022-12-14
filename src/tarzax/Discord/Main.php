<?php

namespace tarzax\Discord;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

    public function onEnable(): void
    {
        $this->getLogger()->notice("TarzaxDiscord has been successfully activated");
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        $commandname = $command->getName();
        if ($commandname = "discord"){
            if($sender instanceof Player){
                if($sender->sendMessage($this->getConfig()->get("DiscordLink")));
            }
        }
        return true;
    }
}