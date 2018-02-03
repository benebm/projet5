<<h1><?= $tour->name ?></h1>
<p><?= $tour->description ?></p>
<p><?= $this->Html->link('Déposer un avis', ['action' => 'review', $article->slug]) ?></p>