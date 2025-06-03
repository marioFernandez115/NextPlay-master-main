<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ __('resetpassword.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f0f4f8;
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            color: #333;
        }

        .email-wrapper {
            width: 100%;
            background: linear-gradient(135deg, #e0ecff 0%, #f8fbff 100%);
            padding: 40px 0;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .email-header {
            background: #0b5ed7;
            padding: 30px;
            text-align: center;
            color: white;
        }

        .email-header img {
            max-width: 120px;
            margin-bottom: 15px;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .email-body {
            padding: 30px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .email-button {
            display: inline-block;
            background: #0b5ed7;
            color: #fff !important;
            text-decoration: none;
            font-weight: bold;
            padding: 14px 30px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .email-button:hover {
            background: #094bc1;
        }

        .email-footer {
            text-align: center;
            font-size: 13px;
            color: #777;
            padding: 20px 30px 30px;
            background: #f0f4f8;
        }

        .email-footer a {
            color: #0b5ed7;
            text-decoration: none;
        }

        @media only screen and (max-width: 620px) {

            .email-body,
            .email-footer {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
                <h1>{{ __('general.reset_password') }}</h1>
            </div>
            <div class="email-body">
                <p>{{ __('resetpassword.greeting') }}</p>
                <p>{{ __('resetpassword.intro') }}</p>
                <p>{{ __('resetpassword.instructions') }}</p>
                <p style="text-align: center;">
                    <a href="{{ $url }}" class="email-button">{{ __('resetpassword.button') }}</a>
                </p>
                <p>{{ __('resetpassword.validity') }}</p>
                <p>{{ __('resetpassword.thanks') }}</p>
            </div>
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} NextPlay. {{ __('resetpassword.rights') }}</p>
                <p><a href="{{ route('home') }}">{{ __('resetpassword.back_to_site') }}</a></p>
            </div>
        </div>
    </div>
</body>

</html>