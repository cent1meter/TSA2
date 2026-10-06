<?= $this->include('partials/header') ?>

<section class="page-banner compact-banner">
    <div class="container">
        <p class="eyebrow">Access management</p>
        <h1>User Accounts</h1>
        <p>Staff accounts currently registered in the SwiftPOS database.</p>
    </div>
</section>

<section class="section table-section">
    <div class="container">
        <div class="table-card">
            <div class="table-heading">
                <div>
                    <h2>Users</h2>
                    <p><?= count($users) ?> database records</p>
                </div>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><strong><?= esc($user['username']) ?></strong></td>
                                <td><?= esc($user['full_name']) ?></td>
                                <td><?= esc(date('M d, Y', strtotime($user['created_at']))) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('partials/footer') ?>
