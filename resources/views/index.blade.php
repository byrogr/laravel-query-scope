<!DOCTYPE html>
<html>
<head>
    <title>Busqueda</title>
</head>
<body>
    <h1>Busqueda</h1>

    <form action="{{ route('buscar') }}" method="get">
        <div>
            <label>Nombre:</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label>Bio</label>
            <input type="text" name="bio">
        </div>
        <div>
            <button type="submit">Buscar</button>
        </div>
    </form>
    <hr>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Bio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->bio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->render() }}
</body>
</html>
