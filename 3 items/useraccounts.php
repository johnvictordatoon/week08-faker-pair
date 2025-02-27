<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();

$users = [];

for ($i = 0; $i < 10; $i++) {
    $users[] = [
        'userid' => $faker->uuid,
        'name' => $faker->name,
        'email' => $faker->email,
        'username' => strtolower(explode('@', $faker->email)[0]),
        'password' => hash('sha256', $faker->password),
        'acc_created' => $faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d H:i:s')
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2 class="text-center mb-4">Fake User Accounts</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password (SHA-256)</th>
                <th>Account Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['userid'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['acc_created'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
