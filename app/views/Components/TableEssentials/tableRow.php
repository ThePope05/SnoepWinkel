<tr class=" border-b-2 border-slate-700 odd:bg-slate-700 px-6">
    <?php foreach ($componentData['rowData'] as $dataPoint) : ?>
        <td class="mx-auto text-center"><?= (isset($dataPoint)) ? $dataPoint : "Null" ?></td>
    <?php endforeach; ?>
</tr>