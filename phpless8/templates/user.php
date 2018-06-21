    <div class="text-center">
      <h1 class="display-3">Добро пожаловать, пользователь <?=$_COOKIE['login'];?></h1>
      <a href="/logout" class="btn btn-info active m-3" role="button">Выход</a>
    <div class="row justify-content-center">
      <h3 >Перечень ваших заказов:</h3>
    </div>

     <?php foreach (getTitleOrdersByUser($_COOKIE['user_id']) as $ordersTitle):?>
      <?php echo HTMLRender('userOrdersTitle.html', $ordersTitle)?>

    <div class="row border m-1 bg-dark text-light">
      <div class="p-1 col-sm-2 col-xs-1">Название товара</div>
      <div class="p-1 col-sm-2 col-xs-1">Страна-производитель</div>
      <div class="p-1 col-sm-2 col-xs-1">Количество</div>
      <div class="p-1 col-sm-2 col-xs-1">Цена</div>
    </div>
      <?php foreach (getContentOrderById($ordersTitle['id']) as $ordersContent):?>
          <?php echo HTMLRender('userOrdersContent.html', $ordersContent)?>
        <?php endforeach?>
    <?php endforeach?>

  </div>