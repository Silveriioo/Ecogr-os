<?php

function connection()
{
  $hostname = '127.0.0.1';
  $username = 'root';
  $password = '';
  $database = 'ecograos';

  global $conn;

  if (!isset($conn)) {
    $conn = mysqli_connect($hostname, $username, $password, $database);

    if (mysqli_connect_error()) {
      die('Ouve uma falha na conexão ' . mysqli_connect_error());
    }
  }
  return $conn;
}

function LoginModal()
{
  $html = '
    <!DOCTYPE html>
    <html class="h-full bg-white" lang="pt-br">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script type="module" src="controller/script/authLogin.js"></script>
        <title>Login</title>
        <!-- TailwindCss -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="controller/tailwindcss/tailwindcss.js"></script>
        <link rel="stylesheet" href="view/styles/tailwindcss.css" />
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <!-- Jquery -->
        <script
          src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
          crossorigin="anonymous"
        ></script>
      </head>
      <body class="h-full">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- <img class="mx-auto h-10 w-auto" src="" alt="Logo compania" /> -->
            <h2
              class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
            >
              Faça login em sua conta
            </h2>
          </div>
    
          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" id="FormLogin" method="POST">
              <div>
                <label
                  for="email"
                  class="block text-sm font-medium leading-6 text-gray-900"
                  >Email</label
                >
                <div class="mt-2">
                  <input
                    id="email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
    
              <div>
                <div class="flex items-center justify-between">
                  <label
                    for="senha"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Senha</label
                  >
                </div>
                <div class="mt-2">
                  <input
                    id="senha"
                    name="senha"
                    type="password"
                    autocomplete="current-senha"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
    
              <div>
                <button
                  type="submit"
                  class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                  Entrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </body>
    </html>
    ';

  echo $html;
}

function RegModal()
{
  $html = '
    <!DOCTYPE html>
    <html class="h-full bg-white" lang="pt-br">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="controller/script/authReg.js"></script>
    <title>Cadastro</title>
    <!-- TailwindCss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="controller/tailwindcss/tailwindcss.js"></script>
    <link rel="stylesheet" href="view/styles/tailwindcss.css" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- Jquery -->
    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
  </head>
      <body class="h-full">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- <img class="mx-auto h-10 w-auto" src="" alt="Logo compania" /> -->
            <h2
              class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
            >
              Faça seu cadastro
            </h2>
          </div>
    
          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" id="FormReg" method="POST">
              <div>
                <label
                  for="nome"
                  class="block text-sm font-medium leading-6 text-gray-900"
                  >Nome</label
                >
                <div class="mt-2">
                  <input
                    id="nomeReg"
                    name="nome"
                    type="text"
                    autocomplete="nome"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
    
              <div>
                <label
                  for="email"
                  class="block text-sm font-medium leading-6 text-gray-900"
                  >Email</label
                >
                <div class="mt-2">
                  <input
                    id="emailReg"
                    name="email"
                    type="email"
                    autocomplete="email"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
    
              <div>
                <label
                  for="cpf"
                  class="block text-sm font-medium leading-6 text-gray-900"
                  >CPF</label
                >
                <div class="mt-2">
                  <input
                    id="cpfReg"
                    name="cpf"
                    type="text"
                    autocomplete="cpf"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
    
              <div>
                <label
                  for="data"
                  class="block text-sm font-medium leading-6 text-gray-900"
                  >Data de Nascimento</label
                >
                <div class="mt-2">
                  <input
                    id="dataReg"
                    name="data"
                    type="date"
                    autocomplete="data"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
    
              <div>
                <div class="flex items-center justify-between">
                  <label
                    for="senha"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Senha</label
                  >
                </div>
                <div class="mt-2">
                  <input
                    id="senhaReg"
                    name="senha"
                    type="password"
                    autocomplete="current-senha"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
    
              <div>
                <button
                  type="submit"
                  class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                  Cadastrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </body>
    </html>    
    ';

  echo $html;
}

function RedefineModal()
{
  $html = '
  <!DOCTYPE html>
<html class="h-full bg-white" lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body class="h-full">
    <div
      class="relative z-50"
      aria-labelledby="modal-title"
      role="dialog"
      aria-modal="true"
    >
      <div
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
      ></div>

      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div
          class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
        >
          <div
            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
          >
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div
                  class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
                >
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
              </svg>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3
                    class="text-base font-semibold leading-6 text-gray-900"
                    id="modal-title"
                  >
                    Conta indisponível
                  </h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">
                      Vamos redireciona-lo para página inicial para realizar o login.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function redirecionarPagina() {
        window.location.href = "http://localhost/ecograos";
      }

      setInterval(redirecionarPagina, 10000);
    </script>
  </body>
</html>
  ';

  echo $html;
}

