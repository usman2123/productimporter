<!DOCTYPE html>
<html>
<head>
    <title>Product Importer</title>
</head>
<body>
    <h1>Product Importer</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="csv_file">Select CSV file:</label>
        <input type="file" name="csv_file" accept=".csv, .txt">
        <button type="submit">Import</button>
    </form>
</body>
</html>