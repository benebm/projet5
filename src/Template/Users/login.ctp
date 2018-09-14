<!-- src/Template/Users/login.ctp -->

    <section id="hero" class="login">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                	<div id="login">
                    		<div class="text-center"><?php echo $this->Html->image("logo_sticky.png", [
                            "alt" => "Marseille Green", "data-retina" => "true"]); ?></div>
                            <hr>
            
                                <?= $this->Flash->render() ?>
                                <?= $this->Form->create() ?>
                              
                                <div class="form-group">
                                <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Pseudo', 'label' => 'Votre nom d\'utilisateur']) ?>
                                </div>
                                <div class="form-group">
                                <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => '*****', 'label' => 'Votre mot de passe']) ?>
                                </div>
                                <p class="small">
                                    <a href="#">Forgot Password?</a>
                                </p>
                            
                                <?= $this->Form->button(__('Se Connecter'), ['class' => 'btn_full']); ?>
                                <?= $this->Form->end() ?>

                                <a href="register.html " class="btn_full_outline">Register</a>
                           
                        
                        </div>
                </div>
            </div>
        </div>
    </section>


