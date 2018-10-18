<section id="hero">
        <div class="intro_title">
            <h3 class="animated fadeInDown">Vivre Marseille au naturel</h3>
            <p class="animated fadeInDown">Le guide des spots bio / écolo / zéro déchet à Marseille</p>
            
            <?= $this->Html->link('Voir tout', ['controller' => 'Spots', 'action' => 'all'], ['class' => 'animated fadeInUp button_intro']) ?> <?= $this->Html->link('Voir sur la carte', ['controller' => 'Spots', 'action' => 'map'], ['class' => 'animated fadeInUp button_intro outline']) ?>
        </div>
    </section>
    <!-- End hero -->