<?php
    echo doctype();
    $config = config('appConfig');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config->appName; ?></title>
    <?php
        echo link_tag('Semantic/semantic.min.css');
        echo link_tag('css/app.css');
    ?>
    <?= $this->renderSection('styles') ?>
</head>

<body>
<?= $this->include('layouts\header') ?>

<div class="main ui container">
    <?= $this->renderSection('content') ?>
</div>

<?php
    echo script_tag('js/jquery-3.1.1.min.js');
    echo script_tag('Semantic/semantic.min.js');
    echo script_tag('js/app.js');
?>
<?= $this->renderSection('scripts') ?>
</body>
</html>
