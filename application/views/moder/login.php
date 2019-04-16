    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-5">
            <div class="login">
              <div class="login-choice login-choice-moder d-flex">
                <a href="/account/login" class="" role="button">Студент</a>
                <a href="#" class="" role="button">Преподователь</a>
              </div>
              <div class="login-stud">
                <h2 class="login-title">Авторизация</h2>
                <form action="/moder/login" method="post">
                  <p><input class="form-control" type="login" placeholder="Логин" name="login"></p>
                  <p><input class="form-control" type="password" placeholder="Пароль" name="password"></p>
                  <p><input class="btn btn-primary" type="submit" value="Войти"></p>
                </form>
                <p><a href="#" class="login-recover">Забыли пароль?</a></p>
                <p><a href="/moder/registr" class="login-reg">Регистрация</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </section>