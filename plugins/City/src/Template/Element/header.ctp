<div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6"><!--<i class="icon-phone"></i><strong>0045 043204434</strong>--></div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <ul id="top_links">    
                                <?php if (!isset($username))
                                { 
                                ?>
                                    <li>Bienvenue, visiteur !&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?= $this->Url->build(['controller' => 'Users','action' => 'login']); ?>">Se connecter</a>
                                    </li>
                                    <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'add']); ?>">Créer un compte</a>
                                    </li>
                                <?php 
                                }
                                else 
                                { 
                                ?>
                                    <li>Bonjour, <?= $username ?> !&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?= $this->Url->build(['controller' => 'Users','action' => 'logout']); ?>">Se déconnecter </a>
                                    </li>
                                    <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'dashboard']); ?>">Mon compte</a>
                                    </li>
                                <?php
                                }
                                ?>
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->
        
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo_home">
                        <h1><a href="index.html" title="Marseille Green">Marseille Green, le guide !</a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <?php echo $this->Html->image("logo_sticky.png", [
                                "alt" => "Marseille Green", "data-retina" => "true",
                                'url' => ['controller' => 'Spots', 'action' => 'index']
                        ]); ?>
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'index']); ?>">Accueil</a></a>
                            </li>
                            <li class="submenu">
                                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'identity']); ?>">Qui sommes-nous ?</a>
                            </li>
                            <li class="submenu">
                                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'concept']); ?>">Concept</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Les spots <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><?= $this->Html->link('Tous les spots', ['controller' => 'Spots', 'action' => 'all'])?></li>
                                    <li><a href="#">Par catégorie</a>
                                        <ul>
                                            <li><?= $this->Html->link('Magasins bio', ['action' => 'sort', 1])?></li>
                                            <li><?= $this->Html->link('Epiceries vrac', ['action' => 'sort', 2])?></li>
                                            <li><?= $this->Html->link('Restos bio & vegan', ['action' => 'sort', 3])?></li>
                                            <li><?= $this->Html->link('Soins naturels', ['action' => 'sort', 4])?></li>
                                            <li><?= $this->Html->link('Zéro déchet', ['action' => 'sort', 5])?></li>
                                        </ul>
                                    </li>
                                    <!--<li><a href="#">Par quartier</a>
                                    	<ul>
                                            <li><a href="#">Le Panier</a></li>
                                            <li><a href="#">Euroméditerranée</a></li>
                                            <li><a href="#">Noailles</a></li>
                                            <li><a href="#">Le Pharo</a></li>
                                            <li><a href="#">Saint Giniez</a></li>
                                        </ul>
                                    </li>-->
                                    <li><a href="<?= $this->Url->build(['controller' => 'Spots','action' => 'mapall']); ?>">Tout voir sur une carte</a></li>
                                </ul>
                            </li>
                              <li class="submenu">
                                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']); ?>">Contact</a>
                            </li>
                        </ul>
                    </div><!-- End main-menu -->
                    <!--<ul id="top_tools">
                        <li>
                            <div class="dropdown dropdown-search">
                                <a href="#" class="search-overlay-menu-btn" data-toggle="dropdown"><i class="icon-search"> Rechercher par mot clé</i></a>
                            </div>
                        </li>
                    </ul>-->
                </nav>
            </div>
        </div><!-- container -->