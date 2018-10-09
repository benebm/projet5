<?php // Dans src/Form/ContactForm.php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\MailerAwareTrait;

class ContactForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('firstname', 'string')
            ->addField('lastname', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator
            ->add('firstname', 'length', [
            'rule' => ['minLength', 3],
            'message' => 'Un prénom est requis'
            ])
            ->add('lastname', 'length', [
            'rule' => ['minLength', 3],
            'message' => 'Un nom est requis'
            ])
            ->add('email', 'format', [
            'rule' => 'email',
            'message' => 'Une adresse email valide est requise',
            ]);
    }

     use MailerAwareTrait;

    protected function _execute(array $contact)
    {
        $this->getMailer('User')->send('contactform', [$contact]);
        return true;
    }

}
?>