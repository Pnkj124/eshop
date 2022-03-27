<?php


$pageName = "Edit Brand";
?>
<?= $this->extend('layouts\_layout') ?>
<?= $this->section('content') ?>

<div class="ui main container">
    <h2 class="ui header"><?= $pageName;?></h2>
    <div class="ui divider"></div>
    <form class="ui form" action="<?= base_url('admin/brands/update') ?>" method="post">
        <input type="hidden" name="id" value="<?= $brand["id"]; ?>">
        <div class="two fields">
            <div class="field">
                <label>Brand Name</label>
                <input type="text" name="name" placeholder="Brand Name" value="<?= $brand["name"]; ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Brand Description</label>
                <textarea name="description"><?= $brand["description"]; ?></textarea>
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


