<x-main>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="https://spatie.be/docs/laravel-medialibrary/v10/introduction">Media Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('profile.home')}}">Home</a></li>
                    @if(Auth::user()->id == $user->id)
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('profile.edit')}}">Setting</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead">
        <div class="container position-relative px-4 px-lg-5 ">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{$user->name}}</h1>
                        @if($user->getFirstMediaUrl('user.avatar') == null)
                        <img src="{{asset('storage/default.jpg')}}" class="rounded-circle" style="width:1=300px ;height:300px" />
                        @else
                        <img src="{{$user->getFirstMediaUrl('user.avatar')}}" class="rounded-circle" style="width:300px;height:300px " />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <a href="{{route('posts.create')}}"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" style="margin-left: 20px;" class="bi bi-cloud-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
        </svg></a>

    @foreach($posts as $post)

    <div class="container px-4 px-lg-5 shadow p-3 mb-5 bg-body rounded">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            @if(Auth::user()->id == $user->id)
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

            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">{{$post->title}}</h2>
                        <h3 class="post-subtitle">{{$post->body}}</h3>
                        @if($post->getFirstMediaUrl('post.images') != null)
                        <img src="{{$post->getFirstMediaUrl('post.images')}}" class="rounded-full" style="width:500px;height:300px " />
                        @endif
                    </a>
                    <p class="post-meta">
                        Posted by {{$post->created_at}}

                    </p>
                </div>
            </div>
        </div>
    </div>

    @endforeach
</x-main>