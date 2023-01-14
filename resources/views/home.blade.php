<x-main>
    <!-- Navigation-->

    @foreach($posts as $post)

    <div class="container px-4 px-lg-5 shadow p-3 mb-5 bg-body rounded">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            @if(Auth::user()->id == $post->user_id)
            <div class="dropdown d-flex flex-row-reverse ">
                <svg data-bs-toggle="dropdown" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
                </svg>
                <ul class="dropdown-menu " style="min-width:5rem;">
                    <li><a class="dropdown-item d-flex align-items-center " data-bs-toggle="modal" data-bs-target="#edit{{$post->id}}">edit</a></li>
                    <li><a class="dropdown-item d-flex align-items-center " data-bs-toggle="modal" data-bs-target="#delete{{$post->id}}">Del</a></li>
                </ul>
            </div>
            @endif
            
            @include('posts.edit')
            @include('posts.delete')
            
            <div class="col-md-5">
                <a href="{{route('profile.page',$post->user->id)}}">
                    @if($post->user->getFirstMediaUrl('user.avatar') == null)
                    <img src="{{asset('storage/default.jpg')}}" class="rounded-circle" style="width:100px ;height:100px ;padding-right:3px" />
                    @else
                    <img src="{{$post->user->getFirstMediaUrl('user.avatar')}}" class="rounded-circle" style="width:100px ; height:100px;padding-right:3px" />
                    @endif
                    <span class="post-title">{{$post->user->name}}</span>
                </a>

            </div>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h3 class="post-subtitle">{{$post->body}}</h3>
                    @if($post->getFirstMediaUrl('post.images') != null)
                    <img src="{{$post->getFirstMediaUrl('post.images')}}" class="rounded-full" style="width:500px;height:300px " />
                    @endif
                    <p class="post-meta">
                        Posted by {{$post->created_at}}

                    </p>
                </div>

            </div>
        </div>
    </div>

    @endforeach
</x-main>