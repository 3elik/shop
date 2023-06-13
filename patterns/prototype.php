<?php
abstract class ToySoldierPrototype
{
    protected $name;
    protected $rank;
    protected $weapon;
    protected $uniform;
    protected $color;
    protected $equipment;

    abstract public function clone(): ToySoldierPrototype;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    public function setWeapon($weapon)
    {
        $this->weapon = $weapon;
    }

    public function setUniform($uniform)
    {
        $this->uniform = $uniform;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
    }

}

class Sniper extends ToySoldierPrototype
{
    public function clone(): ToySoldierPrototype
    {
        $clone = new self();

        $clone->setName($this->name);
        $clone->setRank($this->rank);
        $clone->setWeapon($this->weapon);
        $clone->setUniform($this->uniform);
        $clone->setColor($this->color);
        $clone->setEquipment($this->equipment);

        return $clone;
    }
}

$sniperTemplate = new Sniper();
$sniperTemplate->setName('Ivan');
$sniperTemplate->setRank('Sergeant');
$sniperTemplate->setWeapon($this->weapon);
$sniperTemplate->setUniform('Sniper uniform');
$sniperTemplate->setColor('Green');
$sniperTemplate->setEquipment('Rifle');

$cloneSniper = $sniperTemplate->clone();
