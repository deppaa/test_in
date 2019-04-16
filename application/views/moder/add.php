  <section class="content">
    <div class="container add">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
      <h2 class="add-title">Добавить курс</h2>
      <form action="/moder/add" method="post">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Номер группы" name="task-number_group">
        </div>
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Название" name="task-name">
        </div>
        <div class="form-group">
          <textarea class="form-control add-task_desc" placeholder="Описание" name="task-desk"></textarea>
        </div>
        <div class="form-group">
          <select class="form-control" name="lang" id="">
              <option>Выберите язык</option>
              <option value="1">Csharp</option>
              <option value="8">PHP</option>
              <option value="4">Java</option>
              <option value="5">Python</option><
              <option value="17">Javascript</option>
              <option value="9">Pascal</option>
          </select>
        </div>
        <div class="form-group">
          <label class="">Выберите заставку:</label>
          <input class="form-control" type="file" name="fon">
        </div>
        <div id="list">
          <div class="add-task">
            <div class="form-group">
              <h2>Задание 1</h2>
            </div>
            <div class="form-group">
              <input class="form-control add-task_bal" type="text" placeholder="Вес задания" name="task-ball1">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Название" name="task-title1">
            </div>
            <div class="form-group">
              <textarea class="form-control add-task_desc" placeholder="Текст задания" name="task-text1"></textarea>
            </div>
            <div class="form-group">
              <p style='color: #b3b3b3;'>Выходные данные необходимо вводить через ENTER</p>
            </div>
            <div class="form-group">
              <h3>Тест 1</h3>
            </div>                  
            <div class="add-task_test d-flex">
                <div class="form-group">
                <textarea class="form-control" placeholder="Входные данные" name="input-text1-1"></textarea>
                </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="Выходные данные" name="output-text1-1"></textarea>
              </div>
            </div>
            <div class="form-group">
              <h3>Тест 2</h3>
            </div>                  
            <div class="add-task_test d-flex">
                <div class="form-group">
                <textarea class="form-control" placeholder="Входные данные" name="input-text2-1"></textarea>
                </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="Выходные данные" name="output-text2-1"></textarea>
              </div>
            </div>
            <div class="form-group">
              <h3>Тест 3</h3>
            </div>                  
            <div class="add-task_test d-flex">
                <div class="form-group">
                <textarea class="form-control" placeholder="Входные данные" name="input-text3-1"></textarea>
                </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="Выходные данные" name="output-text3-1"></textarea>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" value = "1" id="count" name="count">
        <div class="add-del-add">
        <button type="button" class="btn btn-success" id="add-task-js"><i class="fas fa-plus"></i></button>
        <button type="button" class="btn btn-danger" id="del-task-js"><i class="far fa-trash-alt"></i></button>
        </div>
        <p><input class="btn btn-primary" type="submit" value="Добавить"></p>
      </form>
      </div>
      <div class="col-md-2"></div>
    </div>
    </div>
  </section>