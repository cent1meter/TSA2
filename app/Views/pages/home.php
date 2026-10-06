<?= $this->include('partials/header') ?>

<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">Simple sales management</p>
            <h1>Your store, organized in one place.</h1>
            <p class="hero-copy">
                SwiftPOS is a starter point-of-sale application for managing customer
                information and staff accounts through a clean, easy-to-use interface.
            </p>
            <div class="button-row">
                <a class="button button-primary" href="<?= site_url('customers') ?>">View customers</a>
                <a class="button button-secondary" href="<?= site_url('users') ?>">View users</a>
            </div>
        </div>

        <div class="hero-panel" aria-label="Application overview">
            <div class="metric">
                <span class="metric-value">7</span>
                <span class="metric-label">Connected pages</span>
            </div>
            <div class="metric">
                <span class="metric-value">14</span>
                <span class="metric-label">Sample records</span>
            </div>
            <div class="metric">
                <span class="metric-value">MVC</span>
                <span class="metric-label">Organized structure</span>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">POS foundations</p>
            <h2>Built around the essentials</h2>
        </div>

        <div class="card-grid">
            <article class="card">
                <span class="card-number">01</span>
                <h3>Customer records</h3>
                <p>See customer names, email addresses, and phone numbers in one organized table.</p>
            </article>
            <article class="card">
                <span class="card-number">02</span>
                <h3>User accounts</h3>
                <p>Review staff usernames, full names, and assigned roles for the POS application.</p>
            </article>
            <article class="card">
                <span class="card-number">03</span>
                <h3>Protected task management</h3>
                <p>Public task viewing stays open while create, edit, and archive actions require authentication.</p>
            </article>
        </div>
    </div>
</section>

<section class="section tasks-preview">
    <div class="container">
        <div class="section-heading heading-row">
            <div>
                <p class="eyebrow">Tasks for Today</p>
                <h2>Upcoming active tasks</h2>
                <p>Archived tasks are retained in the database but excluded from this public list.</p>
            </div>
            <a class="button button-secondary" href="<?= site_url('tasks') ?>">View all tasks</a>
        </div>

        <div class="task-grid">
            <?php if ($tasks === []): ?>
                <article class="card"><h3>No active tasks</h3><p>There are no tasks scheduled right now.</p></article>
            <?php endif; ?>
            <?php foreach ($tasks as $task): ?>
                <article class="card task-card">
                    <time datetime="<?= esc($task['task_date']) ?>"><?= esc(date('M d, Y', strtotime($task['task_date']))) ?></time>
                    <h3><?= esc($task['title']) ?></h3>
                    <p><?= esc($task['description'] ?: 'No description provided.') ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->include('partials/footer') ?>
