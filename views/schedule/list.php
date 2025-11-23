<h2>Расписание врачей</h2>

<?php if (!empty($message)): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

<table class="schedule-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Врач</th>
        <th>День недели</th>
        <th>Время приёма</th>
        <th>Действие</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($schedules as $s): ?>
        <tr>
            <td><?= $s->id ?></td>

            <td>
                <?= htmlspecialchars($s->doctor->lastname . ' ' . $s->doctor->firstname) ?>
            </td>

            <td><?= htmlspecialchars($s->weekday) ?></td>

            <td>
                <?= htmlspecialchars($s->time_from) ?> —
                <?= htmlspecialchars($s->time_to) ?>
            </td>

            <td>
                <a href="/practic/schedule/delete/<?= $s->id ?>"
                   class="delete-btn"
                   onclick="return confirm('Удалить расписание?')">
                    Удалить
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<style>
    .schedule-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-size: 16px;
    }

    .schedule-table th,
    .schedule-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .schedule-table th {
        background: #f7f7f7;
        font-weight: bold;
    }

    .delete-btn {
        color: darkred;
        font-weight: bold;
        text-decoration: none;
    }

    .delete-btn:hover {
        text-decoration: underline;
    }

    .alert {
        padding: 12px 18px;
        border-radius: 6px;
        margin: 10px 0;
        animation: fadein 0.3s ease;
        font-size: 16px;
        background: #e8f9e8;
        border-left: 5px solid #2e8b57;
        color: #2e8b57;
    }

    @keyframes fadein {
        from {opacity: 0; transform: translateY(-5px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>
