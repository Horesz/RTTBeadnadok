<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Catniplex') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="app.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eQFhEDP6YFdbT8kWv+Ed7DcA6STCE5cDE3/AEWq3gq2M6N8dAgYFLS9wqX9N0F0Z" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kezdőlap.css') }}" rel="stylesheet">






</head>
<body>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var myNavbar = new bootstrap.Collapse(document.getElementById('navbarNav'));
    });
</script>
<script>
    const navbarAutocomplete = document.querySelector('#navbar-search-autocomplete');
    const navbarData = ['One', 'Two', 'Three', 'Four', 'Five'];
    const navbarDataFilter = (value) => {
    return navbarData.filter((item) => {
    return item.toLowerCase().startsWith(value.toLowerCase());
    });
    };

    new mdb.Autocomplete(navbarAutocomplete, {
    filter: navbarDataFilter,
    });
</script>

</body>
</html>