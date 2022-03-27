<?= $this->extend("web/layouts/_layout") ?>

<?= $this->section("content") ?>

        <div class="container d-flex flex-wrap justify-content-center ">
            <div class="col-6 card py-2 px-2">
                <h3 class="text-left">User Login</h3>

                <form class="form" action="<?= base_url('login') ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                    <div class="ui message ">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->listErrors() ?>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

<?= $this->endSection() ?>