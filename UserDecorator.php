<?php

interface UserInterface
{
	public function getRoles();
}


class User implements UserInterface
{

	public function getRoles()
	{
		return 'Standard User';
	}
}

abstract class UserRoleDecorator
{
	protected $user;

	public function __construct(UserInterface $user)
	{
		$this->user = $user;
	}
}


class Moderator extends UserRoleDecorator implements UserInterface
{
	public function getRoles()
	{
		return $this->user->getRoles() . ', Moderator';
	}
}


class SpecialGuest extends UserRoleDecorator implements UserInterface
{
	public function getRoles()
	{
		return $this->user->getRoles() . ', SpecialGuest';
	}
}


$user = new User();
echo 'Rola usera w systemie to: <strong>' . $user->getRoles() . '</strong><br/>';
$user = new Moderator(
			new User()
		);

echo 'Po dodaniu roli moderatora użytkownik dysponuje rolami: <strong>' . $user->getRoles() . '</strong><br/>';

$user = new SpecialGuest(
			new Moderator(
				new User()
			)
		);


echo 'Po dodaniu roli moderatora i gościa specialnego użytkownik dysponuje rolami: <strong>' . $user->getRoles() . '</strong><br/>';