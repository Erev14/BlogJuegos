@extends('layouts.app')

@section('content')
<div class="columns is-centered is-multiline">
    <div class="column is-three-quarters">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
    <div class="column is-two-thirds is-centered">
        <ul class="list columns is-multiline">
            @foreach($publications as $publication)
            <li class="list-item column is-one-third">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{$publication->urlCover}}" alt="{{$publication->title}}" />
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-5">
                                    {{$publication->title}}
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            {{substr($publication->content, 0, 100)}}
                            <br />
                            <a href="/{{$publication->creation_date->format('Y/m/d')}}/{{str_replace(' ','-',strtolower($publication->title))}}">Leer más</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        {{$publications->links()}}
    </div>
</div>
@endsection