<?php

interface Desk
{
	public function getPlace();
}

class SmallDesk implements Desk
{
	protected $deskPlace = 125;

	public function getPlace()
	{
		return $this->deskPlace;
	}
}

class MediumDesk implements Desk
{
	protected $deskPlace = 200;

	public function getPlace()
	{
		return $this->deskPlace;
	}
}


class BigDesk implements Desk
{
	protected $deskPlace = 300;

	public function getPlace()
	{
		return $this->deskPlace;
	}
}

abstract class DeskThing implements Desk
{
	protected $desk;

	public function __construct(Desk $desk)
	{
		$this->desk = $desk;
	}
}

class Lamp extends DeskThing
{
	public function getPlace()
	{
		return $this->desk->getPlace() - 10;
	}
}


class Monitor extends DeskThing
{
	public function getPlace()
	{
		return $this->desk->getPlace() - 50;
	}
}

class Printer extends DeskThing
{
	public function getPlace()
	{
		return $this->desk->getPlace() - 70;
	}
}

$desks = ['SmallDesk','MediumDesk','BigDesk'];
echo 'Desk sizes: <br/>';
foreach($desks as $deskName) {
	$desk = new $deskName();
	echo $deskName . ' have <strong>' . $desk->getPlace() . '</strong><br/>';
}
$desk = new Lamp(new SmallDesk());

echo 'Small desk with lamp have ' . $desk->getPlace() . ' place <br/>';

$desk = new Monitor(new MediumDesk());

echo 'Medium desk desk with monitor have ' . $desk->getPlace() . ' place <br/>';

$desk = new Lamp(new Monitor(new MediumDesk()));

echo 'Medium desk desk with lamp and monitor have ' . $desk->getPlace() . ' place <br/>';

$desk = new Printer(new Lamp(new Monitor(new BigDesk())));

echo 'Big desk with lamp,monitor and printer have ' . $desk->getPlace() . ' place <br/>';