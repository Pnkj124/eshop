<?php
$pageName = "Product Detail";
?>
<?= $this->extend('web\layouts\_layout') ?>
<?= $this->section('content') ?>


<?= $this->include('web\partials\product_detail') ?>

<div class="container">
    <?= $this->include('web\partials\categories') ?>
</div>


<?= $this->endSection() ?>


