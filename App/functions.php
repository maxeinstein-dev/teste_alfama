<?php
header('Content-Type: application/json');
session_start();

include('../config.php');


try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] == 'register') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Adicionando dados na tabela usuarios
            $stmt = $pdo->prepare("INSERT INTO usuarios (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $password]);
            echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
        }

        if ($_POST['action'] == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                echo json_encode(['success' => true, 'message' => 'Login bem-sucedido!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'E-mail ou senha incorretos.']);
            }
        }

        if ($_POST['action'] == 'edit') {
            $user_id = $_SESSION['user_id'];

            $fields = [];

            // Verifica quais campos chegaram para edição
            if (!empty($_POST['name'])) {
                $fields['name'] = $_POST['name'];
            }

            if (!empty($_POST['telephone'])) {
                $fields['telephone'] = $_POST['telephone'];
            }

            if (!empty($_POST['cpf'])) {
                $fields['cpf'] = $_POST['cpf'];
            }

            if (!empty($_POST['profession'])) {
                $fields['profession'] = $_POST['profession'];
            }

            if (!empty($_POST['address'])) {
                $fields['address'] = $_POST['address'];
            }

            // Monta a query de forma dinâmica
            if (!empty($fields)) {
                $set = [];
                $values = [];
                foreach ($fields as $key => $value) {
                    $set[] = "$key = ?";
                    $values[] = $value;
                }

                $values[] = $user_id;

                $stmt = $pdo->prepare("UPDATE usuarios SET " . implode(', ', $set) . " WHERE id = ?");
                $stmt->execute($values);
                echo json_encode(['success' => true, 'message' => 'Perfil atualizado com sucesso!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Nenhum campo foi atualizado.']);
            }
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
    }
} catch (PDOException $e) {
    // Verificando se possui erro de chave única (e-mail)
    if ($e->getCode() === '23000') {
        echo json_encode(['success' => false, 'message' => 'Este e-mail já está cadastrado.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
    }
    exit;
}
