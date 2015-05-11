<?php

namespace App\Model;

use App\Entities\Message;
use Doctrine\ORM\Tools\SchemaTool;
use Kdyby\Doctrine\EntityManager;
use Nette,
	Nette\Utils\Strings,
	Nette\Security\Passwords;


/**
 * Users management.
 */
class MessageCreator extends Nette\Object {

	/**
     * @var EntityManager
     */
	private $entityManager;


	public function __construct(EntityManager $entityManager) {
		$this->entityManager  = $entityManager;
	}

    public function createNewMessage($text, \DateTimeInterface $dateTime){
        $message = new Message($text, $dateTime);
        $this->entityManager->persist($message);
        $this->entityManager->flush();
    }

    public function createDatabase(){
        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->createSchema([$this->entityManager->getClassMetadata(Message::getClassName())]);
    }

}


