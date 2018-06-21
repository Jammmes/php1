 <div class="row">
      <div class="col-sm-8 col-xs-8 border p-3 m-0">
        <div class="alert alert-success text-center">
          <h4>Товары</h4>
        </div>
        <!-- Выводим список товаров -->
        <div class="d-flex justify-content-around flex-wrap">
          <?php  foreach(getgoods() as $good ):?>
            <?php echo HTMLRender('goodUnit.html',$good);?>
          <?php endforeach;?>
        </div>
      </div>
      <div class="col-sm-4 col-xs-4 border p-3 m-0">
          <div class="alert alert-success text-center">
            <h4>Корзина</h4>
          </div>
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
       <!--вывод -->
          <?php  foreach(getCart('cart') as $cartRow ):?>
            <?php echo HTMLRender('cartUnit.html',$cartRow);?>
          <?php endforeach;?>
        <form action="createOrder" method="post">
            <button class="btn btn-success m-2" type="submit">Оформить заказ</button>
        </form>
      </div>  
    </div>