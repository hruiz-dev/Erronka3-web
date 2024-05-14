<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary"> 

    
    <main class="form-signin w-25 m-auto">
        <form>
            <h1 class="h3 mb-3 fw-bold text-center">Saioa hasi</h1>
            <img class="mb-4 w-50 rounded mx-auto d-block" src="resources/img/empresaLogo.png" alt="">
            
            <div class="form-floating">
                <input type="text" class="form-control" id="erabiltzailea" name="erabiltzailea" placeholder="Erabiltzailea">
                <label for="erabiltzailea">Erabiltzailea</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="pasahitza" name="pasahitza" placeholder="Pasahitza">
                <label for="pasahitza">Pasahitza</label>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Sign in</button>
            <?php if (isset($_GET['errorea'])) { ?>
                <div class="alert alert-danger mt-4" role="alert">
                    <?php echo $_GET['errorea']; ?>
                </div>
                <?php } ?> 
            </form>
            
        </main>
</body>
</html>