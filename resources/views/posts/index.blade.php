<x-main>
    <div class="container-fluid d-flex justify-content-center" style="margin-top:100px">

        <table class="posts table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">IMG</th>
                    <th scope="col">title</th>
                    <th scope="col">Body</th>
                    <th scope="col">pro</th>

                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->getFirstMediaUrl('post.images')}}" class="rounded-full w-8 h-8" /></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$post->id}}">edit</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$post->id}}">Del</a>
                    </td>
                </tr @include('posts.edit') @include('posts.delete') @endforeach </tbody>

        </table>


    </div>

</x-main>