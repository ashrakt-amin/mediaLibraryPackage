<!-- edit Modal -->
<div class="modal fade" id="edit{{$post->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data" class="posts-form">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <input class="form-control form-control-lg" name="title" type="text" value="{{$post->title}}">
                    <textarea class="form-control" name="body" >{{$post->body}}</textarea>
                    <input class="form-control" type="file" name="image">
                    <button type="submit" class="btn btn-primary mb-3">edit</button>


                </form>
            </div>


        </div>
    </div>
</div>