<?= $this->extend("web/layouts/_layout") ?>

<?= $this->section("content") ?>

<div class="">

    <div class="container d-flex flex-wrap justify-content-center ">

        <div class="col-6 card py-2 px-2">

            <h3 class="text-left">Register Membership</h3>

            <form class="form" action="<?= base_url('register') ?>" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John doe">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" >
                </div>

                <div class="mb-3">
                    <label for="PhoneNumber" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                </div>

                <button type="submit" class="btn btn-primary">Register</button>

                <div class="ui message ">
                    <?php if (isset($validation)) : ?>
                        <?= $validation->listErrors() ?>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>


    <script>

        var passwordElm = document.getElementById("password");
        var confirmPasswordElm = document.getElementById("confirm_password");

        confirmPasswordElm.on('keyup',function(e){
            event.preventDefault();

            let confirmPassword = confirmPasswordElm.value;
            let password = passwordElm.value;
            if(confirmPassword !== password)
            {
                alert("password and confirm password do not match.")
            }
        })



    </script>

<?= $this->endSection() ?>