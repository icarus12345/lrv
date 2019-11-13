<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
		<meta http-equiv="refresh" content="5; url=/">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
			*, ::after, ::before {
				box-sizing: border-box;
				padding:0;
				margin:0;
			}
			
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
				padding: 15px;
            }
			.flex{
				display: flex;
			}
            .position-ref {
                position: relative;
            }

            .code {
                
				font-size: 60px;
				color: #5c6bc0;
            }
			h3{
				text-transform: uppercase;
			}
            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
			@yield('icon')
			<div>
				<div class="">
					<div class="code">
						@yield('code')
					</div>

					<h3>@yield('title')</h3>
				</div>
				<div>@yield('message')</div>
			</div>
        </div>
    </body>
</html>
