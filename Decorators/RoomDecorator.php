<?php
abstract class Areable {
	abstract public function getArea();
} 

class Room extends Areable
{
	protected $area = 32;

	public function getArea()
	{
		return $this->area; 
	}
}

abstract class RoomDecorator extends Areable
{
	public $room;

	public function __construct(Areable $room)
	{
		$this->room = $room;
	}
}

class RoomWithoutWall extends RoomDecorator 
{
	public function getArea()
	{
		return $this->room->getArea() + 20;
	}
}

class DecoratedWithChair extends RoomDecorator 
{
	public function getArea()
	{
		return $this->room->getArea() - 2;
	}
}

class DecoratedWithBoard extends RoomDecorator 
{
	public function getArea()
	{
		return $this->room->getArea() - 5;
	}
}


$room = new Room;

echo 'Twój pokój ma: ' . $room->getArea() . 'm3' . '<br/>';



$room = new DecoratedWithChair(
	new Room()
	);
echo 'Jeśli dodasz krzesło pokój będzie miał : ';
echo $room->getArea() . 'm3' . '<br/>';



$room = new DecoratedWithBoard(
	new Room()
	);
echo 'Jeśli dodasz stół pokój będzie miał : ';
echo $room->getArea() . 'm3' . '<br/>';



$room = new DecoratedWithChair(
			new DecoratedWithBoard(
				new Room()
			)		
		);
echo 'Jeśli dodasz stół i krzesło pokój będzie miał : ';
echo $room->getArea() . 'm3' . '<br/>';


$room = new DecoratedWithChair(
			new DecoratedWithChair(
				new DecoratedWithBoard(
					new Room()
				)		
			)
		);
echo 'Jeśli dodasz dwa stoły i krzesło pokój będzie miał : ';
echo $room->getArea() . 'm3' . '<br/>';

$room = new RoomWithoutWall (
			new DecoratedWithChair(
				new DecoratedWithChair(
					new DecoratedWithBoard(
						new Room()
					)		
				)
			)
		);
echo 'Jeśli dodasz dwa stoły i krzesło i wyburzysz ścianę pokój będzie miał : ';
echo $room->getArea() . 'm3' . '<br/>';