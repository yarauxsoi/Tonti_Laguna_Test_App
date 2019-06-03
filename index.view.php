<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Canvas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h1>Генератор изображения</h1>
  <form method="GET" action="/submit.php" name="GenForm" onsubmit="return validateForm()">
    <div class="form-group">
      <label for="width">Ширина изображения (px)</label>
      <input type="text" id="width" name="width" class="form-control">
    </div>
    <div class="form-group">
      <label for="height">Высота изображения (px)</label>
      <input type="text" id="height" name="height" class="form-control">
    </div>
    <div class="form-group">
      <label for="radius">Радиус окружности</label>
      <input type="text" id="radius" name="radius" class="form-control">
    </div>
    <div class="form-check">
      <input type="checkbox" id="intersection" name="intersection" class="form-check-input" checked>
      <label class="form-check-label" for="intersection">Окружности могут пересекаться</label>
    </div>
    <div class="form-group">
      <label for="quantity">Количество окружностей</label>
      <select class="form-control" id="quantity" name="quantity">
        <option>5</option>
        <option>10</option>
        <option>20</option>
        <option>50</option>
      </select>
    </div>
    <button type="submit" class="btn btn-secondary">Сгенерировать изображение</button>
  </form>
  <script src="app.js"></script>
</body>
</html>