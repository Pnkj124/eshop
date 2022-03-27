<?php
$pageName = "Category";
?>
<?= $this->extend('web\layouts\_layout') ?>
<?= $this->section('content') ?>

<div class="container d-flex flex-wrap justify-content-center">
    <div class="col-12">
        <?= $this->include('web\partials\slider') ?>
    </div>
</div>
<br>
<div class="container">
    <?= $this->include('web\partials\categories') ?>
</div>

<?= $this->include('web\partials\products') ?>

<?= $this->endSection() ?>


