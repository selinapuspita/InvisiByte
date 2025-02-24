<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steganografi Web</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Welcome to Steganografi Web</h1>
    </header>
    <main>
        <p>This is the default content for the Steganografi Web application.</p>
        <form action="/encode" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" required>
            <input type="text" name="message" placeholder="Pesan rahasia" required>
            <button type="submit">Encode</button>
        </form>
        <form action="/decode" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" required>
            <button type="submit">Decode</button>
        </form>
                
    </main>
    <footer>
        <p>&copy; 2023 Steganografi Web. All rights reserved.</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>