<h2 class="page-title">Записи пациента</h2>

<div class="patient-info">
    <strong>Пациент:</strong>
    <?= htmlspecialchars("$patient->lastname $patient->firstname $patient->middlename") ?>
</div>

<?php if (count($appointments) === 0): ?>

    <p class="empty-text">У пациента нет записей к врачам.</p>

<?php else: ?>

    <div class="table-container">
        <table class="glass-table">
            <thead>
            <tr>
                <th>Врач</th>
                <th>Специализация</th>
                <th>Дата и время</th>
                <th>Статус</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($appointments as $a): ?>
                <tr class="<?= $a->status === 'canceled' ? 'row-canceled' : '' ?>">

                    <td><?= htmlspecialchars($a->doctor->lastname . ' ' . $a->doctor->firstname) ?></td>
                    <td><?= htmlspecialchars($a->doctor->specialization) ?></td>
                    <td><?= htmlspecialchars($a->datetime) ?></td>

                    <td>
                        <?php if ($a->status === 'active'): ?>
                            <span class="status-active">Активна</span>
                        <?php else: ?>
                            <span class="status-canceled">Отменена</span>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php endif; ?>

<p class="back-link">
    <a href="/practic/patients">← Вернуться к списку пациентов</a>
</p>
