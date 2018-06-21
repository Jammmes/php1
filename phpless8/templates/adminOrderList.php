  <?php foreach (getTitleOrders() as $titleRow):?>
    <?php echo HTMLRender('titleOrders.html', $titleRow)?>
      <div class="row border m-1 text-light bg-dark">
        <div class="p-1 col-sm-1 col-xs-1">Название товара</div>
        <div class="p-1 col-sm-2 col-xs-2">Страна-производитель</div>
        <div class="p-1 col-sm-1 col-xs-1">Цена</div>
        <div class="p-1 col-sm-1 col-xs-1">Количество</div>
        <div class="p-1 col-sm-1 col-xs-1">Сумма</div>
      </div>
      <?php foreach (getContentOrderById($titleRow['id']) as $contentRow):?>
        <?php echo HTMLRender('contentOrders.html', $contentRow)?>
      <?php endforeach?>
  <?php endforeach?>