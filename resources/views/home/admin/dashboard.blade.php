<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/eGbBzqDf6e5hRYfjFEYNB5F0O7NB4cM7xpc1" crossorigin="anonymous">
</head>
<header>
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </header>
<body>
    <div class="dashboard-container">
        <!-- Header -->

        <!-- Stats Section -->
        <section class="stats-section">
    <div class="stat-card">
        <i class="fas fa-users icon-blue"></i>
        <p>Total Users</p>
        <h2>7591</h2>
    </div>
    <div class="stat-card">
        <i class="fas fa-blog icon-red"></i>
        <p>Total Blogs</p>
        <h2>4875</h2>
    </div>
    <div class="stat-card">
        <i class="fas fa-heart icon-green"></i>
        <p>Total Followers</p>
        <h2>9854</h2>
    </div>
    <div class="stat-card">
        <i class="fas fa-file-alt icon-orange"></i>
        <p>Total Articles</p>
        <h2>4584</h2>
    </div>
</section>

        <!-- Overview Section -->
        <section class="overview-section">
            <div class="chart">
                <h3>Overview</h3>
                <!-- Replace with actual chart if needed -->
                <div class="chart-placeholder"></div>
            </div>

            <div class="revenue-overview">
    <h3>Revenue Overview</h3>
    <div class="revenue-item">
        <i class="fas fa-chart-line icon-yellow"></i>
        <p>Monthly</p>
    </div>
    <div class="revenue-item">
        <i class="fas fa-user-friends icon-blue"></i>
        <p>Total Visitor</p>
    </div>
    <div class="revenue-item">
        <i class="fas fa-shopping-cart icon-pink"></i>
        <p>Product Sale</p>
    </div>
    <div class="revenue-item">
        <i class="fas fa-box icon-teal"></i>
        <p>Order</p>
    </div>
</div>
        </section>
        <!-- Activity Feed Section -->
        <section class="activity-feed">
    <h3>New Activities</h3>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Buyer</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><i class="fas fa-laptop icon-blue"></i> Product A</td>
                <td>$45.00</td>
                <td>John Doe</td>
                <td><span class="status approved"><i class="fas fa-check-circle icon-green"></i> Approved</span></td>
            </tr>
            <tr>
                <td><i class="fas fa-headphones icon-pink"></i> Product B</td>
                <td>$30.00</td>
                <td>Jane Smith</td>
                <td><span class="status pending"><i class="fas fa-hourglass-half icon-yellow"></i> Pending</span></td>
            </tr>
        </tbody>
    </table>
</section>
    </div>
</body>
</html>
