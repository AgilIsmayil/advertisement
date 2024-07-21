<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{asset('site-front/bootstrap/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site-front/index.css')}}" />
    <title>Tapaz</title>
  </head>
  <body>
     {{-- @dd(request()) --}}
    <div class="registrationBlock">
      <div class="registrationBlockPopup">
        <a
          href="{{route('login')}}"
          class="registrationBlockPopupBackLink"
          title="exit"
        >
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <path
              d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"
            />
          </svg>
        </a>
        <div class="registrationBlockPopupName">Girisi tesdiqle</div>
        <div>
                 

         <form action="{{route('login.confirm.submit', $user_id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Kod</label>
                <input type="number" name="code" id="code" class="form-control">
            </div>
            
              <button type="submit" class="registrationBlockPopupSubmit">
            Tesdiqle
          </button> 
         </form>


         <hr>

        @if(session('fail'))
            <div class="alert alert-danger">
               {{session('fail')}}
            </div>
         @endif

         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
             

        </div>
        <div>
        
        </div>
      </div>
    </div>
  </body>
</html>
