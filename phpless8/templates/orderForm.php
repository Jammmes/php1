<div>Товары из заказа:</div>

<form action = "/addOrder" method = "post" class ="justify-content-center border p-1 m-1">
  
  <div class="row m-1 p-1">
    <div class="text-center p-1 col-sm-2 col-xs-2">Наименование</div>
    <div class="text-center p-1 col-sm-2 col-xs-2">Количество</div>
  </div>

  <?php foreach (getCart('cart') as $order) :?>
    <?php echo HTMLRender('orderUnit.html',$order)?>
  <?php endforeach?>

  <input type="hidden" name = "user_id" value ="<?=$_COOKIE['user_id'];?>">
  <button type="submit" class ="m-2">Сохранить заказ</button>
</form>