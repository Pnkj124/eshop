<?= $this->extend("layouts/_authLayout") ?>

<?= $this->section("content") ?>

    <div class="five wide column">
        <h2 class="ui purple image header">
            <img src="/img/shopix.png" class="image">
            <br>
            <div class="content">
                Log-in to your account
            </div>
        </h2>

        <form class="ui large form" action="<?= base_url('login') ?>" method="post" data-bitwarden-watching="1">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="email" name="email" id="email" placeholder="E-mail address">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="ui fluid large purple submit button">Login</button>
            </div>

            <div class="ui message ">
                <?php if (isset($validation)) : ?>
                            <?= $validation->listErrors() ?>
                <?php endif; ?>
            </div>

        </form>
    </div>

<?= $this->endSection() ?>