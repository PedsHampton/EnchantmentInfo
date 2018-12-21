<?php
namespace EnchantmentInfo;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
class EnchantmentInfo extends PluginBase implements Listener{
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
        $this->getLogger()->info("EnchantmentInfo Plugin Enabled By PedsHampton");
    }
    public function onDisable(): void{
        $this->getLogger()->info("EnchantmentInfo Plugin Disabled By PedsHampton");
    }
    public function checkDepends(): void{
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("EnchantmentInfo Requires FormAPI To Work");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "enchantmentinfo"){
            if(!($sender instanceof Player)){
                $sender->addTitle("§a§lEnchantmentInfo\n§a§lBy\n§a§lPedsHampton\n§a§lClosing", false);
                return true;
            }
            $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $sender, $data){
                $result = $data;
                if ($result == null) {
                }
                switch ($result) {
                    case 0:
                        $sender->addTitle("§a§lEnchantmentInfo\n§a§lBy\n§a§lPedsHampton\n§a§lClosing");
                        break;
                    case 1:
                        $sender->addTitle("§a§lEnchantmentInfo\n§a§lBy\n§a§lPedsHampton\n§a§lClosing");
                        break;
                }
            });
            $form->setTitle("§a§lEnchantmentInfo By PedsHampton");
            $form->setContent("§b§lEnchantmentInfo Below\n§0§lProtection\n§0§lReduces Most Types Of Damage\n§1§lFire Protection\n§1§lReduces Fire Damage\n§2§lFeather Falling\n§2§lReduces Fall Damage\n§3§lBlast Protection\n§3§lReduces Explosion Damage\n§5§lProjectile Protection\n§5§lReduces Projectile Damage\n§6§lThorns\n§6§lDamages Attackers\n§7§lRespiration\n§7§lExtends Underwater Breathing Time\n§0§lDepth Strider\n§0§lIncreases Underwater Movement Speed\n§9§lAqua Affinity\n§9§lIncreases Underwater Mining Rate\n§a§lSharpness\n§a§lIncreases Damage\n§b§lSmite\n§b§lIncreases Famage To Undead Mobs\n§c§lBane Of Athropods\n§c§lIncreases Damage To Arthropods\n§d§lKnockback\n§d§lIncreases Knockback\n§e§lFire Aspect\n§e§lSets Target On Fire\n§f§lLooting\n§f§lIncreases Mob Loot\n§0§lEfficiency\n§0§lIncreases Mining Speed\n§1§lSilk Touch\n§1§lMined Blocks Drop Themselves\n§2§lUnbreaking\n§2§lIncreases Effective Durability\n§3§lFortune\n§3§lIncreases Block Drops\n§4§lPower\n§4§lIncreases Arrow Damage\n§5§lPunch\n§5§lIncreases Arrow Knockback\n§6§lFlame\n§6§lArrows Set Target On Fire\n§7§lInfinity\n§7§lShooting Consumes No Arrows\n§8§lMending\n§0§lRepair Items With Experience");
            $form->addButton("§c§lExit EnchantmentInfo");
            $form->sendToPlayer($sender);
        }
        return true;
    }
}
