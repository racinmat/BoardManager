<?php
/**
 * Created by PhpStorm.
 * User: Azathoth
 * Date: 11. 5. 2015
 * Time: 14:47
 * Copyright © 2014, Matěj Račinský. Všechna práva vyhrazena.
 */

namespace App\Model;

use Nette\Object;
use Nette\Security\IAuthorizator;
use Nette\Security\privilege;
use Nette\Security\role;

/**
 * Class Authorizator
 * @package App\Model
 * @author: Matěj Račinský 
 */
class Authorizator extends Object implements IAuthorizator {

    const ROLE_ADMIN = "admin";
    const RESOURCE_MESSAGES_CREATING = "messages creating";

    /**
     * Performs a role-based authorization.
     * @param  string  role
     * @param  string  resource
     * @param  string  privilege
     * @return bool
     */
    function isAllowed($role, $resource, $privilege) {
        if ($resource == self::RESOURCE_MESSAGES_CREATING) {
            return $role == self::ROLE_ADMIN;
        } else {
            return false;
        }
    }
}