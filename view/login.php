<h1>Вход</h1>
<div class="reg-wrap" >

  <div class="reg" id="app">

    <small v-if="!isEmailValid() && email != ''"> пример почты xxxxx@mail.ru </small>
    <div class="">
      <input v-model="email" :class="{ invalidInput: !isEmailValid() && email != ''}" class="reg-input" type="text" name="" value="" placeholder="введите почту..." required>
    </div>
    <small v-if="!isPasswdLen(passwd)"> пароль дожен быть больше 6 символов </small>
    <div class="">
      <input v-model="passwd" :class="{ invalidInput: !isPasswdLen(passwd)}" class="reg-input" type="text" name="" value="" placeholder="введите пароль..." required minlength="6">
    </div>


    <button class="reg-button" type="button" name="button" @click="functionRequest">Войти</button>


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
      email: ref(''),
      message:  ref('Hello vue!'),
      passwd: ref(''),
      emailregex2: /^[a-zA-Z0-9]+@(email|mail|gmail|yandex|proton)\.(ru|com|me|net)$/i,
    };
  },
  methods: {
    functionRequest() {

      $.ajax({
        url: '/index.php',         /* Куда отправить запрос */
        method: 'get',             /* Метод запроса (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: {e: this.email, p: this.passwd},     /* Данные передаваемые в массиве */
        success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
          alert(data); /* В переменной data содержится ответ от index.php. */
        }
      });
    },
    isPasswdLen(p){
      if (p.length < 6 && p != '') {
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
