<div class="form-card">
    <h2>Добавление врача</h2>

    <?php if (!empty($message)): ?>
        <div class="form-message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="post" class="styled-form">

        <label>
            Фамилия
            <input type="text" name="lastname" required>
        </label>

        <label>
            Имя
            <input type="text" name="firstname" required>
        </label>

        <label>
            Отчество
            <input type="text" name="middlename">
        </label>

        <label>
            Дата рождения
            <input type="date" name="birthdate" required>
        </label>

        <label>
            Должность
            <input type="text" name="position" required>
        </label>

        <label>
            Специализация
            <input type="text" name="specialization" required>
        </label>

        <button class="btn-submit">Добавить врача</button>
    </form>
</div>
