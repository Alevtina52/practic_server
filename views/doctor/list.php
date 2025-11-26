<h2 class="page-title">Список врачей</h2>

<form method="get" class="search-bar">
    <input type="text"
           name="search"
           placeholder="Поиск по ФИО, должности или специализации..."
           value="<?= htmlspecialchars($search ?? '') ?>">

    <button class="btn-small">Найти</button>

    <?php if (!empty($search)): ?>
        <a href="/practic/doctors" class="btn-small reset">Сбросить</a>
    <?php endif; ?>
</form>

<div class="table-container">
    <table class="glass-table">
        <thead>
        <tr>
            <th>Фото</th>
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
                <td>
                    <?php if (!empty($d->photo)): ?>
                        <img src="/practic/public/uploads/doctors/<?= $d->photo ?>"
                             class="doctor-photo"
                             alt="Фото">
                    <?php else: ?>
                        <span class="no-photo">Нет фото</span>
                    <?php endif; ?>
                </td>
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
