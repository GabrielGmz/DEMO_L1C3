<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body style= "box-sizing: border-box; font-family: sans-serif; margin: 0; padding: 0; background-color: #000000; color:white;">
        <nav style="background-color: #005eff; padding: 16px; color: white; display: flex; justify-content: space-between; align-items: center;">
            <div style="font-size: 1.125rem; font-weight: bold;">
                RESERPLACE
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background-color: #f56565; color: white; font-weight: bold; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;"
                        onmouseover="this.style.backgroundColor='#e53e3e'"
                        onmouseout="this.style.backgroundColor='#f56565'">
                    Logout
                </button>
            </form>
        </nav>
        @yield('content')
    </body>
</html>
