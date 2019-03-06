
<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Welcome admin, {{session()->get('user')[0]->name}} </div>
        <div class="list-group list-group-flush">
            <a href="/addUser" class="list-group-item list-group-item-action bg-light">Add user</a>
            <a href="/manageUsers" class="list-group-item list-group-item-action bg-light">Manage users</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Add book</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage books</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Errors</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Activity</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->