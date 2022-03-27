<?php
    $config = config('appConfig');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/shopix.png">
    <title><?= $config->appName; ?></title>
    <?php
    echo link_tag('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    echo link_tag('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css');
    echo link_tag('web/css/app.css');
    ?>

    <style type="text/css">

        @media all and (min-width: 992px) {

            .dropdown-menu li{
                position: relative;
            }
            .dropdown-menu .submenu{
                display: none;
                position: absolute;
                left:100%; top:-7px;
            }
            .dropdown-menu .submenu-left{
                right:100%; left:auto;
            }

            .dropdown-menu > li:hover{ background-color: #f1f1f1 }
            .dropdown-menu > li:hover > .submenu{
                display: block;
            }
        }
        @media (max-width: 991px) {

            .dropdown-menu .dropdown-menu{
                margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
            }

        }
    </style>
    <?= $this->renderSection('styles') ?>

</head>

<body class="bg-gray">

<?= $this->include('web\layouts\header') ?>

<?= $this->renderSection('content') ?>

<?= $this->include('web\layouts\footer') ?>

<?php
echo script_tag("https://code.jquery.com/jquery-3.6.0.min.js");
echo script_tag("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js");

?>
<script type="text/javascript">
    //	window.addEventListener("resize", function() {
    //		"use strict"; window.location.reload();
    //	});


    document.addEventListener("DOMContentLoaded", function(){


        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function(element){
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })



        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {

            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
                everydropdown.addEventListener('hidden.bs.dropdown', function () {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });

            document.querySelectorAll('.dropdown-menu a').forEach(function(element){
                element.addEventListener('click', function (e) {

                    let nextEl = this.nextElementSibling;
                    if(nextEl && nextEl.classList.contains('submenu')) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        console.log(nextEl);
                        if(nextEl.style.display == 'block'){
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }

                    }
                });
            })
        }
        // end if innerWidth

    });
    // DOMContentLoaded  end
</script>
<?= $this->renderSection('scripts') ?>
</body>
