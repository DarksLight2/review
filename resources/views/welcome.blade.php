<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('sync').addEventListener('click', (e) => {
                    axios.get('{{ route('google.calendar.sync', ['user_id' => 2]) }}').then((response) => {
                        if(response.data.status === 'need_authorization') {
                            openOAuth(response.data.data.url)
                        }
                    })
                })
            })

            function openOAuth(link) {
                let width = screen.width;
                let height = screen.height;

                let left = (width - 500) / 2;
                let top = (height - 600) / 2;
                window.open(link, 'OAuth', `width=500,height=600,popup=1,top=${top}px,left=${left}px`);
            }
        </script>
        <title>Laravel</title>
    </head>
    <body>
    <a id="sync">sync</a>
    </body>
</html>
