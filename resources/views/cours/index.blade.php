
@extends('layout')

@section('content')


    <!-- ========== HEADER SECTION ========== -->
    <section id="home" name="home"></section>
    <div id="headerwrap">
        <div class="container">
            <br>
            <h1>relecture</h1>
            <h2><a href="{{ url('/cours/create') }}">Ajouter un cours</a></h2>
            <div class="row">
                <br>
                <br>
                <br>
                <div class="col-lg-6 col-lg-offset-3" style="background: white">
                    @foreach($cours as $cour)
                        <li>{{ $cour->titre }} - <a href="{{ url('cours/'.$cour->id) }}">voir le cours</a></li>
                    @endforeach
                </div>
            </div>
        </div><!-- /container -->
    </div><!-- /headerwrap -->
@endsection