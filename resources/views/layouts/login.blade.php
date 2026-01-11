<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    @yield('content')
    <script>
        document.querySelector('.show-password').addEventListener('click', function(e) {
            e.preventDefault();
            const input = document.querySelector('.password-input');
            const btn = this;
            if (input.type === 'password') {
                input.type = 'text';
                btn.textContent = 'Hide';
            } else {
                input.type = 'password';
                btn.textContent = 'Show';
            }
        });
    </script>
</body>
</html>
