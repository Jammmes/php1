    
<div class="text-center">
  <h1 class="display-3">Добро пожаловать, Администратор <?=$_COOKIE['login'];?> !</h1>
  <a href="/logout" class="btn btn-warning btn-lg active" role="button">Выход</a>
  <div class="row justify-content-center">
    <h3 >Перечень всех заказов:</h3>
  </div>
  <div id = "ordersList">
    <!-- Подключаем список всех заказов -->
    <?php require_once('adminOrderList.php');?>
  </div>
</div>

