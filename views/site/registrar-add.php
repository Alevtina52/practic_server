<div class="form-card">
    <h2>Добавление сотрудника регистратуры</h2>

    <?php if (!empty($message)): ?>
        <p class="form-message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="post" class="form-grid">
        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" required>
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn-primary">Создать</button>
    </form>
</div>
