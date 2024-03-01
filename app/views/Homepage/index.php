<?php $this->component('PageEssentials/head', ['title' => "HomePage"]); ?>

<body class="w-full h-screen bg-slate-800 flex flex-col justify-center align-middle">
    <h1 class="text-4xl font-semibold text-slate-600 text-center mb-4"><?= $data['title']; ?></h1>
    <?php $this->component('ButtonLink', ['route' => '/product', 'text' => 'Products']); ?>
    <hr class="my-2 w-1/12 mx-auto border-2 rounded border-slate-700">
    <?php $this->component('ButtonLink', ['route' => '/supplier', 'text' => 'Suppliers']); ?>
</body>

</html>