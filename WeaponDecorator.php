<?php

interface Weapon
{
	public function getDamage();
}

class Gun implements Weapon
{
	public function getDamage()
	{
		return 30;
	}
}

abstract class GunDecorator implements Weapon
{
	protected $gun;

	public function getDamage(){}

	public function __construct(Weapon $gun)
	{
		$this->gun = $gun;
	}
}

class AdditionalKnife extends GunDecorator
{
	public function getDamage()
	{
		return $this->gun->getDamage() + 10;
	}
} 

class SecoundBarrel extends GunDecorator
{
	public function getDamage()
	{
		return $this->gun->getDamage() + 30;
	}
} 

class BigBullets extends GunDecorator
{
	public function getDamage()
	{
		return $this->gun->getDamage() + 20;
	}
} 

$weapon = new Gun();

echo 'The weapon has ' . $weapon->getDamage() . ' damage <br>';

$weapon = new AdditionalKnife(
			new Gun()
		);

echo 'Weapon with additional knife have ' . $weapon->getDamage() . ' damage <br>';

$weapon = new SecoundBarrel (
			new AdditionalKnife(
				new Gun()
			)
		);

echo 'Weapon with additional knife and secound barrel have ' . $weapon->getDamage() . ' damage <br>';

$weapon = new BigBullets (
			new SecoundBarrel (
				new AdditionalKnife(
					new Gun()
				)
			)
		);

echo 'Weapon loaded with big bullets,with additional knife and secound barrel have ' . $weapon->getDamage() . ' damage <br>';
