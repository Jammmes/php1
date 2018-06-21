<form class="border p-2" method="post" action="/index.php">
  <div class="form-row m-2">
    <div class="col">
      <input type="text" name = "user" class="form-control" placeholder="Ваше имя">
    </div>
    <div class="col">
      <input type="text" name = "email" class="form-control" placeholder="Email">
    </div>
  </div>
  <div class="form-group m-2 text-center justify-content-center">
    <textarea class="form-control mb-1" name = "comment" id="comment" placeholder="Отзыв" rows="3"></textarea>
  <button type="submit" class="btn btn-primary m-2">Отравить</button>
  </div>
</form>