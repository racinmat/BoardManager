<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
	Nette\Security\User;
use Nextras\Forms\Rendering\Bs3FormRenderer;


class MessageCreationFormFactory extends Nette\Object {

	public function __construct() {
	}


	/**
	 * @return Form
	 */
	public function create() {
		$form = new Form;
		$form->addText('text', 'Text of message')
			->setRequired('Please enter message text.');

        $form->addDateTimePicker('publish', 'Date and time od publishing')
            ->setRequired('Please enter publish time');

		$form->addSubmit('send', 'Create message');
        $form->setRenderer(new Bs3FormRenderer());

        return $form;
	}

}
