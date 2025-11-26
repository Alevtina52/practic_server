<div class="card form-card">

    <h2>Добавление пациента</h2>

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
        <div class="form-alert"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="post" class="glass-form">

        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <label>
            Фамилия<br>
            <input type="text" name="lastname" value="<?= $old['lastname'] ?? '' ?>">
        </label>

        <label>
            Имя<br>
            <input type="text" name="firstname" value="<?= $old['firstname'] ?? '' ?>">
        </label>

        <label>
            Отчество<br>
            <input type="text" name="middlename" value="<?= $old['middlename'] ?? '' ?>">
        </label>

        <label>
            Дата рождения<br>
            <input type="date" name="birthdate" value="<?= $old['birthdate'] ?? '' ?>">
        </label>

        <button class="btn">Добавить пациента</button>
    </form>
</div>
