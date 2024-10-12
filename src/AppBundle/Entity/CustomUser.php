<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomUser implements UserInterface
{
    private $id;
    private $username;
    private $password;
    public function getId()
    {
        return $this->id;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setPassword($password)
    {
        $this->password = (string) password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array(new Role('ROLE_ADMIN'));
    }

    public function eraseCredentials()
    {

    }
}
