<div class="py-5 bg-light">
    <div class="container">
    <h2><?= $product["title"]?></h2>

        <div class="row row-cols-1 row-cols-sm-4 row-cols-md-4 g-2">
            <div class="col-md-8">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                        <img src="<?= "/web/img/uploads/".$product["image"] ?>" alt="product" style="max-width: 300px;">
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <p><?= $product["brand_name"]?></p>
                        <strong class="d-inline-block mb-2 text-primary"><?= $product["category_name"]?></strong>
                        <h3 class="mb-0"><?= $product["title"]?></h3>
                        <p class="card-text mb-auto"><?= $product["long_description"]?></p>
                        <h3 class="text-danger">Rs.<?= $product["price"]?></h3>
                            <hr>
                            <form action="/products/buy" method="post">
                                <?php
                                $isLoggedIn = session()->get('isLoggedIn');
                                if($isLoggedIn){
                                ?>
                                    <input type="hidden" name="product_id" value="<?= $product["id"]?>">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" value="1"/>
                                <button type="submit" class="btn btn-primary"> Buy</button>
                                <?php }else{?>
                                    <p class="alert alert-info">please login to buy</p>
                                <?php } ?>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


