<h1>Форма обновления</h1>
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
  <div class="delete">Дата:</div>
  <input
  id="date"
  value="<?= $date ?>"
  type="date"
  class="input"
  placeholder="Измените дату..."
  >
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
      <option value="<?= $v['id'] ?>"> <?= $v['product'] ?> - <?= $v['supply'] ?> </option>
    <?php endforeach; ?>
  </select>
</div>
<div class="search-input">
  <div id="button-search" onclick="deleted()" class="button">
    вернутся назад
  </div>
  <div id="button-create" onclick="update(id)" class="button">
    изменить
  </div>
</div>
<?php
// print_r($buyerslist);
// print_r($buyerslist);

// $var = $_GET['var'] ?? die('err');
// 
// if (isset($_GET['var'])) {
//   $var = $_GET['var'];
// }else {
//   die('err');
// }

foreach ($buyerslist as $key => $v) {
  print_r($v);
  echo "<br>";
  // echo "$v[id] = $v[name]<br>";
}
echo "<hr>";

foreach ($productlist as $key => $v) {
  print_r($v);
  echo "<br>";
  // echo "$v[id] = $v[name]<br>";
}
?>
<script>
function deleted() {
  location.href='/selling/show.php';
};



function update() {
  // Получаем значения из формы
  const id = <?= $_GET["id"] ?>;
  const date = document.getElementById('date').value;
  const name = document.getElementById('name').value;
  const product = document.getElementById('product').value;

  // Проверяем заполнение полей
  if (!date || !name || !product) {
    alert('Все поля должны быть заполнены!');
    return;
  }

  // Создаем URL с параметрами
  const url = `/api/updateSelling.php?id=${id}&d=${encodeURIComponent(date)}&b=${encodeURIComponent(name)}&p=${encodeURIComponent(product)}`;

  // Создаем и настраиваем запрос
  const request = new XMLHttpRequest();
  request.open('GET', url);

  request.onreadystatechange = function() {
    if (request.readyState === 4) {
      if (request.status === 200) {
        try {
          const response = JSON.parse(request.responseText);
          // alert(response.res);

          // Обновляем интерфейс при успешном изменении
          if (response.res === 'пиздато') {
            // location.reload(); // или точечное обновление данных
            alert("пиздато, пошли домой");
            location.href='/selling/show.php';
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
};

//
//   const request = new XMLHttpRequest();
// const url = "/api/updateSellingId.php?id=" + ;
//   console.log(document.getElementById('date').value);
//   console.log(document.getElementById('name').value);
//   console.log(document.getElementById('product').value);
//   request.open('GET', url);
//   request.addEventListener("readystatechange", () => {
//     if (request.readyState === 4 && request.status === 200) {
//       const obj = JSON.parse(request.responseText);
//       alert(obj.res);
//       document.getElementById('value'+id).remove();
//     }
//   });
//   // request.send();
// };
</script>
