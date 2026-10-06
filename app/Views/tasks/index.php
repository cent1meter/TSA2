<?= $this->include('partials/header') ?>

<section class="page-banner compact-banner">
    <div class="container heading-row">
        <div>
            <p class="eyebrow">Tasks for Today</p>
            <h1>Task List</h1>
            <p>Active work items ordered by date. Archived tasks are kept in the database and hidden here.</p>
        </div>
        <?php if (session()->get('logged_in')): ?>
            <a class="button button-primary" href="<?= site_url('tasks/new') ?>">New task</a>
        <?php endif; ?>
    </div>
</section>

<section class="section table-section">
    <div class="container">
        <div class="table-card">
            <div class="table-heading">
                <div>
                    <h2>Active tasks</h2>
                    <p><?= count($tasks) ?> visible record<?= count($tasks) === 1 ? '' : 's' ?></p>
                </div>
                <?php if (! session()->get('logged_in')): ?>
                    <a class="text-link" href="<?= site_url('login') ?>">Log in to manage</a>
                <?php endif; ?>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr><th>Title</th><th>Description</th><th>Task date</th><?php if (session()->get('logged_in')): ?><th>Actions</th><?php endif; ?></tr>
                    </thead>
                    <tbody>
                        <?php if ($tasks === []): ?>
                            <tr><td colspan="<?= session()->get('logged_in') ? '4' : '3' ?>" class="empty-cell">No active tasks found.</td></tr>
                        <?php endif; ?>
                        <?php foreach ($tasks as $task): ?>
                            <tr>
                                <td><strong><?= esc($task['title']) ?></strong></td>
                                <td><?= esc($task['description'] ?: '—') ?></td>
                                <td><?= esc(date('M d, Y', strtotime($task['task_date']))) ?></td>
                                <?php if (session()->get('logged_in')): ?>
                                    <td>
                                        <div class="row-actions">
                                            <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">Edit</a>
                                            <form action="<?= site_url('tasks/' . $task['id'] . '/delete') ?>" method="post" onsubmit="return confirm('Archive this task?');">
                                                <?= csrf_field() ?>
                                                <button class="link-button danger-link" type="submit">Archive</button>
                                            </form>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('partials/footer') ?>
