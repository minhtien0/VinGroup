<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/eGbBzqDf6e5hRYfjFEYNB5F0O7NB4cM7xpc1" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <header>
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{ route('admin.danhmuc.category')}}">Category</a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="{{ route('admin.donhang.orders')}}">Orders</a></li>
                    <li><a href="#">Directory</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Comment</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </header>
        <div class="main-content">
            @yield('content1')
        </div>
    </div>
</div>
