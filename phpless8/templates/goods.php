<div class="row">
  <div class="col-sm-8 col-xs-8 border p-3 m-0">
    <div class="alert alert-success text-center">
      <h4>Товары</h4>
    </div>
    <!-- Выводим список товаров -->
    <div class="d-flex justify-content-around flex-wrap" id = "goodsList">
      <?php  foreach(getgoods() as $good ):?>
        <?php echo HTMLRender('goodUnit.html',$good);?>
      <?php endforeach;?>
    </div>
  </div>
  <div class="col-sm-4 col-xs-4 border p-3 m-0" id="cart">
    <!-- Корзина -->
    <?php require_once('cart.php');?>
  </div>
</div>