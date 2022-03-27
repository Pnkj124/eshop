<?php
$action = current_url(true)->getSegment(2);
$config = config("appConfig");
?>

<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">

            <?php
            if ($categories != null) {
                foreach ($categories as $category) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"
                           data-bs-toggle="dropdown"> <?= $category["name"]; ?> </a>

                        <?php if ($category["hasChild"]) { ?>
                            <ul class="dropdown-menu">
                                <?php
                                $children = $category["children"];
                                if ($children != null) {
                                    foreach ($children as $child) { ?>
                                        <li><a class="dropdown-item"
                                               href="/categories/<?= $child["code"]; ?>"> <?= $child["name"];?> <?= $child["hasChild"] ? "&raquo;" : ""; ?></a>
                                        <?php if ($child["hasChild"]) { ?>
                                            <ul class="submenu dropdown-menu">
                                            <?php
                                            $subChildren = $child["children"];
                                            if ($subChildren != null) {
                                                foreach ($subChildren as $subChild) {
                                                    ?>
                                                    <li><a class="dropdown-item"
                                                           href="/categories/<?= $subChild["code"]; ?>"><?= $subChild["name"]; ?></a>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>
                                            </ul>
                                        <?php } ?>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>

                <?php }
            } ?>
        </ul>
        <ul class="nav">
            <?php
            $isLoggedIn = session()->get('isLoggedIn');
            if($isLoggedIn){
            ?>
            <li class="nav-item"><a href="#" class="nav-link link-primary px-2" title="<?= session()->get("name") ?>"><?= session()->get("email") ?></a></li>
                <li class="nav-item"><a href="/web/logout" class="nav-link link-dark px-2">Logout</a></li>
            <?php }else { ?>
                <li class="nav-item"><a href="/web/login" class="nav-link link-dark px-2">Login</a></li>
                <li class="nav-item"><a href="/register" class="nav-link link-dark px-2">Sign up</a></li>
            <?php } ?>

        </ul>
    </div>
</nav>

<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <img class="brand_image" src="/img/shopix_full.png" alt="Spectre.css">
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
        <a href="/web/cart" class="btn btn-outline">
            <i class="bi-cart-fill fs-4"></i>

        </a>
    </div>
</header>
</div>