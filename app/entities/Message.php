<?php
/**
 * Created by PhpStorm.
 * User: Azathoth
 * Date: 11. 5. 2015
 * Time: 14:38
 * Copyright © 2014, Matěj Račinský. Všechna práva vyhrazena.
 */

namespace App\Entities;

use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use \Kdyby\Doctrine\Entities\BaseEntity;

/**
 * @author: Matěj Račinský * @ORM\Entity
 */
class Message extends BaseEntity {

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $message;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $publishDate;

    public function __construct($message, \DateTime $publishDate) {
        $this->message = $message;
        $this->publishDate = $publishDate;
    }


}
