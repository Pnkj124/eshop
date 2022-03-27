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
    echo link_tag('https://semantic-ui.com/dist/components/grid.css');

        echo link_tag('css/app.css');
    ?>
    <?= $this->renderSection('styles') ?>
</head>

<body>

<div class="ui container middle aligned center aligned grid " style="height: 100vh;">
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
