<div class="form-card">
    <h2>Добавление сотрудника регистратуры</h2>

    <?php if (!empty($message)): ?>
        <p class="form-message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <?php foreach ($errors as $fieldErrors): ?>
                <?php foreach ($fieldErrors as $error): ?>
                    <p class="error"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <form method="post" class="form-grid">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" >
        </div>

        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" >
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" >
        </div>

        <button class="btn-primary">Создать</button>
    </form>
</div>
