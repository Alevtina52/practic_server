<h2>Список пациентов</h2>

<table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f2f2f2;">
        <th>ID</th>
        <th>ФИО</th>
        <th>Дата рождения</th>
        <th>Действие</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($patients as $p): ?>
        <tr>
            <td><?= $p->id ?></td>
            <td>
                <?= htmlspecialchars($p->lastname . ' ' . $p->firstname . ' ' . $p->middlename) ?>
            </td>
            <td><?= htmlspecialchars($p->birthdate) ?></td>

            <td>
                <a href="/practic/patients/<?= $p->id ?>/appointments"
                   style="font-weight: bold; color: blue;">
                    Просмотреть записи
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
