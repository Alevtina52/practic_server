<h2 class="page-title">Список врачей</h2>

<div class="table-container">
    <table class="glass-table">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Дата рождения</th>
            <th>Должность</th>
            <th>Специализация</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($doctors as $d): ?>
            <tr>
                <td><?= htmlspecialchars("$d->lastname $d->firstname $d->middlename") ?></td>
                <td><?= htmlspecialchars($d->birthdate) ?></td>
                <td><?= htmlspecialchars($d->position) ?></td>
                <td><?= htmlspecialchars($d->specialization) ?></td>
                <td class="action-cell">
                    <a href="/practic/schedule/doctor/<?= $d->id ?>" class="btn-small">
                        Расписание
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
