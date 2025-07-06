<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h1 class="mb-4">Lista de Contatos</h1>

    @if($contacts->count())
        <div class="list-group mb-4">
            @foreach ($contacts as $contact)
                <div class="list-group-item">
                    <strong>{{ $contact->name }}</strong> - {{ $contact->email }}
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>
    @else
        <div class="alert alert-info">Nenhum contato encontrado.</div>
    @endif

</body>
</html>