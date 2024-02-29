<?php $this->component('PageEssentials/head', ['title' => "HomePage"]); ?>

<body class="w-full h-screen bg-slate-800 flex flex-col justify-center align-middle">
    <h1 class="text-4xl font-semibold text-slate-600 text-center"><?= $data['title']; ?></h1>
    <?php $this->component('ButtonLink', ['route' => '/product', 'text' => 'Products']); ?>
</body>

</html>