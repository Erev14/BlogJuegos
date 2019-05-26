@extends('layouts.app')

@section('content')
<div class="columns is-centered is-multiline">
    <div class="column is-half">
        <section class="flex-center position-ref">
            <h2 class="title">
                Blog Juegos
            </h2>
        </section>
    </div>
</div>
<div class="columns is-centered is-multiline">
    <div class="column is-three-quarters">

    </div>
    <div class="column is-two-thirds is-centered">
        <ul class="list columns is-multiline">
            @foreach($publications as $publication)
            <publication-list-item :publication='@json($publication)'></publication-list-item>
            @endforeach
        </ul>
        {{$publications->links()}}
    </div>
</div>
@endsection