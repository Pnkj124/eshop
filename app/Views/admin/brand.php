<?php


$pageName = "Brands";
?>
<?= $this->extend('layouts\_layout') ?>
<?= $this->section('content') ?>

<div class="ui main container">
    <h2 class="ui header"><?= $pageName;?></h2>
    <div class="ui divider"></div>
    <form class="ui form" action="<?= base_url('admin/brands') ?>" method="get">
        <div class="fields">
            <div class="field">
                <label>&nbsp;</label>
                <a href="/admin/brands/add" class="ui button primary"><i class="plus circle  icon"></i> New Brand</a>
            </div>
            <div class="field">
                <label>Status</label>
                <?php
                echo form_dropdown('status', $status_options, $selected_status, "class='ui dropdown selection'");
                ?>
            </div>
            <div class="field">
                <label>Limit</label>
                <?php
                $limit_options = array(
                    10 => 10,
                    20 => 20,
                    50 => 50,
                    100 => 100
                );
                echo form_dropdown('limit', $limit_options, $limit, "class='ui dropdown selection'");
                ?>
            </div>
            <div class="field">
                <label for="">Filter</label>
                <button class="ui primary button" type="submit">Filter</button>
                <a href="/admin/brands" class="ui button">Reset</a>
            </div>
        </div>

    </form>
    <div class="ui divider"></div>

    <?php if (count($brands)): ?>
        <table class="ui celled striped small table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th width="115px">Status</th>
                <th width="300px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($brands as $brand):
                ?>
                <tr>
                    <td data-label="Id">
                        <?php
                        echo $brand['id'];
                        ?>
                    </td>

                    <td data-label="Brand Name">
                        <?php
                        echo $brand['name'];
                        ?>
                    </td>
                    <td data-label="Description">
                        <?php
                        echo $brand['description'];
                        ?>
                    </td>
                    <td data-label="Status">
                        <?php if($brand['status'] === "published"): ?>
                            <p class="ui icon label green positive  tiny"> <i class="check circle icon"></i><?php echo $brand['status'] ?></p>
                        <?php else:?>
                            <p class="ui icon label orange tiny"><i class="inbox circle icon"></i><?php echo $brand['status'] ?></p>
                        <?php endif;?>
                    </td>
                    <td data-label="Action" >
                        <?php if($brand['status'] === "published"): ?>
                            <a href="/admin/brands/<?=$brand['id'];?>/draft" class="ui button orange tiny"><i class="arrow down circle icon"></i> Make Draft</a>
                        <?php else: ?>
                            <a href="/admin/brands/<?=$brand['id'];?>/publish" class="ui button primary tiny"><i class="arrow up circle icon"></i>Publish</a>
                        <?php endif;?>
                        <a href="/admin/brands/<?=$brand['id'];?>/edit" class="ui icon button positive tiny"><i class="edit icon"></i>Edit</a>
                        <a href="/admin/brands/<?=$brand['id'];?>/delete" class="ui icon button negative tiny"><i class="delete icon"></i>Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
            <tfoot>


            <tr><th colspan="11">
                    <?= $pager->simpleLinks("brands", "semantic_simple"); ?>
                </th>
            </tr></tfoot>
        </table>
    <?php else: ?>
        <div class="ui icon message">
            <i class="search icon"></i>
            <div class="content">
                <div class="header">
                    Brands not found !
                </div>
                <p>Try Resetting the filter above.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>


