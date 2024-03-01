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

    <table class="w-3/5 mx-auto bg-gradient-to-br from-slate-600 to-slate-500">
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