<?php

namespace Lv\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lv\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}
