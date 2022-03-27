<div class="py-5">
    <h2>Categories</h2>
    <br>
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-4 row-cols-md-6 g-2">
            <?php
            if($categories != null){
                foreach ($categories as $category){
                ?>
                <div class="col">
                    <a href="/categories/<?php echo $category["code"] ?>" class="text-decoration-none text-primary">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-title"><?= $category["name"]; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }} ?>
        </div>
    </div>
</div>