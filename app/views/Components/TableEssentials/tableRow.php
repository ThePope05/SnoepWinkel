<tr>
    <?php foreach ($componentData['rowData'] as $dataPoint) : ?>
        <td><?= (isset($dataPoint)) ? $dataPoint : "Null" ?></td>
    <?php endforeach; ?>
</tr>