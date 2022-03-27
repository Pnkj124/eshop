<?php
$pageName = "Product Detail";
?>
<?= $this->extend('layouts\_layout') ?>
<?= $this->section('content') ?>


<div class="ui card four">
    <div class="image">
        <img src="<?= "/web/img/uploads/".$product["image"]; ?>" alt="product" style="max-width: 300px;">
    </div>
    <div class="content">
        <a class="header"><?= $product["title"]?></a>
        <div class="meta">
            <p>Brand : <?= $product["brand_name"]?></p>
            <p>Category : <?= $product["category_name"]?></p>
        </div>
        <div class="description">
            <?= $product["long_description"]?>
        </div>
    </div>
    <div class="extra content">
        <b>
            <i class="dollar icon"></i> Price:
            <?= $product["price"]?>
        </b>
        <br>
        <b>
            <i class="cart icon"></i> Remaining Quantity :
            <?= $product["quantity"]?>
        </b>
    </div>
</div>


<?= $this->endSection() ?>


