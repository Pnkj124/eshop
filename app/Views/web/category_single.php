<?php
$pageName = "Home";
?>
<?= $this->extend('web\layouts\_layout') ?>
<?= $this->section('content') ?>


<?= $this->include('web\partials\products') ?>

<div class="container">
    <?= $this->include('web\partials\categories') ?>
</div>


<?= $this->endSection() ?>


