<?php
session_start();
include "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - MediCore HMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f7fc;
        }

        .card{
            max-width:420px;
            margin:80px auto;
            border:none;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,.1);
        }

        .card-header{
            background:#0d6efd;
            color:#fff;
            text-align:center;
            font-size:22px;
            font-weight:bold;
            border-radius:15px 15px 0 0;
        }

        .btn-primary{
            width:100%;
        }
    </style>
</head>
<body>

<div class="card">

    <div class="card-header">
        Forgot Password
    </div>

    <div class="card-body">

        <form action="forget_password_process.php" method="POST">

            <label class="form-label">Email Address</label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Enter Registered Email"
                required>

            <br>

            <button class="btn btn-primary">
                Continue
            </button>

            <br><br>

            <a href="login.php" class="btn btn-secondary w-100">
                Back to Login
            </a>

        </form>

    </div>

</div>

</body>
</html>