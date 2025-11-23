<h2>Список врачей</h2>

<table class="doc-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Дата рождения</th>
        <th>Должность</th>
        <th>Специализация</th>
        <th>Расписание</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($doctors as $d): ?>
        <tr>
            <td><?= $d->id ?></td>
            <td><?= htmlspecialchars($d->lastname . ' ' . $d->firstname . ' ' . $d->middlename) ?></td>
            <td><?= htmlspecialchars($d->birthdate) ?></td>
            <td><?= htmlspecialchars($d->position) ?></td>
            <td><?= htmlspecialchars($d->specialization) ?></td>

            <td>
                <a href="/practic/schedule/doctor/<?= $d->id ?>" class="schedule-btn">
                    Смотреть расписание
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<style>
    .doc-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    .doc-table th, .doc-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .doc-table th {
        background: #f0f0f0;
    }
    .schedule-btn {
        padding: 6px 10px;
        background: #007bff;
        color: white;
        border-radius: 4px;
        text-decoration: none;
    }
    .schedule-btn:hover {
        background: #0056b3;
    }
</style>
