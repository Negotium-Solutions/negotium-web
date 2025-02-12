<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Negotium</title>
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
    justify-content: center;
    align-items: center;
    width: 100%;
    background-color: #333;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    max-width: 1200px;
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
    height: 200px; /* Ensures all cards are the same height */
    display: flex;
    flex-direction: column;
    justify-content: center;
    max-width:300px;
    min-width:300px;
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
                <div style="position:fixed;top:10px;right:10px;background:transparent;">
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
                <div class="container">
                    <a href="/thebosss" style="text-decoration:none;">
                        <div class="column column1">
                            <h3>Negotium.app<br />- The BOSSS -</h3>
                            <small>Business Operating Self-Service System</small>
                        </div>
                    </a>
                    <a href="/jwot" style="text-decoration:none;">
                        <div class="column column2">
                            <h3>Negotium Just Walk Out Technology</h3>
                        </div>
                    </a>
                    <a href="/ai" style="text-decoration:none;">
                        <div class="column column3">
                            <h3>AI Consulting</h3>
                        </div>
                    </a>
                </div>
            </main>

            <footer>
                <p>© 2025 Negotium Solutions</p>
            </footer>
        </div>
    </body>
</html>
