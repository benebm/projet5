<?php // Dans src/Form/ContactForm.php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

class ContactForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
                'rule' => ['minLength', 3],
                'message' => 'Un nom est requis'
            ])->add('email', 'format', [
                'rule' => 'email',
                'message' => 'Une adresse email valide est requise',
            ]);
    }

    protected function _execute(array $data)
    {
        // Envoie un email.
         $email = new Email('default');
        //$email->from($contact['email']);
        $email->to('benedictemondon@gmail.com');
        $email->subject('Un nouveau message de' . $contact['name']);
        $email->send($contact['body']);
        //$email->send($contact['body']);


        return true;
    }

    public function setErrors(array $errors)
    {
        $this->_errors = $errors;
    }

}
?>