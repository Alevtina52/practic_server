<div class="login-box">

    <h2>Регистрация нового пользователя</h2>

    <!-- Сообщение об одномарной ошибке -->
    <?php if (!empty($message)): ?>
        <div class="alert alert-error">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul class="form-errors">
            <?php foreach ($errors as $fieldErrors): ?>
                <?php foreach ($fieldErrors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post">

        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <label>
            Имя
            <input type="text" name="name" value="<?= $old['name'] ?? '' ?>">
        </label>

        <label>
            Логин
            <input type="text" name="login" value="<?= $old['login'] ?? '' ?>">
        </label>

        <label>
            Пароль
            <input type="password" name="password">
        </label>

        <button>Зарегистрироваться</button>
    </form>

</div>
