<?php
/**
 * Created by PhpStorm.
 * User: Azathoth
 * Date: 11. 5. 2015
 * Time: 14:44
 * Copyright © 2014, Matěj Račinský. Všechna práva vyhrazena.
 */

namespace App\Entities;

use App\Model\Authorizator;
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use \Kdyby\Doctrine\Entities\BaseEntity;
use Nette\Security\IIdentity;

/**
 * @author: Matěj Račinský
 */
class VerySimpleIdentity implements IIdentity {

    /**
     * Returns the ID of user.
     * @return mixed
     */
    function getId() {
        return 1;
    }

    /**
     * Returns a list of roles that the user is a member of.
     * @return array
     */
    function getRoles() {
        return [Authorizator::ROLE_ADMIN];
    }
}
