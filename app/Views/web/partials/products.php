<?php
if($products != null){
    ?>
<div class="py-5 bg-light">
    <div class="container">
    <h2>Products</h2>

        <div class="row row-cols-1 row-cols-sm-4 row-cols-md-4 g-2">
            <?php
                foreach($products as $product){
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?= "/web/img/uploads/".$product["image"] ?>" alt="product">

                        <div class="card-body">
                            <h3 class="card-title"><a href="/product/<?php echo $product["code"] ?>" class="text-decoration-none text-dark"><?= $product["title"]?></a></h3>
                            <span class="badge bg-secondary"><?= $product["brand_name"]?></span>
                            <p class="card-text"><?= $product["short_description"]?></p>
                            <h3 class="text-danger">Rs.<?= $product["price"]?></h3>
                        </div>
                    </div>
                </div>
            <?php
            }?>
        </div>
    </div>
</div>
<?php
}
?>