<?= $this->include('partials/header') ?>

<section class="page-banner compact-banner">
    <div class="container">
        <p class="eyebrow">Records</p>
        <h1>Customer Accounts</h1>
        <p>Contact information for the customers currently listed in SwiftPOS.</p>
    </div>
</section>

<section class="section table-section">
    <div class="container">
        <div class="table-card">
            <div class="table-heading">
                <div>
                    <h2>Customers</h2>
                    <p><?= count($customers) ?> database records</p>
                </div>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Full name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><strong><?= esc($customer['full_name']) ?></strong></td>
                                <td><?= esc($customer['email']) ?></td>
                                <td><?= esc($customer['phone'] ?? '') ?></td>
                                <td><?= esc(date('M d, Y', strtotime($customer['created_at']))) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('partials/footer') ?>
