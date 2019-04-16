    <section class="content">
      <div class="container task-more">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <h2>Студенты, выполнившие эту работу</h2>
            <div class="task-more_title">
              <div class="row">
              <div class="col-md-1 ml-2">
                №
              </div>
              <div class="col-md-3">
                Студент
              </div>
              <div class="col-md-3 ml-5">
                Дата выполнения
              </div>
              <div class="col-md-1">
                Балл
              </div>
              <div class="col-md-3">
              </div>
            </div>
            </div>
            <hr>
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
          <?php if (empty($users)): ?>
              <p>Список пуст</p>
            <?php else: ?>
              <?php $num = 1; ?>
                <?php foreach ($users as $val): ?>
                  <div class="task-more_item form-control">
                    <div class="row">
                      <div class="col-md-1">
                        <h3><?php echo $num++; ?></h3>
                      </div>
                      <div class="col-md-4 d-flex">
                        <img class="rounded-circle" src="/public/avatarsAccount/<?php echo $val['user_id']; ?>.jpg" width="40px" height="40px" alt="">
                        <h3 class="stud-fio"><?php echo $val['name']; ?></h3>
                      </div>
                      <div class="col-md-3">
                        <h3><?php echo date('d.m.Y', strtotime($val['date'])); ?></h3>
                      </div>
                      <div class="col-md-1">
                        <h3><?php echo $val['ball']; ?></h3>
                      </div>
                      <div class="col-md-3">
                        <a href="/moder/code/<?php echo $val['task_id']; ?>_<?php echo $val['user_id']; ?>" class="form-control btn btn-primary float-right text-white" title="Решение"><i class="fas fa-code"></i></a>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </section>