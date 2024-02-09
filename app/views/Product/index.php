<?php
$this->component('PageEssentials/head', ['title' => $data['title']]);
?>

<body>
    <!-- All html goes here -->
    <h1><?= $data['title'] ?></h1>
    <?php if (isset($data['pageInfo'])) : ?>
        <div>
            <?php foreach ($data['pageInfo'] as $key => $value) : ?>
                <p><?= $key ?> <?= $value ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <?php
            $this->component('TableEssentials/tableHead', ['rowData' => $data['table']['head']]);
            ?>
        </thead>
        <tbody>
            <?php
            foreach ($data['table']['body'] as $row) {
                $this->component('TableEssentials/tableRow', ['rowData' => $row]);
            }
            ?>
        </tbody>
    </table>
</body>

</html>