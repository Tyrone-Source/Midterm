<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php if (session()->get('logged_in')): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="/sales/record">POS System</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="/products">Products</a>
                    <a class="nav-link" href="/customers">Customers</a>
                    <a class="nav-link" href="/staff">Staff</a>
                    <a class="nav-link" href="/sales/record">Record Sale</a>
                    <a class="nav-link" href="/sales/history">Sales History</a>
                    <a class="nav-link text-danger" href="/logout">Logout</a>
                </div>
            </div>
        </nav>
    <?php endif; ?>
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>