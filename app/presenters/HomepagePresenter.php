<?php

namespace App\Presenters;

use App\Entities\VerySimpleIdentity;
use Nette,
	App\Forms\SignFormFactory;


/**
 * Sign in/out presenters.
 */
class HomepagePresenter extends BasePresenter {

    /**
     * @var string
     */
    private $hash = "$2y$10$2EtGai4oaE.VfUoJOVqdeOn/ht5cSYNUaJj7L284TyhNPNtC.GZjW"; //hash of password tajneHeslo

	/**
     * @var SignFormFactory @inject
     */
	public $factory;


	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = $this->factory->create();
		$form->onValidate[] = $this->signInFormValidate;
        $form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}

    public function signInFormValidate(Nette\Forms\Form $form){
        if (!Nette\Security\Passwords::verify($form->values->password, $this->hash)) {
            $form->addError("špatné heslo");
        }
    }

    public function signInFormSucceeded(Nette\Forms\Form $form){
        $this->getUser()->login(new VerySimpleIdentity());
        $this->redirect('MessageCreation:');
    }

	public function actionOut() {
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('Homepage:');
	}

}
