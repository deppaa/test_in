    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-5">
            <div class="login">
              <div class="registr-stud">
                <h2 class="registr-title">Регистрация для студентов</h2>
                <form action="/account/registr" method="post">
                  <p><input class="form-control" type="text" placeholder="Фамилия" name="surname" autocomplete="off"></p>
                  <p><input class="form-control" type="text" placeholder="Имя" name="name" autocomplete="off"></p>
                  <p><input class="form-control" type="text" placeholder="Отчество" name="pat" autocomplete="off"></p>
                  <p><input class="form-control" type="text" placeholder="Вуз" name="vuz" autocomplete="off"></p>
                  <p><input class="form-control" type="text" placeholder="Группа" name="group" autocomplete="off"></p>
                  <p><input class="form-control" type="text" placeholder="Логин" name="login" autocomplete="off"></p>
                  <p><input class="form-control" type="email" placeholder="email" name="email" autocomplete="off"></p>
                  <p><input class="form-control" type="password" placeholder="Пароль" name="password" autocomplete="off"></p>
                  <p><input class="form-control" type="password" placeholder="Пароль повторно" name="password2" autocomplete="off"></p>
                  <div class="registr-form_foch">
                    <label class="registr-form_avatar">Выберите аватар:</label>
                    <br>
                    <input type="file" class=""  name="foto">
                    <br>
                    <input class="" type="checkbox" name="check" value="1"> <a href="#">Соглашение пользователя</a>
                    </div>
                  <p><input class="btn btn-primary" type="submit" value="Регистрация"></p>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </section>