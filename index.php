<!DOCTYPE html>
<html>
<head>
    <title>PDF2HTML</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-center">
                    <h1>Welcome to PDF2HTML!</h1>
                    <h2>Please upload your PDF file to be converted.</h2>
                </div>
                <?php
                if (isset($_GET['message'])) {
                    echo "<div class='alert alert-info'>{$_GET['message']}</div>";
                }
                ?>
                <form action="convert.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="pdfFile" accept="application/pdf" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Convert to HTML</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Credits and License -->
    <footer class="mt-5">
        <div class="container">
            <p class="text-center">
                Developed by <a href="https://linkedin.com/in/mateuslacorte">Mateus M. Côrtes (Lacorte)</a> - 
                <a href="https://github.com/mateuslacorte">GitHub</a>: <a href="https://github.com/mateuslacorte/pdftohtml">mateuslacorte/pdftohtml</a><br>
                Licensed under the <a href="https://opensource.org/licenses/MIT">MIT License</a>.
            </p>
        </div>
    </footer>
</body>
</html>
