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
        if ($event->getEntity() instanceof Player) $event->getEntity()->setScoreTag($this->getHealthBar($event->getPlayer()->getHealth()));
    }

    public function getHealthBar(int|float $heal): string
    {
        $string = "";

        $heal = (int)$heal;

        switch ($heal) {
            case 0:
                $string = "§c||||||||||||||||||||";
                break;
            case 1:
                $string = "§a|§c|||||||||||||||||||";
                break;
            case 2:
                $string = "§a||§c||||||||||||||||||";
                break;
            case 3:
                $string = "§a|||§c|||||||||||||||||";
                break;
            case 4:
                $string = "§a||||§c||||||||||||||||";
                break;
            case 5:
                $string = "§a|||||§c|||||||||||||||";
                break;
            case 6:
                $string = "§a||||||§c||||||||||||||";
                break;
            case 7:
                $string = "§a|||||||§c|||||||||||||";
                break;
            case 8:
                $string = "§a||||||||§c||||||||||||";
                break;
            case 9:
                $string = "§a|||||||||§c|||||||||||";
                break;
            case 10:
                $string = "§a||||||||||§c||||||||||";
                break;
            case 11:
                $string = "§a|||||||||||§c|||||||||";
                break;
            case 12:
                $string = "§a||||||||||||§c||||||||";
                break;
            case 13:
                $string = "§a|||||||||||||§c|||||||";
                break;
            case 14:
                $string = "§a||||||||||||||§c||||||";
                break;
            case 15:
                $string = "§a|||||||||||||||§c|||||";
                break;
            case 16:
                $string = "§a||||||||||||||||§c||||";
                break;
            case 17:
                $string = "§a|||||||||||||||||§c|||";
                break;
            case 18:
                $string = "§a||||||||||||||||||§c||";
                break;
            case 19:
                $string = "§a|||||||||||||||||||§c|";
                break;
            case 20:
                $string = "§a||||||||||||||||||||§c";
                break;
        }
        return $string;
    }
}