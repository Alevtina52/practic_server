<div class="form-card">
    <h2>Запись пациента к врачу</h2>

    <?php if (!empty($message)): ?>
        <div class="success-message"><?= $message ?></div>
    <?php endif; ?>



    <form method="post" class="glass-form">

        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <label>Пациент
            <select name="patient_id" required>
                <?php foreach ($patients as $p): ?>
                    <option value="<?= $p->id ?>">
                        <?= htmlspecialchars($p->lastname . ' ' . $p->firstname) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Врач
            <select name="doctor_id" required>
                <?php foreach ($doctors as $d): ?>
                    <option value="<?= $d->id ?>">
                        <?= htmlspecialchars($d->lastname . ' ' . $d->firstname . ' — ' . $d->specialization) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Дата и время
            <input type="datetime-local" name="datetime" required>
        </label>

        <button class="btn-primary">Записать</button>
    </form>
</div>
