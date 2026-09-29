<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="padding: 10px">
    <!-- As a link -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Transactions</a>
        </div>
    </nav>

    <div class="card">
        <div class="card-header">
            Transaction Details
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$transaction['category_id']}}</h5>
            <p class="card-text">Description: {{$transaction['descripiton']}}</p>
            <p class="card-text">Amount: {{$transaction['amount']}}</p>
            <p class="card-text">Created By: {{$transaction['user_id']}}</p>
            <p class="card-text">Date: {{$transaction['date']}}</p>
        </div>
    </div>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
