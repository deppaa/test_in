<section class="content">
      <div class="container">
        <h3 class="desk text-center mt-2"><?php echo $desc['description']; ?></h3>
        <div class="card-columns">
        <?php if (empty($tasks)): ?>
                <p>Список заданий пуст</p>
            <?php else: ?>
                <?php foreach ($tasks as $val): ?>
                <div class="card mt-3 text-center content_block">
                  <a href="/tasks/task/<?php echo $val['id']; ?>" class="course-link">
                    <img class="card-img-top img-fluid" src="/public/preview/<?php echo $this->route['id']; ?>.jpg" alt="">
                    <h4 class="card-title mt-2 ml-2 mr-2"><?php echo $val['title']; ?></h4>
                    <p><?php echo $val['text']; ?></p>
                    <div class="card-footer d-flex justify-content-between">
                      <p><?php echo $val['ball']; ?> балов</p>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
      </div>
    </section>