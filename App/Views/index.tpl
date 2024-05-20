<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Welcome, {{ $name }}</h1>

    <h2>Items</h2>
    <ul>
        {% foreach ($items as $item) %}
            <li>{{ $item }}</li>
        {% endforeach %}
    </ul>

    {% if ($name == 'John Doe') %}
        <p>Hello, John Doe!</p>
    {% else %}
        <p>Hello, stranger!</p>
    {% endif %}


    <ul>
        {% foreach ($data as $datum) %}
            <li>{{ $datum }}</li>
        {% endforeach %}
    </ul>
</body>
</html>

