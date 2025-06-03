<?php
include 'api/selling-read.php';

?>


<!--
<div id="app">
  <h3>{{ message2 }}</h3>
  <input v-model="message2" placeholder="отредактируй меня" />
  <button type="button" @click="cnt++" name="button"> is {{ cnt }}</button>

<form class="" action="#" method="post">

  <p> {{ lic }}</p>
  <input type="checkbox" name="" v-model="lic" value="lic"> Я прода душу добровольное
  <button type="button" :disabled="!lic" name="button"> Отправить </button>
</form>

</div>
<script>
  const { createApp, ref } = Vue
  createApp({
    setup() {
      return {
        lic: ref("false")
      }
    }
  }).mount('#app')
</script> -->

<!-- <button type="button" onclick="f(57)" name="button"> отправить тест </button>
<script type="text/javascript">
function f(_id) {
  $.get('/index.php', {id: _id}, function(data){
      alert(data);
  });
}
</script> -->

<h1>Поиск по продажам</h1>
<div class="search-input">
  <input type="text" class="input" placeholder="Введите ваш запрос...">
  <div id="button-search" class="button">
    поиск
  </div>
  <div id="button-create" onclick="create()" class="button">
    создать
  </div>
</div>
<div class="glav">
  <div class="content">
    <?php
    $t = $result;
    if ($t->num_rows > 0) {
      while ($r = $t->fetch_object()) {
        ?>
        <div class="item" id='<?= "card".$r->id ?>'>
          <ul>
            <li> id - <?= htmlspecialchars($r->id); ?> </li>
            <!-- $r->date -> strtotime() -> date("d-m-Y")
            2025-12-31 -> 5765432765492873289 -> 31-12-2025 -->

            <li> date - <?= htmlspecialchars(date("d-m-Y", strtotime($r->date))); ?> </li>
            <li> buyer - <?= htmlspecialchars($r->name); ?> </li>
            <li> product - <?= htmlspecialchars($r->product); ?></li>
          </ul>
          <div class="button-container">
            <div id="button-update" onclick="updated('<?= $r->id ?>')" class="button">
              изменить
            </div>
            <div id="button-delete" onclick="deletes('<?= $r->id ?>')" class="button">
              удалить
            </div>
          </div>
        </div>
        <?php
      }
    } else {
      echo "<p>Нет данных о продажах</p>";
    }
    ?>
  </div>
</div>
<script type="text/javascript">
function sendAPIfunc(cmmd) {
  const request = new XMLHttpRequest();
  const url = "/api/" + cmmd;
  request.open('GET', url);
  request.addEventListener("readystatechange", () => {
    if (request.readyState === 4 && request.status === 200) {
      const obj = JSON.parse(request.responseText);
      alert(obj.res);
    }
  });
  request.send();
};

function deletes(id) {
  const request = new XMLHttpRequest();
  const url = "/api/deleteSellingId.php?id=" + id;
  request.open('GET', url);
  request.addEventListener("readystatechange", () => {
    if (request.readyState === 4 && request.status === 200) {
      const obj = JSON.parse(request.responseText);
      alert(obj.res);
      document.getElementById('card'+id).remove();
    }
  });
  request.send();
};


function updated(id) {
  location.href='/selling/updated.php?id=' + id;
};
function create(id) {
  location.href='/selling/create.php?id=' + id;
};
</script>
