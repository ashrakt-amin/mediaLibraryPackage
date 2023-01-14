<x-main>
<div class="container-fluid d-flex justify-content-center"  style="margin-top:100px" >
    <form class="row g-3 " style="width:400px" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input  name="user_id" type="hidden" value="{{Auth::user()->id}}">

        <div class="raw-auto g-col-4">
            <input class="form-control form-control-lg" name="title" type="text" placeholder="title">
        </div>

        <div class="raw-auto g-col-4">
            <textarea class="form-control" name="body"  placeholder="body"></textarea>
        </div>

        <div class="raw-auto g-col-4">
            <input class="form-control" type="file" name="image" >
        </div>

        <div class="raw-auto ">
            <button type="submit" class="btn btn-primary mb-3">save</button>
        </div>
    </form>
</div>
</x-main>