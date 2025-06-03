<h1>Регистрация</h1>
<div class="reg-wrap" >

  <div class="reg" id="app">
    <small v-if="!isNameValid() && name != ''"> Используйте только кириллицу, пример: иван иванов иванович</small>
    <div class="">
      <input v-model="name" :class="{ invalidInput: !isNameValid() && name != ''}" class="reg-input" type="text" name="" value="" placeholder="введите ФИО..." required>
    </div>
    <small v-if="!isEmailValid() && email != ''"> пример почты xxxxx@mail.ru </small>
    <div class="">
      <input v-model="email" :class="{ invalidInput: !isEmailValid() && email != ''}" class="reg-input" type="text" name="" value="" placeholder="введите почту..." required>
    </div>
    <small v-if="!isPasswdValid()"> Пароли не совпадают</small>
    <small v-if="!isPasswdLen(passwd)"> пароль дожен быть больше 6 символов </small>
    <div class="">
      <input v-model="passwd" :class="{ invalidInput: !isPasswdValid() || !isPasswdLen(passwd)}" class="reg-input" type="text" name="" value="" placeholder="введите пароль..." required minlength="6">
    </div>
    <small v-if="!isPasswdValid()"> Пароли не совпадают</small>
    <small v-if="!isPasswdLen(passwd2)"> пароль дожен быть больше 6 символов </small>
    <div class="">
      <input v-model="passwd2" :class="{ invalidInput: !isPasswdValid() || !isPasswdLen(passwd2)}" class="reg-input" type="text" name="" value="" placeholder="введите потверждение пароля..." required minlength="6">
    </div>
    <div class= "reg-checkbox">
      <input type="checkbox" name="" value="">
      вы согласны на персональные данные?
    </div>
    <button class="reg-button" type="button" name="button" @click="functionRequest">Зарегистрироваться</button>
    {{name + isNameValid()}}
    <div class="reg-logon">
      <a href="/app/logs.php"> Если вы уже зарегистрированы то Войти </a>
    </div>
  </div>
</div>
<style media="screen">
  .invalidInput{
    border-color: red;
    border-width: 3px;
    outline-color: red;
    border-style: solid;
    border-radius: 6px;
  }
</style>
<script>
const { createApp, ref } = Vue
app = createApp({
  data() {
    return {
      name: ref(''),
      email: ref(''),
      message:  ref('Hello vue!'),
      passwd: ref(''),
      passwd2: ref(''),
      emailregex2: /^[a-zA-Z0-9]+@(email|mail|gmail|yandex|proton)\.(ru|com|me|net)$/i,
      nameregex: /^[а-яА-Я]+ [а-яА-Я]+ [а-яА-Я]+$/i,
    };
  },
  methods: {
    functionRequest() {
      if (!(isPasswdValid() && isNameValid() && isEmailValid())) {
        return;
      }
      $.ajax({
        url: '/index.php',         /* Куда отправить запрос */
        method: 'get',             /* Метод запроса (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: {e: this.email, p: this.passwd, p2: this.passwd2, n: this.name},     /* Данные передаваемые в массиве */
        success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
          alert(data); /* В переменной data содержится ответ от index.php. */
        }
      });
    },
    isNameValid(){
        return this.nameregex.test(this.name);
    },
    isPasswdLen(p){
      if (p.length < 6 && p != '') {
        return false;
      }
      return true;
    },
    isPasswdValid(){
      if (this.passwd != this.passwd2) {
        // console.log("пароли не совпадают");
        return false;
      }
      return true;
    },
    isEmailValid(){
      return this.emailregex2.test(this.email);
    }
  }
}).mount('#app');
</script>
