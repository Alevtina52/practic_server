<h2 class="page-title">Список пациентов</h2>

<form method="get" class="search-bar">
    <input type="text"
           name="search"
           placeholder="Поиск по ФИО..."
           value="<?= htmlspecialchars($search ?? '') ?>">

    <button class="btn-small">Найти</button>

    <?php if (!empty($search)): ?>
        <a href="/practic/patients" class="btn-small reset">Сбросить</a>
    <?php endif; ?>
</form>

<div class="table-container">
    <table class="glass-table">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Дата рождения</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($patients as $p): ?>
            <tr>
                <td><?= htmlspecialchars("$p->lastname $p->firstname $p->middlename") ?></td>
                <td><?= htmlspecialchars($p->birthdate) ?></td>

                <td class="action-cell">
                    <a href="/practic/patients/<?= $p->id ?>/appointments"
                       class="btn-small">
                        Записи
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
