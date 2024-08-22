<!doctype html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfama Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/428084fa57.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>

    <div class="item-body">
        <div class="row ">
            <div class="col-sm-5">
                <!-- NavBar -->
                <?php include 'navBar.php'; ?>
                <!-- Formulário de cadastro-->
                <div class="register-container">
                    <span class="fw-bold fs-1 mb-3">Criar Conta</span>
                    <button class="btn btn-outline-dark w-100 mb-3">
                        <i class="fab fa-google me-2"></i>Faça login com o Google</button>
                    <div class="text-center">ou</div>
                    <form class="form-group" method="POST" id="form_register">
                        <div>
                            <label for="name" class="fw-bold input-label">Nome Completo</label>
                            <input class="form-control mb-3 input-form" type="text" name="name" id="name"
                                placeholder="Digite seu nome completo:" required>
                        </div>
                        <div>
                            <label for="email" class="fw-bold input-label">Email</label>
                            <input class="form-control mb-3 input-form" type="email" name="email" id="email"
                                placeholder="Digite seu email:" required>
                        </div>
                        <div class="div-form">
                            <label for="password" class="fw-bold input-label">Senha</label>
                            <input class="form-control input-form" type="password" name="password" id="password"
                                placeholder="Crie sua senha:" minlength="8" required>
                            <div>
                                <small class="input-label">
                                    Inserir mais de 8 caracteres
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-th">Criar Conta</button>
                    </form>
                    <p class="fw-bold text-center mt-3">Já tem conta? <a href="login.php" class="link-dark">Faça
                            Login</a>
                    </p>
                    <div class="mt-3" id="message_container"></div>
                </div>
            </div>
            <!-- Seção Banner -->
            <?php include 'banner.php'; ?>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/428084fa57.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="/App/scripts.js"></script>
</body>

</html>