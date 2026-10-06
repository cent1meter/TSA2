<?= $this->include('partials/header') ?>

<section class="section form-section">
    <div class="container">
        <div class="form-card">
            <p class="eyebrow">Task management</p>
            <h1><?= esc($title) ?></h1>
            <p>Title and task date are required. Invalid submissions keep the information you entered.</p>

            <form action="<?= esc($action) ?>" method="post" novalidate>
                <?= csrf_field() ?>

                <label for="title">Title <span aria-hidden="true">*</span></label>
                <input id="title" name="title" type="text" maxlength="150" required value="<?= esc(old('title', $task['title'] ?? '')) ?>">

                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" maxlength="1000"><?= esc(old('description', $task['description'] ?? '')) ?></textarea>

                <label for="task_date">Task date <span aria-hidden="true">*</span></label>
                <input id="task_date" name="task_date" type="date" required value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>">

                <div class="button-row">
                    <button class="button button-primary" type="submit">Save task</button>
                    <a class="button button-secondary" href="<?= site_url('tasks') ?>">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->include('partials/footer') ?>
