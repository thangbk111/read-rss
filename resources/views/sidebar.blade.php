<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>RSS Reader</h3>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="/">All Post</a>
        </li>
        @foreach($feeds as $feed)
            <li style="margin: 10px">
                <a href="{{ route('feed_show', ['feedId' => $feed->id]) }}" style="display: inline">{{ $feed->title }}</a>
                <button data-toggle="modal" data-target="#deleteModal_{{ $feed->id }}" style="display: inline"><i class="fa fa-trash"></i></button>
            </li>
            <!-- Edit Modal -->
            <div class="modal fade" id="deleteModal_{{ $feed->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('feed_delete') }}" method="POST">
                            @csrf
                            <input type="text" name="feed_id" value="{{ $feed->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:red" id="exampleModalLabel">Are you sure want to delete: <strong>{{ $feed->title }}</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</nav>