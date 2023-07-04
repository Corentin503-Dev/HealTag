<?php

namespace Corentin503HTB;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    protected function onEnable(): void
    {
       $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $event)
    {
        $event->getPlayer()->setScoreTag($this->getHealthBar($event->getPlayer()->getHealth()));
    }

    public function onDamage(EntityDamageEvent $event)
    {
        if ($event->getEntity() instanceof Player) $event->getEntity()->setScoreTag($this->getHealthBar($event->getEntity()->getHealth()));
    }

    public function getHealthBar(int|float $heal): string
    {
        $heal = (int)$heal;
        $bar = "§a" . str_repeat("|", $heal) . "§c" . str_repeat("|", 20 - $heal);
        return $bar;
    }
}
