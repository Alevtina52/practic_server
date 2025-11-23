<h2>Врачи, у которых был пациент</h2>

<p><strong>Пациент:</strong>
    <?= htmlspecialchars($patient->lastname . ' ' . $patient->firstname . ' ' . $patient->middlename) ?>
</p>

<?php if (count($doctors) === 0): ?>
    <p>У пациента нет записей к врачам.</p>
<?php else: ?>

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <thead>
        <tr style="background: #f2f2f2;">
            <th>ФИО врача</th>
            <th>Специализация</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($doctors as $d): ?>
            <tr>
                <td><?= htmlspecialchars($d->lastname . ' ' . $d->firstname . ' ' . $d->middlename) ?></td>
                <td><?= htmlspecialchars($d->specialization) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>

<p style="margin-top: 15px;">
    <a href="/practic/patients" style="color: darkblue;">← Вернуться к списку пациентов</a>
</p>
