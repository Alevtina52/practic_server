<h2 class="page-title">Список записей пациентов</h2>

<div class="filter-box">
    <form method="get" class="filter-form">
        <label>Пациент:</label>

        <select name="patient_id" class="select-input" onchange="this.form.submit()">
            <option value="">Все пациенты</option>

            <?php foreach ($patients as $p): ?>
                <option value="<?= $p->id ?>"
                    <?= ($selectedPatient == $p->id) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($p->lastname . ' ' . $p->firstname) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>

<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-error"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<div class="glass-card">
    <table class="glass-table">
        <thead>
        <tr>
            <th>Пациент</th>
            <th>Врач</th>
            <th>Специализация</th>
            <th>Дата и время</th>
            <th>Статус</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($appointments as $a): ?>
            <tr class="<?= $a->status === 'canceled' ? 'row-canceled' : '' ?>">
                <td><?= htmlspecialchars($a->patient->lastname . ' ' . $a->patient->firstname) ?></td>

                <td><?= htmlspecialchars($a->doctor->lastname . ' ' . $a->doctor->firstname) ?></td>

                <td><?= htmlspecialchars($a->doctor->specialization) ?></td>

                <td><?= htmlspecialchars($a->datetime) ?></td>

                <td>
                    <?php if ($a->status === 'active'): ?>
                        <span class="status status-active">Активна</span>
                    <?php else: ?>
                        <span class="status status-canceled">Отменена</span>
                    <?php endif; ?>
                </td>

                <td>
                    <?php if ($a->status === 'active'): ?>
                        <a href="/practic/appointments/cancel/<?= $a->id ?>"
                           class="btn-cancel"
                           onclick="return confirm('Отменить запись?')">
                            Отменить
                        </a>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
