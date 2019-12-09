@extends('layouts.web')
@section('title', '测试')

@section('content')

    <div class="content">

        {{--@foreach(Breadcrumbs(GetCatId()) as $val)--}}
            {{--> <a href="/test/{{ $val['link'] }}">{{ $val['name'] }}</a>--}}
        {{--@endforeach--}}

{{ NavBar(640) }}



    </div>


@endsection