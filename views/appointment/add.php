<h2>Запись пациента к врачу</h2>

<h3><?= $message ?? '' ?></h3>

<form method="post">

    <label>Пациент:
        <select name="patient_id" required>
            <?php foreach ($patients as $p): ?>
                <option value="<?= $p->id ?>">
                    <?= htmlspecialchars($p->lastname . ' ' . $p->firstname) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Врач:
        <select name="doctor_id" required>
            <?php foreach ($doctors as $d): ?>
                <option value="<?= $d->id ?>">
                    <?= htmlspecialchars($d->lastname . ' ' . $d->firstname . ' — ' . $d->specialization) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Дата и время:
        <input type="datetime-local" name="datetime" required>
    </label>

    <button>Записать</button>
</form>
