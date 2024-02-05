<?php
$this->component('PageEssentials/head', ['title' => $data['title']]);
?>

<body>
    <!-- All html goes here -->
    <h1><?= $data['title'] ?></h1>

    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Package unit</th>
                <th>In storage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['products'] as $product) : ?>
                <tr>
                    <td><?= $product->barcode ?></td>
                    <td><?= $product->name ?></td>
                    <td><?= $product->packageUnit ?></td>
                    <?php if ($product->inStorage > 0) : ?>
                        <td><?= $product->inStorage ?></td>
                    <?php else : ?>
                        <td>Not in stock</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

<!-- Page still has to be closed -->

</html>