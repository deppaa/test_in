<section class="content">
    <div class="container">
        <div class="card-columns">
            <?php if (empty($allCourse)) : ?>
                <p>Список курсов пуст</p>
            <?php else : ?>
                <?php foreach ($allCourse as $val) : ?>
                    <div class="card mt-3 text-center content_block">
                        <a href="/tasks/tasks/<?php echo htmlspecialchars($val['id'], ENT_QUOTES); ?>" class="course-link">
                            <img class="card-img-top img-fluid" src="/public/preview/<?php echo $val['id']; ?>.jpg" alt="">
                            <h4 class="card-title mt-2 ml-2 mr-2"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></h4>
                            <div class="card-footer d-flex justify-content-between">
                                <p>Автор: <?php echo htmlspecialchars($val['autor'], ENT_QUOTES); ?></p>
                                <p><?php echo date('d.m.Y', strtotime($val['date'])); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>