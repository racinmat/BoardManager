<?php
/**
 * Created by PhpStorm.
 * User: Azathoth
 * Date: 11. 5. 2015
 * Time: 14:45
 * Copyright © 2014, Matěj Račinský. Všechna práva vyhrazena.
 */

namespace App\Presenters;
use App\Forms\MessageCreationFormFactory;
use App\Model\Authorizator;
use App\Model\MessageCreator;
use Nette\Forms\Form;

/**
 * Class MessageCreationPresenter
 * @package App\Presenters
 * @author: Matěj Račinský 
 */
class MessageCreationPresenter extends BasePresenter {

    /**
     * @var MessageCreationFormFactory
     * @inject
     */
    public $factory;

    /**
     * @var MessageCreator
     * @inject
     */
    public $messageCreator;

    public function startup(){
        parent::startup();
        if (!$this->getUser()->isAllowed(Authorizator::RESOURCE_MESSAGES_CREATING)) {
            $this->flashMessage("You are not logged in");
            $this->redirect("Homepage:");
        }
    }

    public function createComponentCreateMessageForm(){
        $form = $this->factory->create();
        $form->onSuccess[] = $this->createMessage;
        return $form;
    }

    public function createMessage(Form $form){
        $this->messageCreator->createNewMessage($form->values->text, $form->values->publish);
        $this->flashMessage('Message has been succesfully added.');
    }

    public function actionCreateDatabase(){
        $this->messageCreator->createDatabase();
        $this->flashMessage('Database succesfully created');
        $this->redirect('default');
    }
}
