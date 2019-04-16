    <section class="content">
      <div class="container task-more">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <h2>Статистика по задачам</h2>
            <h3>Номер группы <?php echo $group['number_group']; ?></h3>
            <div class="task-more_title">
              <div class="row">
              <div class="col-md-1 ml-2">
                №
              </div>
              <div class="col-md-1">
                Балл
              </div>
              <div class="col-md-3">
                Процент решивших
              </div>
              <div class="col-md-2 pl-2">
                Решили
              </div>
              <div class="col-md-2 pl-2">
                Не решили
              </div>
              <div class="col-md-3"></div>
            </div>
            </div>
            <hr>
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <?php if (empty($tasks)): ?>
                <p>Список заданий пуст</p>
            <?php else: ?>
              <?php $num = 1; ?>
                <?php foreach ($tasks as $val): ?>
                  <div class="task-more_item form-control">
                    <div class="row">
                    <div class="col-md-1">
                      <h3><?php echo $num++; ?></h3>
                    </div>
                    <div class="col-md-1">
                      <h3><?php echo htmlspecialchars($val['ball'], ENT_QUOTES); ?></h3>
                    </div>
                    <div class="col-md-3 d-flex">
                      <progress value="0" max="100"></progress>
                        <span class="progress-value">0%</span>
                    </div>
                    <div class="col-md-2">
                      <h3><?php echo htmlspecialchars($val['solved'], ENT_QUOTES); ?></h3>
                    </div>
                    <div class="col-md-2">
                      <h3>0</h3>
                    </div>
                    <div class="col-md-3 d-flex">
                      <a href="/moder/taskmore/<?php echo $val['id']; ?>" class="form-control btn btn-success" title="Подробнее"><i class="fas fa-money-check"></i></a>
                      <a href="/moder/condition/<?php echo $val['id']; ?>" class="form-control btn btn-primary text-white" title="Условие"><i class="fas fa-align-justify"></i></a>
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