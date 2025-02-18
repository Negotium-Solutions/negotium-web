<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Negotium AI Consulting</title>
        <script async src="https://www.google.com/recaptcha/api.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Young+Serif&display=swap" rel="stylesheet">
  <style>
  /* Reset some default styles */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  header, footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  header {
    height: 250px;
	font-family:"Young Serif",Serif;
	color:#F9F871;
	font-size:1.5rem;
	font-weight:normal;
  }
  

  footer {
    padding: 20px;
  }

  main {
    flex: 1;
    display: flex;
    /* justify-content: center;
    align-items: center; */
    width: 100%;
    background-color: #333;
  }

  .container {
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
  }

  .column {
    background-color: transparent;
    padding: 20px;
	border:1px solid #FFF;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    flex: 1 1 300px;
	color:#FFF;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin:0px auto;
  }

  @media (max-width: 768px) {
    .container {
      flex-direction: column;
    }

    .column {
      width: 90%;
    }
  }
  </style>
    </head>
    <body>
            @if (Route::has('login'))
                <div style="position:fixed;top:7px;right:7px;background:transparent;">
                    @auth
                    <a href="{{ url('/contact-list') }}" class="font-semibold text-white hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Contact List</a>
                    @else
                        <a href="{{ route('login') }}" class="" style="color:#FFF;text-decoration:none;">Log in</a>
                    @endauth
                </div>
            @endif
            <header>
                <h1>Negotium</h1>
            </header>

            <main>
                <div class="container col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="text-white pb-3 mb-3 text-center">
                <h3>AI Consulting</h3>
                <small>&nbsp;</small>
              </div>
              <div class="text-white pb-3 mb-3 text-center"></div>
                  @if(Session::has('flash_success'))
                    <div class="alert alert-success" role="alert">
                          {{Session::get('flash_success')}}
                          <br />
                          <br />
                          <a href="/" style="text-decoration:none">Return to Homepage</a>
                    </div>
                        {{Session::forget('flash_success')}}
                        @else
                    <p style="color:#FFF;margin:0px auto 20px;">Thank you for your interest in Negotium.<br />
                    Please leave your details below and we will get back to you within 20 minutes.</p>
                    <div class="column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method="post" action="{{ route('sendContact') }}" class="row g-2 align-items-center">
                    @csrf
                      <div class="form-group">
                      <div class="col-auto">
                          <label for="name" class="visually-hidden">Name</label>
                          <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Enter your name" required>
                      </div>
                      </div>
                      <div class="form-group">
                      <div class="col-auto">
                          <label for="email" class="visually-hidden">Email</label>
                          <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Enter your email" required>
                          <input type="hidden" name="page" value="AI Consulting" />
                      </div>
                      </div>
                      <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>
                      <div class="w-100 text-right">
                          <button type="submit" class="float-right btn btn-primary">Submit</button>
                      </div>
                  </form>
                    </div>
                    @endif
                </div>
            </main>

            <footer>
                <p>© 2025 Negotium Solutions</p>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
