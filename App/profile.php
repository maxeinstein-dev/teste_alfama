<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include '../config.php';
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>

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
    <script src="https://accounts.google.com/gsi/client"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,100,0,0" />
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar-profile">
        <div class="container-fluid nav-container">
            <div class="nav-logo"><img src="../assets/alfamaweb_branco.png" alt="Alfama Web Logo"></div>

            <div>
                <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarLogout" aria-expanded="false" aria-details="false"
                    aria-controls="navbarLogout">
                    <i class="fa-solid fa-bars-staggered nav-icon"></i></button>
            </div>

        </div>
    </nav>
    <div class="collapse nav-logout" id="navbarLogout">
        <ul class="navbar-nav">
            <li class="nav-item logout-link">
                <a href="#" id="logout-link">Logout</a>
            </li>
        </ul>
    </div>

    <div class="profile">

        <!-- Imagem de Perfil -->
        <div class="photo">
            <div class="photo-container">
                <img src="<?php echo isset($profile_image) ? $profile_image : '../assets/sem_imagem.png' ?>"
                    alt="Imagem de Perfil" class="profile-img" id="profile-img">
            </div>

            <div class="camera-icon" onclick="document.getElementById('avatar').click();">
                <span class="material-symbols-outlined">
                    photo_camera
                </span>
            </div>
            <input type="file" name="avatar" id="avatar">

            <div class="perfil-name">
                <h2 id="display_name"><?php echo htmlspecialchars($user['name'] ?? '') ?></h2>
                <h4 id="display_profession">
                    <?php echo htmlspecialchars($user['profession'] ?? '') ?: 'Profissão não informada'; ?></h4>
            </div>
        </div>

        <!-- Formulário de edição -->
        <div class="profile-container">
            <form class="form-group" method="POST" id="form_edit">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="fw-bold input-label" for="name">Nome Completo</label>
                        <input class="form-control mb-3 input-form" type="text" placeholder="Digite seu nome"
                            name="name" id="name" value="<?php echo htmlspecialchars($user['name'] ?? '') ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="fw-bold input-label" for="email">E-mail</label>
                        <input class="form-control mb-3 input-form" type="email" placeholder="Digite seu email"
                            name="email" id="email" value="<?php echo htmlspecialchars($user['email'] ?? '') ?>"
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="fw-bold input-label" for="telephone">Telefone</label>
                        <input class="form-control mb-3 input-form" type="number" name="telephone" id="telephone"
                            placeholder="Digite seu telefone"
                            value="<?php echo htmlspecialchars($user['telephone'] ?? '') ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="fw-bold input-label" for="cpf">CPF</label>
                        <input class="form-control mb-3 input-form" type="number" name="cpf" id="cpf"
                            placeholder="Digite seu CPF" value="<?php echo htmlspecialchars($user['cpf'] ?? '') ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="fw-bold input-label" for="profession">Profissão</label>
                        <input class="form-control mb-3 input-form" type="text" name="profession" id="profession"
                            placeholder="Digite sua Profissão"
                            value="<?php echo htmlspecialchars($user['profession'] ?? '') ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="fw-bold input-label" for="address">Endereço</label>
                        <input class="form-control mb-3 input-form" type="text" name="address" id="address"
                            placeholder="Digite seu endereço"
                            value="<?php echo htmlspecialchars($user['address'] ?? '') ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-th col-sm-8 offset-sm-2 text-center">Atualizar
                    Cadastro</button>
            </form>
        </div>

        <div class="mt-3" id="message_container"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="/App/scripts.js"></script>

    <script>
        // Logout
        $(document).ready(function() {
            $("#logout-link").on("click", function(e) {
                e.preventDefault();

                $.ajax({
                    url: "logout.php",
                    type: "POST",
                    success: function() {
                        window.location.href = "login.php";
                    },
                    error: function() {
                        alert("Erro ao tentar fazer logout.");
                    },
                });
            });
        });
    </script>
</body>

</html>