<?php


$pageName = "New product";
?>
<?= $this->extend('layouts\_layout') ?>
<?= $this->section('content') ?>

<div class="ui main container">
    <h2 class="ui header"><?= $pageName;?></h2>
    <div class="ui divider"></div>
    <form class="ui form" action="<?= base_url('admin/products/create') ?>" method="post" enctype="multipart/form-data">
        <div class="two fields">
            <div class="field">
                <label>Product Name</label>
                <input type="text" name="title" placeholder="Product Name" >
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Code </label>
                <input type="text" name="code" placeholder="Code" >
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Short Description</label>
                <textarea name="short_description"></textarea>
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <label>Long Description</label>
                <textarea name="long_description"></textarea>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Price</label>
                <input type="number" name="price" placeholder="price" >
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Quantity</label>
                <input type="number" name="quantity" placeholder="quantity" >
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <label>Category</label>
                <?php
                echo form_dropdown('category_id', $category_options, "", "class='ui dropdown selection'");
                ?>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Brand</label>
                <?php
                echo form_dropdown('brand_id', $brand_options, "", "class='ui dropdown selection'");
                ?>
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <label>Status</label>
                <?php
                echo form_dropdown('publish_status', $status_options, $selected_status, "class='ui dropdown selection'");
                ?>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Product Image</label>
                <input type="file" name="file" accept="image/*" >
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <button class="ui primary button" type="submit">Save</button>
            </div>
        </div>

    </form>
    <div class="ui divider"></div>
    <br>
    <br>
    <br>
    <br>
</div>

<?= $this->endSection() ?>


