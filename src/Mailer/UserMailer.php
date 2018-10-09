<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{

    public function welcome($user)
    {
        $this
            ->to($user['email'])
            ->subject('Félicitations ' . $user['username'] . ', votre compte a été créé')
            ->template('welcome')
            ->emailFormat('html');
    }


    public function afterreview($user)
    {
        $this
           ->to($user['email'])
           ->subject('Bravo ' . $user['username'] . ', votre avis a bien été ajouté')
           ->template('afterreview')
           //->viewVars(['spot' => $spot])
           ->emailFormat('html');
    }

    public function afterupdate($user)
    {
        $this
           ->to($user['email'])
           ->subject('Merci ' . $user['username'] . ', votre mise à jour est prise en compte')
           ->template('afterupdate')
           ->emailFormat('html');
    }
               


}
?>