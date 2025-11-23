<h2>Список записей пациентов</h2>

<form method="get" style="margin-bottom: 15px;">
    <label>Выбрать пациента:</label>

    <select name="patient_id" onchange="this.form.submit()">
        <option value="">Все пациенты</option>

        <?php foreach ($patients as $p): ?>
            <option value="<?= $p->id ?>"
                <?= ($selectedPatient == $p->id) ? 'selected' : '' ?>>
                <?= htmlspecialchars($p->lastname . ' ' . $p->firstname) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <noscript><button type="submit">Показать</button></noscript>
</form>

<!-- FLASH-сообщения -->
<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['success']) ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<table class="appt-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Пациент</th>
        <th>Врач</th>
        <th>Специализация</th>
        <th>Дата и время</th>
        <th>Статус</th>
        <th>Действие</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($appointments as $a): ?>
        <tr class="<?= $a->status === 'canceled' ? 'row-canceled' : '' ?>">
            <td><?= $a->id ?></td>

            <td>
                <?= htmlspecialchars($a->patient->lastname . ' ' . $a->patient->firstname) ?>
            </td>

            <td>
                <?= htmlspecialchars($a->doctor->lastname . ' ' . $a->doctor->firstname) ?>
            </td>

            <td><?= htmlspecialchars($a->doctor->specialization) ?></td>

            <td><?= htmlspecialchars($a->datetime) ?></td>

            <td>
                <?php if ($a->status === 'active'): ?>
                    <span class="status-active">Активна</span>
                <?php else: ?>
                    <span class="status-canceled">Отменена</span>
                <?php endif; ?>
            </td>

            <td>
                <?php if ($a->status === 'active'): ?>
                    <a href="/practic/appointments/cancel/<?= $a->id ?>"
                       class="cancel-btn"
                       onclick="return confirm('Отменить запись?')">
                        Отменить
                    </a>
                <?php else: ?>
                    —
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<style>
    .appt-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-size: 16px;
    }

    .appt-table th, .appt-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .appt-table th {
        background: #f5f5f5;
        font-weight: bold;
    }

    .row-canceled {
        color: gray;
        background: #fafafa;
    }

    .status-active {
        color: green;
        font-weight: bold;
    }

    .status-canceled {
        color: #777;
        font-style: italic;
    }

    .cancel-btn {
        color: red;
        font-weight: bold;
        text-decoration: none;
    }

    .cancel-btn:hover {
        text-decoration: underline;
    }

    .alert {
        padding: 12px 18px;
        border-radius: 6px;
        margin: 10px 0;
        animation: fadein 0.3s ease;
        font-size: 16px;
    }

    .alert-success {
        background: #e8f9e8;
        border-left: 5px solid #2e8b57;
        color: #2e8b57;
    }

    .alert-error {
        background: #ffeaea;
        border-left: 5px solid #cc0000;
        color: #cc0000;
    }

    @keyframes fadein {
        from {opacity: 0; transform: translateY(-5px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>
