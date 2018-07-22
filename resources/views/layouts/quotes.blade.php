
<div class="quotes_design">

  <div class="container tiltbody1">

      <h1 style="text-align: center; color: #3a416f;">Today's quotes</h1>

        <div class="row ">

          @foreach($quotes as $quote )

            <div class="col-sm" style="text-align: justify;">

              <h2 style="text-align: center;">{{$quote->title}}</h2><hr><br>

                <p style="text-align: justify;">

                  {{$quote->body}}

                </p>

            </div>   

          @endforeach  

        </div>  

  </div>

</div>

            

  




  




{{-- <div class="bag">  

  <h1 style="text-align: center;" >TODAY'S QUOTES</h1>

  <div class="row bg" style=" margin: 0px; ">

      @foreach($quotes as $quote )

        <div class="col-sm">

          <h2 style="text-align: center;">{{$quote->title}}</h2><hr><br>

          <p style="text-align: justify;">

              {{$quote->body}}

          </p>

        </div>

      @endforeach

  </div>
  
</div>
 --}}
