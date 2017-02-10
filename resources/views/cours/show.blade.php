
@extends('layout')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/layout.css') }}">
    <link rel="alternate stylesheet" title="brown" type="text/css" href="{{ asset('/css/theme-brown.css') }}">
    <link rel="alternate stylesheet" title="brown" type="text/css" href="{{ asset('/css/theme-cream.css') }}">
    <link rel="alternate stylesheet" title="brown" type="text/css" href="{{ asset('/css/theme-green.css') }}">
    <link rel="alternate stylesheet" title="brown" type="text/css" href="{{ asset('/css/theme-blue.css') }}">


        <link rel="timesheet" href="{{ url('/smil/'.$cours->id) }}">



 
    <script type="text/javascript" src="{{ asset('/js/timesheets.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/timesheets-controls.js') }}"></script>


<div id="itemwrap">
    <div class="container"> 
        <header>

        <h2 style="text-align: center;"> {{ $cours->titre }} </h2>

       </header>

       <div id="slideshow" class="cross-fade" style="border:10px solid black;" >

        <button id="swap" class="glyphicon glyphicon-refresh" style="color:red"; ></button>

      <div id="images">
        @foreach($cours->image as $img)

          <img id="{{ $img->id }}"  src="{{ url('/image_view/'.$img->id) }}">

        @endforeach
      </div>


      <video id="talk" width="320" height="240" poster="http://tyrex.inria.fr/timesheets/public/ensLyon/images/BSeguin-640.jpg" autoplay>
        <source src="{{ route('getVideo', $cours->id)  }}" type="video/mp4">      
      </video>


      <nav id="timeController">
          <!-- Table of Contents -->
          <div class="smil-toc" >
          <ul>
             @foreach($cours->titres as $titre)
                    <li><a href="#{{$titre->image_id}}"  >{{ $titre->titre }}</a></li>
              @endforeach
          </ul>
          </div>

<!-- timeline + control buttons -->
<div class="smil-controlBar">
    <div class="smil-left">
      <button class="smil-first" ><span class="glyphicon glyphicon-step-backward" style="color:red";></span></button>
      <button class="smil-prev"><span class="glyphicon glyphicon-backward" style="color:red";></span></button>
      <button class="smil-play"><span class="glyphicon glyphicon-play" style="color:red"; >||</span></button>
      <button class="smil-next"><span class="glyphicon glyphicon-forward" style="color:red"; ></span></button>
      <button class="smil-last"><span class="glyphicon glyphicon-step-forward" style="color:red"; ></span></button>
  </div>
  <div class="smil-timeline">
      <div class="smil-timeSegments"></div>
      <div class="smil-timeCursor"></div>
  </div>
  <div class="smil-right smil-currentTime">0:00:00</div>
</div>
</nav>
</div>

</div><!-- /container -->
</div><!-- /headerwrap -->

    <script type="text/javascript">
    // <![CDATA[
    function setStyleSheet(select) {
      var i, a, title = select.options[select.selectedIndex].text;
      for (i = 0; (a = document.getElementsByTagName("link")[i]); i++)
        if (/style/.test(a.getAttribute("rel")) && a.getAttribute("title"))
          a.disabled = (a.getAttribute("title") != title);
    }
    // ]]>
  </script>

<!-- ========== WHITE SECTION ========== -->
@endsection