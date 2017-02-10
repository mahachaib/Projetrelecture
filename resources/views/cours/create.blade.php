
@extends('layout')

@section('content')

    <!-- ========== HEADER SECTION ========== -->
    <div id="itemwrap">
        <div class="container"> <br><br><br><br><br><br>

        {!! Form::open(['route' => 'cours.store']) !!}

            <div class="input-group">
                {{ Form::text('titre', null,['placeholder'=>'Titre du cours vidéo...', 'class'=>'form-control']) }}
                {!! Form::file('video', null) !!}
            </div> 

            <div id="image">
                
            </div>

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