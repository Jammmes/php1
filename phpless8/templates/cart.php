
<div class="alert alert-success text-center">
  <h4>Корзина</h4>
</div>
<!-- Заголовок -->
<div class="row text-center">
  <div class="col-sm-4 col-xs-4">
    <div class="border m-1">Наименование</div>
  </div>
  <div class="col-sm-4 col-xs-4">
    <div class="border m-1">Количество</div>
  </div>
  <div class="col-sm-4 col-xs-4">
   <div class="border m-1">Действие</div>
  </div>
</div>
<!--Вывод  содержимого корзины -->
<?php  foreach(getCart('cart') as $cartRow ):?>
  <?php echo HTMLRender('cartUnit.html',$cartRow);?>
<?php endforeach;?>
<form action="createOrder" method="post">
  <button class="btn btn-success m-2" type="submit">Оформить заказ</button>
</form>