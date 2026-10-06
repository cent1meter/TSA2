<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SwiftPOS and Tasks for Today management system built with CodeIgniter 4.">
    <title><?= esc($title) ?> | SwiftPOS</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>" aria-label="SwiftPOS home">
                <span class="brand-mark">S</span>
                <span>SwiftPOS</span>
            </a>

            <nav aria-label="Main navigation">
                <a href="<?= site_url('/') ?>">Home</a>
                <a href="<?= site_url('about') ?>">About</a>
                <a href="<?= site_url('tasks') ?>">Tasks</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('customers') ?>">Customers</a>
                <a href="<?= site_url('users') ?>">Users</a>
                <?php if (session()->get('logged_in')): ?>
                    <a href="<?= site_url('tasks/new') ?>">New Task</a>
                    <form class="nav-form" action="<?= site_url('logout') ?>" method="post">
                        <?= csrf_field() ?>
                        <button class="nav-button" type="submit">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="<?= site_url('login') ?>">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="container flash-wrap"><div class="alert alert-success" role="status"><?= esc(session()->getFlashdata('success')) ?></div></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="container flash-wrap"><div class="alert alert-error" role="alert"><?= esc(session()->getFlashdata('error')) ?></div></div>
        <?php endif; ?>
        <?php $formErrors = session()->getFlashdata('errors') ?? []; ?>
        <?php if ($formErrors): ?>
            <div class="container flash-wrap">
                <div class="alert alert-error" role="alert">
                    <strong>Please correct the following:</strong>
                    <ul>
                        <?php foreach ($formErrors as $formError): ?>
                            <li><?= esc($formError) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
