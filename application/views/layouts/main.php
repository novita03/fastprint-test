<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?? 'Fastprint Test' ?></title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <style>
        .col-nama {
            width: 40%;
            white-space: normal;
        }

        @media screen and (max-width: 768px) {
            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            table {
                min-width: 300px;
            }
        }
    </style>

</head>

<body>

    <section class="section">
        <div class="container">
            <?= $content ?>
        </div>
    </section>

</body>

</html>