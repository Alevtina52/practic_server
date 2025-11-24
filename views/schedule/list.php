<h2 class="page-title">Расписание врачей</h2>

<?php if (!empty($message)): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

<div class="glass-card">
    <table class="nice-table">
        <thead>
        <tr>
            <th>Врач</th>
            <th>День недели</th>
            <th>Время приёма</th>
            <th style="width: 120px;">Действие</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($schedules as $s): ?>
            <tr>
                <td><?= htmlspecialchars($s->doctor->lastname . ' ' . $s->doctor->firstname) ?></td>

                <td><?= htmlspecialchars($s->weekday) ?></td>

                <td><?= htmlspecialchars($s->time_from) ?> — <?= htmlspecialchars($s->time_to) ?></td>

                <td>
                    <a href="/practic/schedule/delete/<?= $s->id ?>"
                       class="btn-delete"
                       onclick="return confirm('Удалить расписание?')">
                        Удалить
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
