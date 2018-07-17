<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>XLS Comparator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
          integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">AI Analyzer</a>
</nav>

<main role="main" class="container pt-4">
    <form action="" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Files to compare</h2>
        <div class="row mt-3">
            <div class="col">
                <div class="custom-file mb-3">
                    <input type="file" name="file1" id="file1" class="custom-file-input" accept="application/vnd.ms-excel">
                    <label class="custom-file-label" for="file1">Choose file A</label>
                </div>

                <div class="custom-file">
                    <input type="file" name="file2" id="file2" class="custom-file-input" accept="application/vnd.ms-excel">
                    <label class="custom-file-label" for="file2">Choose file B</label>
                </div>
            </div>
        </div>
        <p class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Compare</button>
        </p>
    </form>

    <?php require 'vendor/autoload.php'; ?>
    <?php include 'src/analyzer.php'; ?>
</main><!-- /.container -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script>
    jQuery(function($){
        $(document).on('change', '.custom-file-input', function(){
            $(this).next().text($(this).val());
        });
    });
</script>
</body>
</html>
