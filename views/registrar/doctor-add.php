<div class="form-card">
    <h2>Добавление врача</h2>


    <?php if (!empty($errors)): ?>
        <div class="form-errors">
            <?php foreach ($errors as $field => $msgs): ?>
                <?php foreach ($msgs as $msg): ?>
                    <div class="error-item">⚠ <?= htmlspecialchars($msg) ?></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($message)): ?>
        <div class="form-message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>



    <form method="post" class="styled-form" enctype="multipart/form-data">

        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <label>Фамилия
            <input type="text" name="lastname">
        </label>

        <label>Имя
            <input type="text" name="firstname">
        </label>

        <label>Отчество
            <input type="text" name="middlename">
        </label>

        <label>Дата рождения
            <input type="date" name="birthdate">
        </label>

        <label>Должность
            <input type="text" name="position">
        </label>

        <label>Специализация
            <input type="text" name="specialization">
        </label>

        <label>Фото врача
            <input type="file" name="photo" accept="image/*">
        </label>

        <button class="btn-submit">Добавить врача</button>
    </form>

</div>
