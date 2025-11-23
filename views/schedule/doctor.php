<h2>Расписание врача</h2>

<h3>
    <?= htmlspecialchars($doctor->lastname . ' ' . $doctor->firstname . ' ' . $doctor->middlename) ?>
</h3>

<a href="/practic/doctors" style="display:inline-block;margin-bottom:10px;">← Назад к списку врачей</a>

<?php if ($schedule->isEmpty()): ?>
    <p>У этого врача пока нет расписания.</p>
<?php else: ?>

    <table class="schedule-table">
        <thead>
        <tr>
            <th>День недели</th>
            <th>Время с</th>
            <th>Время до</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($schedule as $s): ?>
            <tr>
                <td><?= htmlspecialchars($s->weekday) ?></td>
                <td><?= htmlspecialchars($s->time_from) ?></td>
                <td><?= htmlspecialchars($s->time_to) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>


<style>
    .schedule-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    .schedule-table th, .schedule-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .schedule-table th {
        background: #f0f0f0;
    }
</style>
