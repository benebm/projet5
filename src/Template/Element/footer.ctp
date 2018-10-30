<footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Une question ?</h3>
                    <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'contact']); ?>" id="email_footer">contact@marseillegreen.fr</a>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>A propos</h3>
                    <ul>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'identity']); ?>">Qui sommes-nous ?</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'concept']); ?>">Concept</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>Participer</h3>
                    <ul>
                        <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'login']); ?>">Se connecter</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'add']); ?>">Créer un compte</a></li>   
                    </ul>
                </div>
                <!--<div class="col-md-2 col-sm-3">
                    <h3>Settings</h3>
                    <div class="styled-select">
                        <select class="form-control" name="lang" id="lang">
                            <option value="Français" selected>Français</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                </div>-->
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="https://github.com/benebm" target="_blank"><i class="icon-github"></i></a></li>
                            <li><a href="https://twitter.com/benedictemondon" target="_blank"><i class="icon-twitter" target="_blank"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/benedicte-mondon/" target="_blank"><i class="icon-linkedin" target="_blank"></i></a></li>
                        </ul>
                        <p>© Benedicte for Openclassroom 2018<br />Powered by Cakephp 3.5.17</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->
