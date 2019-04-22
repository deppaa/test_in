    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <div class="login">
                        <div class="registr-stud">
                            <h2 class="registr-title">Редактировать профить</h2>
                            <form action="/account/edit" method="post">
                                <p><input class="form-control" type="text" value="<?php echo $data['surname']; ?>" placeholder="Фамилия" name="surname" autocomplete="off"></p>
                                <p><input class="form-control" type="text" value="<?php echo $data['name']; ?>" placeholder="Имя" name="name" autocomplete="off"></p>
                                <p><input class="form-control" type="text" value="<?php echo $data['pat']; ?>" placeholder="Отчество" name="pat" autocomplete="off"></p>
                                <p><input class="form-control" type="text" value="<?php echo $data['vuz']; ?>" placeholder="Вуз" name="vuz" autocomplete="off"></p>
                                <p><input class="form-control" type="text" value="<?php echo $data['group_name']; ?>" placeholder="Группа" name="group" autocomplete="off"></p>
                                <p><input class="form-control" type="text" value="<?php echo $data['login']; ?>" placeholder="Логин" name="login" autocomplete="off"></p>
                                <div class="registr-form_foch">
                                    <label class="registr-form_avatar">Выберите аватар:</label>
                                    <br>
                                    <input type="file" class="" name="foto">
                                    <br>
                                </div>
                                <p><input class="btn btn-primary" type="submit" value="Редактировать"></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>