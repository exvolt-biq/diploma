<h1>Форма на создание</h1>
<style media="screen">
.delete{
  text-align: right;
  width: 15%;
  padding: 9px;
}
.input{
  width: 25%;
}
</style>

<div class="search-input">
  <div class="delete">Дата:</div>  <input id="date" readonly="true" value="<?= $dates ?>" type="date" class="input" placeholder="Измените дату...">
</div>
<div class="search-input">
  <div class="delete">Имя покупателя:</div>
  <!-- <input id="name" value="" type="text" class="input" placeholder="Измените имя покупателя..."> -->

  <select id="name" class="input" style="height:32px" name="example">
<?php foreach ($buyerslist as $key => $v): ?>
  <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
  <?php endforeach; ?>
  </select>
</div>
<div class="search-input">
  <div class="delete">Имя продукта:</div>

  <!-- <input id="product" value="<?= $product ?>" type="text" class="input" placeholder="Измените имя продукта..."> -->

  <select id="product" class="input" style="height:32px" name="example">
<?php foreach ($productlist as $key => $v): ?>
  <option value="<?= $v['id'] ?>"><?= $v['product'] ?> - <?= $v['supply'] ?></option>
  <?php endforeach; ?>
  </select>
</div>
<div class="search-input">
  <div id="button-search" onclick="deleted()" class="button">
    вернутся назад
  </div>
  <div id="button-create" onclick="create()" class="button">
    создать
  </div>
</div>
<script>
function deleted() {
  location.href='/selling/show.php';
};




function create() {
    // Получаем значения из формы
    const date = document.getElementById('date').value;
    const name = document.getElementById('name').value;
    const product = document.getElementById('product').value;
    const supply = 1; //document.getElementById('supply').value;

    // Проверяем заполнение полей
    if (!date || !name || !product || !supply) {
      alert('Все поля должны быть заполнены!');
      return;
    }

    // Создаем URL для создания продажи
    const url = `/api/createSelling.php?d=${encodeURIComponent(date)}&b=${encodeURIComponent(name)}&p=${encodeURIComponent(product)}&q=${encodeURIComponent(supply)}`;

    // Создаем и настраиваем запрос
    const request = new XMLHttpRequest();
    request.open('GET', url);

    request.onreadystatechange = function() {
      if (request.readyState === 4) {
        if (request.status === 200) {
          try {
            const response = JSON.parse(request.responseText);

            // Обрабатываем успешное создание
            if (response.res == true) {
              alert("Продажа успешно создана! пиздато, пошли домой");
              location.href = '/selling/show.php';
            } else {
              alert("Ошибка: " + (response.error || 'Неизвестная ошибка'));
            }
          } catch (e) {
            console.error('Ошибка парсинга JSON:', e);
            alert('Ошибка обработки ответа сервера');
          }
        } else {
          alert('Ошибка сервера: ' + request.status);
        }
      }
    };

    // Отправляем GET-запрос
    request.send();
  }
</script>
