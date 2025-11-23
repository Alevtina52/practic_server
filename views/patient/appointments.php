<h2>Записи пациента</h2>

<p><strong>Пациент:</strong>
    <?= htmlspecialchars($patient->lastname . ' ' . $patient->firstname . ' ' . $patient->middlename) ?>
</p>

<?php if (count($appointments) === 0): ?>
    <p>У пациента нет записей к врачам.</p>
<?php else: ?>

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <thead>
        <tr style="background: #f2f2f2;">
            <th>Врач</th>
            <th>Специализация</th>
            <th>Дата и время</th>
            <th>Статус</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($appointments as $a): ?>
            <tr style="<?= $a->status === 'canceled' ? 'color: gray;' : '' ?>">

                <td><?= htmlspecialchars($a->doctor->lastname . ' ' . $a->doctor->firstname) ?></td>
                <td><?= htmlspecialchars($a->doctor->specialization) ?></td>
                <td><?= htmlspecialchars($a->datetime) ?></td>

                <td>
                    <?php if ($a->status === 'active'): ?>
                        <span style="color: green; font-weight: bold;">Активна</span>
                    <?php else: ?>
                        <span style="color: gray;">Отменена</span>
                    <?php endif; ?>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>

<p style="margin-top: 15px;">
    <a href="/practic/patients">← Вернуться к списку пациентов</a>
</p>
