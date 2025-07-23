

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #f5f5f5;
    }

    .admin-container {
        display: flex;
        min-height: 100vh;
        background-color: #f0f0f0;
    }

    /* 侧边栏样式 */
    .sidebar {
        width: 250px;
        background-color: #333;
        color: white;
        padding-top: 20px;
        position: fixed;
        height: 100%;
    }

    .sidebar a {
        display: block;
        color: white;
        padding: 15px;
        text-decoration: none;
        font-size: 18px;
    }

    .sidebar a:hover {
        background-color: #575757;
    }

    /* 内容区样式 */
    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: 100%;
    }

    h1 {
        font-size: 2.5em;
        color: #333;
        margin-bottom: 20px;
    }

    /* 统计卡片样式 */
    .card-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .card {
        background-color: #fff;
        width: 30%;
        padding: 20px;
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        text-align: center;
    }

    .card h2 {
        font-size: 1.5em;
        color: #666;
    }

    .card p {
        font-size: 2em;
        font-weight: bold;
        color: #333;
    }

    /* 表格样式 */
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #5e6163;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn-edit, .btn-delete {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #4CAF50;
    }

    .btn-delete {
        background-color: #f44336;
    }

    @media (max-width: 768px) {
        .card {
            width: 100%;
        }

        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            margin-left: 0;
        }
    }
</style>

<div class="admin-container">
    <!-- 侧边栏 -->
    <div class="sidebar">
        <h2 style="text-align: center;">Admin Panel</h2>
        <a href="add">Add Vegetable</a>
        <a href="#">Manage Users</a>
        <a href="#">Manage Products</a>
        <a href="#">Manage Orders</a>
    </div>

    <!-- 主要内容区 -->
    <div class="main-content">
        
        <h1>Welcome, Admin</h1>

        <h2>Recent Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john.doe@example.com</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</div>