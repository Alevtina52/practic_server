<h2>Добавить расписание врача</h2>

<?php if (!empty($message)): ?>
    <p style="color: green"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<form method="post">

    <label>Выберите врача:</label>
    <select name="doctor_id" required>
        <?php foreach ($doctors as $d): ?>
            <option value="<?= $d->id ?>">
                <?= $d->lastname . ' ' . $d->firstname ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>День недели:</label>
    <select name="weekday" required>
        <option value="1">Понедельник</option>
        <option value="2">Вторник</option>
        <option value="3">Среда</option>
        <option value="4">Четверг</option>
        <option value="5">Пятница</option>
        <option value="6">Суббота</option>
        <option value="7">Воскресенье</option>
    </select>

    <label>Начало работы:</label>
    <input type="time" name="time_from" required>

    <label>Окончание работы:</label>
    <input type="time" name="time_to" required>

    <button type="submit">Добавить</button>
</form>
