<?php


$pageName = "New Brand";
?>
<?= $this->extend('layouts\_layout') ?>
<?= $this->section('content') ?>

<div class="ui main container">
    <h2 class="ui header"><?= $pageName;?></h2>
    <div class="ui divider"></div>
    <form class="ui form" action="<?= base_url('admin/brands/create') ?>" method="post">
        <div class="two fields">
            <div class="field">
                <label>Brand Name</label>
                <input type="text" name="name" placeholder="Brand Name" >
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Brand Description</label>
                <textarea name="description"></textarea>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Status</label>
                <?php
                echo form_dropdown('status', $status_options, $selected_status, "class='ui dropdown selection'");
                ?>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <button class="ui primary button" type="submit">Save</button>
            </div>
        </div>

    </form>
</div>

<?= $this->endSection() ?>


