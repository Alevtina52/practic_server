<div class="card">
    <h2>Добро пожаловать, <?= htmlspecialchars(app()->auth->user()->name) ?>!</h2>

    <?php if (app()->auth->user()->role === 'admin'): ?>
        <div class="menu-grid">
            <a class="menu-item" href="/practic/registrar/add">Добавить сотрудника</a>
            <a class="menu-item" href="/practic/doctors">Список врачей</a>
            <a class="menu-item" href="/practic/patients">Список пациентов</a>
            <a class="menu-item" href="/practic/schedule">Расписание врачей</a>
        </div>

    <?php else: ?>
        <div class="menu-grid">
            <a class="menu-item" href="/practic/registrar/patient/add">Добавить пациента</a>
            <a class="menu-item" href="/practic/registrar/doctor/add">Добавить врача</a>
            <a class="menu-item" href="/practic/appointment/add">Создать запись</a>
            <a class="menu-item" href="/practic/appointments">Все записи</a>
            <a class="menu-item" href="/practic/patients">Список пациентов</a>
            <a class="menu-item" href="/practic/doctors">Список врачей</a>
        </div>
    <?php endif; ?>
</div>

<style>
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .menu-item {
        padding: 15px;
        background: rgba(255,255,255,0.6);
        border-radius: 14px;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        color: #0c3d5a;
        border: 1px solid rgba(255,255,255,0.8);
        transition: 0.2s;
    }

    .menu-item:hover {
        background: rgba(255,255,255,0.8);
    }
</style>
