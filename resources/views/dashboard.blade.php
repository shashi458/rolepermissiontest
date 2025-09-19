<h1>hihhihihihihihihihi</h1>
<div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
<div>
    @role('admin')
        <h2>Admin Dashboard</h2>
        <p>Welcome, Admin! You have full access.</p>
    @elserole('editor')
        <h2>Editor Dashboard</h2>
        <p>Welcome, Editor! You can edit articles.</p>
    @elserole('user')
        <h2>User Dashboard</h2>
        <p>Welcome, User! You can view the dashboard.</p>
    @else
        <h2>Guest Dashboard</h2>
        <p>Welcome, Guest! Please log in to access more features.</p>
    @endrole
</div>
