<div class="card form-card">

    <h2>Добавление пациента</h2>

    <?php if (!empty($message)): ?>
        <div class="form-alert"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="post" class="glass-form">

        <label>
            Фамилия<br>
            <input type="text" name="lastname" required>
        </label>

        <label>
            Имя<br>
            <input type="text" name="firstname" required>
        </label>

        <label>
            Отчество<br>
            <input type="text" name="middlename">
        </label>

        <label>
            Дата рождения<br>
            <input type="date" name="birthdate" required>
        </label>

        <button class="btn">Добавить пациента</button>
    </form>
</div>
