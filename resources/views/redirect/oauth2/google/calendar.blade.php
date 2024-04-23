<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            axios.get('/google/calendar/sync/1').finally((response) => {
                window.close()
            })
        })
    </script>
</head>
<body>
</body>
</html>
