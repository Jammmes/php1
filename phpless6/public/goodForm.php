<form class= "border p-2" method="post" action = "edit.php<?=$ifID;?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="goodName">Наименование товара</label>
    <input type="text" class="form-control" id="goodName" name = "name" value="<?= $good['name'];?>">
  </div>
  <div class="form-group">
    <label for="goodCountry">Страна-производитель</label>
    <input type="text" class="form-control" id="goodCountry" name = "country" value=" <?= $good['country'];?>" >
  </div>
  <label for="goodPrice">Цена</label>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">$</span>
    </div>
    <input type="text" id="goodPrice" class="form-control" name = "price" value = " <?= $good['price'];?>" aria-label="Amount (to the nearest dollar)">
    <div class="input-group-append">
      <span class="input-group-text">.00</span>
    </div>
  </div>
  <div class="form-row m-2 border p-2">
    <div class="col">
      <div class="card mx-auto" style="width: 22rem;">
        <img class="card-img-top" src=" <?= $good['img'];?>" alt="...">
      </div>
    </div>
    <div class="col">
      <div class="form-group text-center">
        <input type="file" class="form-control-file" id="imgFile" name = "img">
      </div>
    </div>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary m-1">Сохранить</button>
    <a href="/delete.php?id=<?= $good['id'];?>" class="btn btn-danger " role="button" aria-pressed="true">Удалить</a>
  </div>
</form>