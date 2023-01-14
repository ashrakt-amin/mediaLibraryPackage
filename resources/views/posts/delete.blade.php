
<!-- delete Modal -->
<div class="modal fade" id="delete{{$post->id}}"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
       <form class="posts-form" action="{{route('posts.destroy',$post->id)}}" method="post" >
       {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5>are you sure</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">del</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">close</button>

                </div>
       </form>    
      </div>

      
    </div>
  </div>
</div>