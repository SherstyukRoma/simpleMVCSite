<div id="login-page">
    <div class="container">
      <form class="form-login" action="/admin/checkuser" method='POST'>
        <h2 class="form-login-heading">Присоединиться</h2>
        <div class="login-wrap">
          <input type="email" class="form-control" placeholder="email" autofocus name='email'>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password">
          <label class="checkbox">
            <span class="pull-right">
                <a data-toggle="modal" href="/admin/forgotpassword"> Забыли пароль?</a>
            </span>
          </label>
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Войти</button>
          <hr>
          <div class="registration">
            У Вас нету аккаунта?<br/>
            <a class="" href="/admin/register">
              Создать учетную запись
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>