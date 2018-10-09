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


    public function afterreview($user, $spot)
    {
        $this
           ->to($user['email'])
           ->subject('Bravo ' . $user['username'] . ', votre avis sur ' . $spot['name'] . ' a bien été ajouté')
           ->template('afterreview')
           ->viewVars(['spotname' => $spot->name])
           ->emailFormat('html');
    }

    public function moderation($spot, $contentreview)
    {
        $this
            ->to('benedictemondon@gmail.com')
            ->subject('Un commentaire a été posté sur le spot ' . $spot['name'])
            ->template('moderation')
            ->viewVars(['contentreview' => $contentreview])
            ->emailFormat('text');
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