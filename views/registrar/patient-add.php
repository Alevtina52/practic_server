<h2>Добавление пациента</h2>

<h3><?= $message ?? '' ?></h3>

<form method="post">

    <label>Фамилия
        <input type="text" name="lastname" required>
    </label>

    <label>Имя
        <input type="text" name="firstname" required>
    </label>

    <label>Отчество
        <input type="text" name="middlename">
    </label>

    <label>Дата рождения
        <input type="date" name="birthdate" required>
    </label>

    <button>Добавить пациента</button>
</form>
