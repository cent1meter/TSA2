<?= $this->include('partials/header') ?>

<section class="page-banner">
    <div class="container narrow">
        <p class="eyebrow">About the project</p>
        <h1>A practical introduction to CodeIgniter 4.</h1>
        <p>
            SwiftPOS and Tasks for Today demonstrate how routes, controllers,
            models, views, authentication, and MySQL work together in an MVC application.
        </p>
    </div>
</section>

<section class="section">
    <div class="container split-layout">
        <div>
            <p class="eyebrow">How it works</p>
            <h2>From URL to finished page</h2>
            <p>
                When a visitor opens a URL, CodeIgniter checks the route and calls
                the assigned controller method. The controller prepares the data,
                and the view turns that data into the HTML shown in the browser.
            </p>
        </div>

        <ol class="process-list">
            <li>
                <span>1</span>
                <div><strong>Route</strong><p>Matches the requested URL.</p></div>
            </li>
            <li>
                <span>2</span>
                <div><strong>Controller</strong><p>Prepares data and selects a view.</p></div>
            </li>
            <li>
                <span>3</span>
                <div><strong>View</strong><p>Displays the final HTML page.</p></div>
            </li>
        </ol>
    </div>
</section>

<?= $this->include('partials/footer') ?>
