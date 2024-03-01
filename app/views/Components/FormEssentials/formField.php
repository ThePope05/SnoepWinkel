<?= isset($componentData['label']) ?
    '<label for="' . $componentData['name'] . '" class=" text-2xl text-slate-200">' . $componentData['label'] . '</label>'
    :
    ''
?>
<input type="<?= $componentData['type'] ?>" name="<?= $componentData['name'] ?>" id="<?= $componentData['name'] ?>" value="<?= $componentData['value'] ?>" <?= isset($componentData['required']) && $componentData['required'] ? 'required' : '' ?> min="<?= $componentData['min'] ?>" class="w-full bg-slate-700 text-slate-200 p-2 mb-2">