function usuarioJaExiste($conn, $campo, $valor)
{
  $valor = mysqli_real_escape_string($conn, $valor);

  $sql = "SELECT COUNT(*) as total FROM ecograos.usuarios WHERE $campo = '$valor'";
  $result = mysqli_query($conn, $sql);

  if ($result === false) {
    die("Erro na consulta SQL: " . mysqli_error($conn));
  }

  $row = mysqli_fetch_assoc($result);

  return $row['total'] > 0;
}

function CadastroUsuario()
{

  global $conn;
  $conn = connection();

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];

  if (usuarioJaExiste($conn, 'nome', $nome)) {
    echo json_encode(['success' => false, 'message' => 'Nome de usuário já cadastrado.']);
  } elseif (usuarioJaExiste($conn, 'email', $email)) {
    echo json_encode(['success' => false, 'message' => 'Email de usuário já cadastrado.']);
  } elseif (usuarioJaExiste($conn, 'cpf', $cpf)) {
    echo json_encode(['success' => false, 'message' => 'CPF de usuário já cadastrado.']);
  } else {
    $data = $_POST['data'];
    $senha = $_POST['senha'];
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "SELECT InserirUsuario(?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
      die("Erro ao preparar a declaração: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $cpf, $data, $senhaHash);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      echo json_encode(['success' => true]);
    } else {
      echo json_encode(['success' => false, 'message' => 'Erro ao executar a declaração']);
    }

    mysqli_stmt_close($stmt);
  }

  mysqli_close($conn);
}

function LoginUsuario()
{

  global $conn;
  $conn = connection();

  $email = $_POST['email'];

  if (usuarioJaExiste($conn, 'email', $email)) {

    $sql = "CALL ObterUsuarioPorEMAIL(?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
      die("Erro ao preparar a declaração: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);

    $result = mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {

      $hashSenhaArmazenada = $row['senha'];
      $senhaForm = $_POST['senha'];

      if (password_verify($senhaForm, $hashSenhaArmazenada)) {

        session_start();

        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];

        echo json_encode(['success' => true]);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'Erro ao executar a declaração.']);
    }
    mysqli_stmt_close($stmt);
  } else {
    echo json_encode(['success' => false, 'message' => 'Email de usuário não cadastrado.']);
  }
}

function Produtos()
{
  global $conn;
  $conn = connection();
  $produtos = array();

  for ($i = 1; $i <= 20; $i++) {
    $sql = "SELECT * FROM ecograos.produtos WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
      die("Erro ao preparar a declaração: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $i);

    $result = mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      $produtos[] = $row;
    }

    mysqli_stmt_close($stmt);
  }

  return $produtos;
}

function ListaProdutos()
{
  $produtos = Produtos();

  foreach ($produtos as $produto) {
    $id = $produto["id"];
    $categoria = $produto["categoria"];
    $imagens = $produto["imagens"];
    $valor = $produto["valor"];
    $nome = $produto["nome"];

    $html = '
      <div class="group relative">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="' . $imagens . '" alt="Imagens Produtos" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="produto.php?id=' . $id . '">
                <span aria-hidden="true" class="absolute inset-0"></span>
                ' . $nome . '
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">' . $categoria . '</p>
          </div>
          <p class="text-sm font-medium text-gray-900">R$' . $valor . '</p>
        </div>
      </div>
    ';

    echo $html;
  }
}

function BuscaUsuarios($userId)
{
  global $conn;
  $conn = connection();

  $sql = 'CALL ObterUsuarioPorID(?)';
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    die("Erro ao preparar a declaração: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "s", $userId);

  $result = mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      $id = $row['id'];
      $nome = $row['nome'];
      $email = $row['email'];
      $cpf = $row['cpf'];
      $celular = $row['celular'];
      $data = $row['data'];
      $senha = $row['senha'];

    } else {
      echo "Nenhum usuário encontrado com o ID $userId";
    }
  } else {
    echo "Erro na consulta: " . mysqli_error($conn);
  }
}
