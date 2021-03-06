<section id="hero" class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div id="login">
                            <div class="text-center"><?php echo $this->Html->image("logo_sticky.png", [
                            "alt" => "Marseille Green", "data-retina" => "true"]); ?></div>
                            <hr>
            
                                <?= $this->Flash->render() ?>
                                <?= $this->Form->create($user) ?>
                              
                                <div class="form-group">
                                <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Pseudo', 'label' => 'Votre nom d\'utilisateur']) ?>
                                </div>
                                <div class="form-group">
                                <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'votreemail@exemple.fr', 'label' => 'Votre adresse email']) ?>
                                </div>
                                <div class="form-group">
                                <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => '*****', 'label' => 'Votre mot de passe', 'id' => 'password1']) ?>
                                </div>
                                <div class="form-group">
                                <label>Saisissez à nouveau le mot de passe</label>
                                <?= $this->Form->password('confirm_password', ['class' => 'form-control', 'placeholder' => '*****', 'label' => false, 'id' => 'password2']) ?>
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                
                                <?= $this->Form->button(__('Créer un compte'), ['class' => 'btn_full']); ?>
                                <?= $this->Form->end() ?>

                                <center><i>Déjà inscrit ?</i></center><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'login']); ?>" class="btn_full_outline">Se connecter</a>
                           
                        
                        </div>
                </div>
            </div>
        </div>
    </section>

   