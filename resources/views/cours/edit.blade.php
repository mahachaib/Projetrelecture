
@extends('layout')

@section('content')

    <!-- ========== HEADER SECTION ========== -->
    <h1>Editer un cours</h1>
    <div id="itemwrap">
        <div class="container"> <br><br><br><br><br><br>

        {!! Form::open(['route' => ['cours.update', $cours->id], 'method' => 'PUT']) !!}
                {{ Form::hidden('id', $cours->id) }}

            <div class="input-group">
                {{ Form::text('titre', $cours->titre,['placeholder'=>'Titre du cours vidéo...', 'class'=>'form-control']) }}
                <br>
                {!! Form::file('video', null) !!}
            </div> 

            <div id="image">
                
            </div>

            <br><br>
            {{ Form::submit() }}
        {!! Form::close() !!}


        <hr><h3 style="color: white">ajouter une image</h3>

        {!! Form::open(['route' => ['addImage', $cours->id], 'method' => 'PUT', 'files'=>true]) !!}
                {{ Form::hidden('id', $cours->id) }}
                {{ Form::text('titre', null,['placeholder'=>'Titre du lien', 'class'=>'form-control']) }}
                {{ Form::text('time', null,['placeholder'=>'valeur begin ex: 00:00:00', 'class'=>'form-control']) }}
                {!! Form::file('image', null) !!}
            <br><br>
            {{ Form::submit() }}
        {!! Form::close() !!}


            <div class="row">
                <br>
                <br>
                <br>
                <div class="col-lg-6 col-lg-offset-3">
                </div>
            </div>
        </div><!-- /container -->
    </div><!-- /headerwrap -->

@endsection