<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <form method="post" action='http://127.0.0.1:8000/api/products/create'>
            <input name="name" value="test">
            <input name="description" value="test desc">
            <input name="price" value="0">
            <input name="main_image" value="aaa">
            <input name="images[0]" value="bbb">
            <input name="images[1]" value="ccc">
            <input type="submit">
        </form>
    </body>
</html>
