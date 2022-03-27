<?php
$pageName = "Admin Dashboard";
?>
<?= $this->extend('layouts\_layout') ?>
<?= $this->section('content') ?>

<div class="ui main container" style="margin-top:-20px;">
    <div class="container" >
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"><?= $pageName;?></div>
                    <div class="panel-body">
                        <h1>Hello, <?= session()->get('name') ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>


