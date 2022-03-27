<?= $this->extend("web/layouts/_layout") ?>

<?= $this->section("content") ?>

   <div class="container">
       <h2>Shopping Cart</h2>
       <br>
   </div>
<div class="container d-flex align-items-center">

   <?php if($order != null && $order_details != null):?>
       <table class="table">
           <thead>
           <tr>
               <th scope="col">#</th>
               <th scope="col">Image</th>
               <th scope="col">Product Name</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Total Price</th>
               <th scope="col"></th>
           </tr>
           </thead>
           <tbody>
           <?php
           $counter = 1;
           if($order_details != null){
               foreach ($order_details as $order_detail){
                   ?>
                   <tr>
                       <th scope="row"><?= $counter++;?></th>
                       <td>
                           <img src="/web/img/uploads/<?= $order_detail["product_image"];?>" style="max-width: 100px;" alt="product image"></td>
                       <td><?= $order_detail["product_name"];?></td>
                       <td><?= $order_detail["product_price"];?></td>
                       <td>
                           <form action="/web/cart/<?= $order_detail["id"];?>/update-quantity" method="post">
                               <input type="number" name="quantity" id="quantity" min="1" value="<?= $order_detail["sales_quantity"];?>">
                               <button class="btn btn-primary btn-sm"> Update</button>
                           </form>
                       </td>
                       <td><span class="total_amount">
                    <?php
                    $total = $order_detail["product_price"] * $order_detail["sales_quantity"];
                    echo $total;
                    ?>
                </span></td>
                       <td><a href="/web/cart/<?= $order_detail["id"];?>/remove" class="btn btn-danger remove_item"><i class="bi-backspace" role="img" aria-label="Dribbble"></i></a></td>
                   </tr>
               <?php }
           } ?>
           <tr>
           </tbody>
           <tfoot class="fw-bold">
           <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td>Sub Total: </td>
               <td><?= $order["order_total"]?></td>
               <td></td>
           </tr>
           <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td>Vat: </td>
               <td><?php

                   $total = $order["order_total"];
                   $vat = .13*$total;
                   echo $vat;

                   ?></td>
               <td></td>
           </tr>
           <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td>Grand Total: </td>
               <td><?= $order["order_total"] + $vat; ?></td>
               <td></td>
           </tr>

           </tfoot>
       </table>
<?php else:?>
        <div class="alert alert-info col-12 text-center py-5">
            <i class="bi-cart fs-1 text-gray"></i>
            <h3>No Items in the cart</h3>
            <a href="/" class="btn btn-primary btn-sm"> Continue shopping</a>
        </div>
<?php endif;?>
</div>

<?= $this->endSection() ?>