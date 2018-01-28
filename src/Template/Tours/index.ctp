<h1>Visites</h1>
<table>
    <tr>
        <th>Nom</th>
        <th>Adresse</th>
    </tr>

    <?php foreach ($tours as $tour): ?>
    <tr>
        <td>
            <?= $this->Html->link($tour->name, ['action' => 'view', $tour->slug]) ?>
        </td>
        <td>
            <?= $tour->address ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>