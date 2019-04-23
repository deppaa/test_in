    <section class="content">
        <div class="container all-task">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php if (empty($course)) : ?>
                        <p>Список постов пуст</p>
                    <?php else : ?>
                        <?php foreach ($course as $val) : ?>
                            <div class="task d-flex form-control form-group">
                                <h3><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></h3>
                                <div class="task-but d-flex">
                                    <a href="/admin/edit/<?php echo $val['id']; ?>" class="form-control btn btn-primary" title="Редактировать"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="/admin/delate/<?php echo $val['id']; ?>" class="form-control btn btn-danger" title="Удалить"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>