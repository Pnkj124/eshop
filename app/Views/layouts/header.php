<div class="ui attached stackable menu no-print">
    <div class="ui container">

        <?php
        $action = current_url(true)->getSegment(3);
        $config = config("appConfig");
        ?>
        <div class="header item">
            <img class="logo" src="/img/shopix.png">
            <?php echo $config->appName; ?>
        </div>

        <a class="item <?php echo $action == "dashboard" || $action == "" ? "active" : "" ?>" href="/admin/dashboard">
            <i class="dashboard icon"></i> Dashboard
        </a>
        <div class="ui dropdown item">
            <i class="list icon"></i>
            <span>Catalog</span>
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item <?php echo $action == "categories" ? "active" : "" ?>" href="/admin/categories">
                    <i class="cubes icon"></i> Category
                </a>
                <a class="item <?php echo $action == "brands" ? "active" : "" ?>" href="/admin/brands">
                    <i class="hashtag icon"></i> Brand
                </a>
                <a class="item <?php echo $action == "products" ? "active" : "" ?>" href="/admin/products">
                    <i class="gift icon"></i> Product
                </a>
            </div>
        </div>

        <a class="item <?php echo $action == "sliders" ? "active" : "" ?>" href="/admin/sliders">
            <i class="images icon"></i> Slider
        </a>
        <a class="item <?php echo $action == "orders" ? "active" : "" ?>" href="/admin/orders">
            <i class="calendar icon"></i> Order
        </a>
        <div class="right menu">
            <div class="ui dropdown item">
                <img class="ui avatar image" src="https://semantic-ui.com/images/avatar/large/elliot.jpg">
                <span><?= session()->get('name') ?></span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item <?php echo $action == "setting" ? "active" : "" ?>" href="/admin/setting">
                        <i class="cog icon"></i> Setting
                    </a>
                    <a class="item button" href="<?= site_url('logout') ?>">
                        <i class="logout icon"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>