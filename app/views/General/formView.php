<?php
$this->component('PageEssentials/head', ['title' => $data['title']]);
?>

<body class="w-full h-screen bg-slate-800 flex flex-col justify-center align-middle">
    <h1 class="text-4xl font-semibold text-slate-600 text-center"><?= $data['title']; ?></h1>
    <?php
    if (isset($data['pageInfo'])) {
        $this->component('PageEssentials/pageInfo', ['pageInfo' => $data['pageInfo']]);
    }
    ?>

    <form action=<?= $data['form']['action'] ?> method=<?= $data['form']['method'] ?> class="w-1/5 px-4 py-10 mx-auto bg-gradient-to-tl from-slate-700 to-slate-500">
        <?php
        foreach ($data['form']['fields'] as $field) {
            $this->component('FormEssentials/formField', $field);
        }
        ?>
        <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 transition-colors text-slate-800 font-semibold py-2">Submit</button>
    </form>
</body>

</html>