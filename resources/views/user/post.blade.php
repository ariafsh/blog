@extends('user.app')

@section('bg-img', asset('user/img/post-bg.jpg'))
@section('title', $post->title)
@section('sub-heading', $post->subtitle)

@section('main-content')
    <!-- Post Content -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fa_IR/sdk.js#xfbml=1&version=v6.0"></script>

    <article>
        <div class="container">
            <div class="row">
                <small>Created at {{ $post->created_at }}</small>

                    @foreach($post->categories as $category)
                        <small class="offset-10">
                            <h3>Categories: </h3>{{ $category->category }}
                        </small>
                    @endforeach

                <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1 pt-5 pb-5">

                    {{ $post->body }}

                </div>

                @foreach($post->tags as $tag)
                    <small class="offset-10">
                       <h3>Tags: </h3>{{ $tag->tag }}
                    </small>
                @endforeach
            </div>
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10" data-width=""></div>
            </div>
    </article>

    <hr>

@endsection
