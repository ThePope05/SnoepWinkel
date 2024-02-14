<?php
$this->component('PageEssentials/head', ['title' => $data['title']]);
?>

<body>
    <!-- All html goes here -->
    <h1><?= $data['title'] ?></h1>
    <?php
    if (isset($data['pageInfo'])) {
        $this->component('PageEssentials/pageInfo', ['pageInfo' => $data['pageInfo']]);
    }
    ?>

    <table>
        <thead>
            <?php
            $this->component('TableEssentials/tableHead', ['rowData' => $data['table']['head']]);
            ?>
        </thead>
        <tbody>
            <?php
            if (isset($data['table']['body'][0])) {
                foreach ($data['table']['body'] as $row) {
                    $this->component('TableEssentials/tableRow', ['rowData' => $row]);
                }
            } else {
                echo "<tr>";
                for ($i = 0; $i < count($data['table']['head']); $i++) {
                    echo "<td>Null</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>