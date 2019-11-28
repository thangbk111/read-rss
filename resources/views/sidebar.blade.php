<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>RSS Reader</h3>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="#">All Post</a>
        </li>
        @foreach($feeds as $feed)
            <li>
                <a href="#">{{ $feed->title }}</a>
            </li>
        @endforeach
    </ul>
</nav>