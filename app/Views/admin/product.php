<?php
$pageName = "Product";
?>
<?= $this->extend('layouts\_layout') ?>
<?= $this->section('content') ?>

<div class="ui main container">
    <h2 class="ui header"><?= $pageName;?></h2>
    <div class="ui divider"></div>
    <form class="ui form" action="<?= base_url('admin/products') ?>" method="get">
        <div class="fields">
            <div class="field">
                <label>&nbsp;</label>
                <a href="/admin/products/add" class="ui button primary"><i class="plus circle  icon"></i> New Product</a>
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
                <a href="/admin/products" class="ui button">Reset</a>
            </div>
        </div>

    </form>
    <div class="ui divider"></div>

    <?php if (count($products)): ?>
        <table class="ui celled striped small table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Price</th>
                <th width="115px">Status</th>
                <th width="300px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($products as $product):
                ?>
                <tr>
                    <td data-label="Id">
                        <?php
                        echo $product['id'];
                        ?>
                    </td>
                    <td data-label="Image">
                        <div class="ui small image" onclick="openModal(<?=$product['id']?>)" style="cursor: pointer;">
                            <img src="/web/img/uploads/<?= $product['image'];?>" style="max-width: 100px;" alt="product image">
                        </div>

                        <div class="ui modal" id="<?= "modal_".$product['id'];?>">
                            <i class="close icon"></i>
                            <div class="header">
                                Product Image
                            </div>
                            <div class="image content">
                                <div class="ui medium image">
                                    <img src="/web/img/uploads/<?= $product['image'];?>">
                                </div>

                            </div>

                        </div>

                    </td>
                    <td data-label="Product Title" width="200px">
                        <a href="/admin/products/<?=$product['id'];?>/detail" class="ui icon tiny "><i class="eye icon"></i><?= $product['title'];?></a>
                    </td>

                    <td data-label="Category">
                        <?php
                        echo $product['category_name'];
                        ?>
                    </td>

                    <td data-label="Brand">
                        <?php
                        echo $product['brand_name'];
                        ?>
                    </td>
                    <td data-label="Description">
                        <?php
                        echo $product['short_description'];
                        ?>
                    </td>
                    <td data-label="Price">
                        <b class=""><?php
                            echo "Rs.".$product['price'];
                            ?></b>
                    </td>
                    <td data-label="Status">
                        <?php if($product['publish_status'] === "published"): ?>
                            <p class="ui icon label green positive  tiny"> <i class="check circle icon"></i><?php echo $product['publish_status'] ?></p>
                        <?php else:?>
                            <p class="ui icon label orange tiny"><i class="inbox circle icon"></i><?php echo $product['publish_status'] ?></p>
                        <?php endif;?>
                    </td>
                    <td data-label="Action" >
                        <?php if($product['publish_status'] === "published"): ?>
                            <a href="/admin/products/<?=$product['id'];?>/draft" class="ui button orange tiny"><i class="arrow down circle icon"></i> Make Draft</a>
                        <?php else: ?>
                            <a href="/admin/products/<?=$product['id'];?>/publish" class="ui button primary tiny"><i class="arrow up circle icon"></i>Publish</a>
                        <?php endif;?>
                        <a href="/admin/products/<?=$product['id'];?>/edit" class="ui icon button positive tiny"><i class="edit icon"></i>Edit</a>
                        <a href="/admin/products/<?=$product['id'];?>/delete" class="ui icon button negative tiny"><i class="delete icon"></i>Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
            <tfoot>


            <tr><th colspan="11">
                    <?= $pager->simpleLinks("products", "semantic_simple"); ?>
                </th>
            </tr></tfoot>
        </table>
    <?php else: ?>
        <div class="ui icon message">
            <i class="search icon"></i>
            <div class="content">
                <div class="header">
                    Products not found !
                </div>
                <p>Try Resetting the filter above.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    function openModal(id)
    {
        $('#modal_'+id).modal('show');
    }

</script>

<?= $this->endSection() ?>


