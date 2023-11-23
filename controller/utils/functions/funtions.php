<?php
function connection()
{
  $hostname = '127.0.0.1';
  $username = 'root';
  $password = '16f02m#21j04t';
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
    <script type="module" src="../../controller/script/authLogin.js"></script>
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
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 z-0">
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
    <script type="module" src="../../controller/script/authReg.js"></script>
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
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8  z-0">
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
        window.history.back();
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

  $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8') : '';
  $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
  $cpf = isset($_POST['cpf']) ? preg_replace('/[^0-9]/', '', $_POST['cpf']) : '';

  if (empty($nome) || empty($email) || empty($cpf)) {
    echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
  } elseif (usuarioJaExiste($conn, 'nome', $nome)) {
    echo json_encode(['success' => false, 'message' => 'Nome de usuário já cadastrado.']);
  } elseif (usuarioJaExiste($conn, 'email', $email)) {
    echo json_encode(['success' => false, 'message' => 'Email de usuário já cadastrado.']);
  } elseif (usuarioJaExiste($conn, 'cpf', $cpf)) {
    echo json_encode(['success' => false, 'message' => 'CPF de usuário já cadastrado.']);
  } else {
    $data = isset($_POST['data']) ? htmlspecialchars($_POST['data'], ENT_QUOTES, 'UTF-8') : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

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

  $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';

  if (empty($email)) {
    echo json_encode(['success' => false, 'message' => 'Email inválido.']);
  } elseif (usuarioJaExiste($conn, 'email', $email)) {

    $sql = "CALL ObterUsuarioPorEMAIL(?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
      die("Erro ao preparar a declaração: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);

      if ($row) {
        $hashSenhaArmazenada = $row['senha'];
        $senhaForm = isset($_POST['senha']) ? $_POST['senha'] : '';

        if (password_verify($senhaForm, $hashSenhaArmazenada)) {

          session_start();

          $_SESSION['id'] = $row['id'];
          $_SESSION['email'] = $row['email'];

          echo json_encode(['success' => true]);
        } else {
          echo json_encode(['success' => false, 'message' => 'Senha incorreta.']);
        }
      } else {
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'Erro ao executar a declaração.']);
    }

    mysqli_stmt_close($stmt);
  } else {
    echo json_encode(['success' => false, 'message' => 'Email de usuário não cadastrado.']);
  }

  mysqli_close($conn);
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
              <a href="view/pages/produto?id=' . $id . '">
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

function BuscaUsuarios($userEmail)
{
  global $conn;
  $conn = connection();

  $sql = 'CALL ObterUsuarioPorEMAIL(?)';
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    die("Erro ao preparar a declaração: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "s", $userEmail);

  $result = mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      $userinfo = array(
        'id' => $row['id'],
        'nome' => $row['nome'],
        'data' => $row['data'],
        'cpf' => $row['cpf'],
        'email' => $row['email'],
        'celular' => $row['celular'],
        'rua' => $row['rua'],
        'cidade' => $row['cidade'],
        'estado' => $row['estado'],
        'cep' => $row['cep'],
        'adicionais' => $row['adicionais']
      );
      return $userinfo;
    } else {
      echo "Nenhum usuário encontrado com o ID $userEmail";
    }
  } else {
    echo "Erro na consulta: " . mysqli_error($conn);
  }
}

function celularJaExiste($conn, $celular, $id)
{
  $sql = 'SELECT id FROM ecograos.usuarios WHERE celular = ? AND id <> ?';
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    die("Erro ao preparar a declaração: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "ss", $celular, $id);

  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    return !empty($row);
  } else {
    return false;
  }

  mysqli_stmt_close($stmt);
}

function RedefineUser()
{
  global $conn;
  $conn = connection();

  $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
  $nome = isset($_POST['nome']) ? filter_var($_POST['nome'], FILTER_SANITIZE_STRING) : '';
  $date = isset($_POST['date']) ? htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8') : '';
  $cpf = isset($_POST['cpf']) ? filter_var($_POST['cpf'], FILTER_SANITIZE_STRING) : '';
  $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
  $celular = isset($_POST['celular']) ? htmlspecialchars($_POST['celular'], ENT_QUOTES, 'UTF-8') : '';
  $rua = isset($_POST['rua']) ? filter_var($_POST['rua'], FILTER_SANITIZE_STRING) : '';
  $cidade = isset($_POST['cidade']) ? filter_var($_POST['cidade'], FILTER_SANITIZE_STRING) : '';
  $regiao = isset($_POST['regiao']) ? filter_var($_POST['regiao'], FILTER_SANITIZE_STRING) : '';
  $cep = isset($_POST['cep']) ? filter_var($_POST['cep'], FILTER_SANITIZE_STRING) : '';
  $adicional = isset($_POST['adicional']) ? filter_var($_POST['adicional'], FILTER_SANITIZE_STRING) : '';

  if (empty($id) || empty($nome) || empty($date) || empty($cpf) || empty($email) || empty($celular) || empty($rua) || empty($cidade) || empty($regiao) || empty($cep)) {
    echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
    return;
  }

  if (celularJaExiste($conn, $celular, $id)) {
    echo json_encode(['success' => false, 'message' => 'Este número de celular já está em uso.']);
    return;
  }

  $sql = 'SELECT AtualizarUsuarioPorID(?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    die("Erro ao preparar a declaração: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "sssssssssss", $nome, $email, $cpf, $celular, $date, $rua, $cidade, $regiao, $cep, $adicional, $id);

  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Ocorreu um erro ao atualizar as informações: ' . mysqli_error($conn)]);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}

function Logout()
{
  session_start();

  unset($_SESSION['id']);
  unset($_SESSION['email']);

  session_destroy();

  header('Location: ../../index');
  exit();
}

function Produto()
{
  global $conn;
  $conn = connection();
  $id = $_GET['id'];
  $produtos = array();

  $sql = "SELECT * FROM ecograos.produtos WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    die("Erro ao preparar a declaração: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "s", $id);

  $result = mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $produtos = array();

  if ($result && $row = mysqli_fetch_assoc($result)) {
    $produtos[] = $row;
  }

  mysqli_stmt_close($stmt);

  return $produtos;
}

function CompraCarrinho()
{
  global $conn;
  $conn = connection();

  $idProduto = $_POST["id"];
  $quantidade = $_POST["quantidade"];

  $sql = "SELECT * FROM ecograos.produtos WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt === false) {
    die("Falha na preparação da busca: " . mysqli_error($conn));
  }
  mysqli_stmt_bind_param($stmt, "s", $idProduto);
  $executeResult = mysqli_stmt_execute($stmt);
  if ($executeResult === false) {
    die("Falha na execução da busca: " . mysqli_error($conn));
  }

  $result = mysqli_stmt_get_result($stmt);
  $produto = array();
  if ($result && $row = mysqli_fetch_assoc($result)) {
    $produto[] = $row;

    $userid = $_POST['user'];

    $sqlInserir = "CALL InserirPedido(?, ?, ?, ?)";
    $stmtInserir = mysqli_prepare($conn, $sqlInserir);
    mysqli_stmt_bind_param($stmtInserir, "ssss", $userid, $idProduto, $quantidade, $row['valor']);
    $executeInserir = mysqli_stmt_execute($stmtInserir);

    if ($executeInserir === false) {
      die("Erro ao inserir pedido: " . mysqli_error($conn));
    }

    if ($executeInserir) {
      echo json_encode(['success' => true]);
    } else {
      echo json_encode(['success' => false, 'message' => 'Erro ao inserir pedido.']);
    }
  }
}

function Carrinho($userId)
{
  global $conn;
  $conn = connection();

  $sql_pedidos = "SELECT * FROM ecograos.pedidos WHERE usuario_id = ?";
  $stmt_pedidos = mysqli_prepare($conn, $sql_pedidos);
  mysqli_stmt_bind_param($stmt_pedidos, "s", $userId);
  mysqli_stmt_execute($stmt_pedidos);
  $result_pedidos = mysqli_stmt_get_result($stmt_pedidos);

  $carrinho = array();

  while ($pedido = mysqli_fetch_assoc($result_pedidos)) {
    $sql_produto = "SELECT * FROM ecograos.produtos WHERE id = ?";
    $stmt_produto = mysqli_prepare($conn, $sql_produto);
    mysqli_stmt_bind_param($stmt_produto, "s", $pedido['produto_id']);
    mysqli_stmt_execute($stmt_produto);
    $result_produto = mysqli_stmt_get_result($stmt_produto);
    $produto = mysqli_fetch_assoc($result_produto);

    $carrinho[] = array(
      'pedido' => $pedido,
      'produto' => $produto
    );
  }

  $html = "<ul role='list' class='-my-6 divide-y divide-gray-200'>";
  foreach ($carrinho as $item) {
    $html .= "
      <li class='flex py-6'>
        <div class='h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200'>
          <img src='" . $item['produto']['imagens'] . "' alt='produtos.' class='h-full w-full object-cover object-center' />
        </div>
        <div class='ml-4 flex flex-1 flex-col'>
          <div>
            <div class='flex justify-between text-base font-medium text-gray-900'>
              <h3>
                <a href='#'>" . $item['produto']['nome'] . "</a>
              </h3>
              <p class='ml-4'>" . $item['produto']['valor'] . "</p>
            </div>
          </div>
          <div class='flex flex-1 items-end justify-between text-sm'>
            <p class='text-gray-500'>" . $item['pedido']['quantidade'] . "</p>
            <div class='flex'>
            <form class='form-remover'>
        <button value='" . $item['pedido']['id'] . "' class='btn-remover font-medium text-indigo-600 hover:text-indigo-500'>
          Remover
        </button>
      </form>
            </div>
          </div>
        </div>
      </li>
      
      
    ";
  }
  $html .= "
  <script type='module' src='controller/script/removerCarrinho.js'></script>
  <script type='module' src='../../controller/script/removerCarrinho.js'></script>
  </ul>";

  echo $html;
}

function removerCarrinho()
{
  global $conn;
  $conn = connection();

  $id = $_POST['id'];

  $sql = 'CALL RemoverPedidoPorId(?)';
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, 's', $id);
  $success = mysqli_stmt_execute($stmt);

  if ($success) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
  }
}

function ValorPorUsuario($userId)
{
  global $conn;
  $conn = connection();

  $sql = "SELECT quantidade, valor_total FROM ecograos.pedidos WHERE usuario_id = ?";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    die("Falha na consulta: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "i", $userId);

  $result = mysqli_stmt_execute($stmt);

  if ($result === false) {
    die("Falha ao executar a consulta: " . mysqli_error($conn));
  }

  $result = mysqli_stmt_get_result($stmt);

  $ValorTotal = 0;

  while ($row = mysqli_fetch_assoc($result)) {
    $totalItens = $row['quantidade'];
    $totalValor = $row['valor_total'];

    $ValorTotal += $totalItens * $totalValor;
  }

  return $ValorTotal;
}

function FinalizarCarrinho($userId)
{
  global $conn;
  $conn = connection();

  $sql_pedidos = "SELECT * FROM ecograos.pedidos WHERE usuario_id = ?";
  $stmt_pedidos = mysqli_prepare($conn, $sql_pedidos);
  mysqli_stmt_bind_param($stmt_pedidos, "s", $userId);
  mysqli_stmt_execute($stmt_pedidos);
  $result_pedidos = mysqli_stmt_get_result($stmt_pedidos);

  $carrinho = array();
  $itens = '';

  while ($pedido = mysqli_fetch_assoc($result_pedidos)) {
    $sql_produto = "SELECT * FROM ecograos.produtos WHERE id = ?";
    $stmt_produto = mysqli_prepare($conn, $sql_produto);
    mysqli_stmt_bind_param($stmt_produto, "s", $pedido['produto_id']);
    mysqli_stmt_execute($stmt_produto);
    $result_produto = mysqli_stmt_get_result($stmt_produto);
    $produto = mysqli_fetch_assoc($result_produto);

    $carrinho[] = array(
      'pedido' => $pedido,
      'produto' => $produto
    );

    $itens .= "Você está comprando um(a) " . $produto['nome'] . " do valor de " . $produto['valor'] . " com a quantidade de " . $pedido['quantidade'] . " unidades. ";
    $itens .= "Valor total por item de R$ " . ($pedido['quantidade'] * $produto['valor']) . PHP_EOL;
  }
  $itens .= "Valor total é de R$" . ValorPorUsuario($userId) . "";
  echo $itens;
}

function Boleto()
{
  global $conn;
  $conn = connection();
  $userId = $_POST['id'];

  $sql = 'SELECT * FROM ecograos.usuarios WHERE id = ?';
  $stmt = mysqli_prepare($conn, $sql);
  $stmt->bind_param('s', $userId);
  $stmt->execute();
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    $dados[] = $row;

    $dataAtual = new DateTime();
    $dataAtual->modify('+5 days');

    $dataVencimento = $dataAtual->format('Y-m-d');
    $valor = ValorPorUsuario($userId);
    $nossoNumero = '123456789';
    $numeroDocumento = '000001';

    $nomeSacado = $dados[0]['nome'];
    $enderecoSacado = $dados[0]['rua'];
    $cepSacado = $dados[0]['cep'];
    $cidadeSacado = $dados[0]['cidade'];
    $ufSacado = $dados[0]['estado'];
    $cpfSacado = $dados[0]['cpf'];

    $nomeCedente = 'Ecograos';
    $cnpjCedente = '12.345.678/0001-90';
    $bancoCedente = '4637';
    $agenciaCedente = '1234';
    $contaCedente = '56789';

    $dataAtual = date('d-m-Y');

    function modulo11($num)
    {
      $numInvertido = strrev($num);
      $multiplicadores = [2, 3, 4, 5, 6, 7, 8, 9];
      $soma = 0;

      foreach (str_split($numInvertido) as $key => $char) {
        $multiplicador = $multiplicadores[$key % count($multiplicadores)];
        $soma += intval($char) * $multiplicador;
      }

      $resto = $soma % 11;
      return $resto < 2 ? 0 : 11 - $resto;
    }

    $banco = '001';
    $moeda = '9';
    $fatorVencimento = (strtotime($dataVencimento) - strtotime('1997-10-07')) / (60 * 60 * 24);
    $fatorVencimento = str_pad($fatorVencimento, 4, '0', STR_PAD_LEFT);
    $valor = str_pad(number_format($valor, 2, '', ''), 10, '0', STR_PAD_LEFT);
    $campoLivre = str_pad($bancoCedente, 4, '0', STR_PAD_LEFT) . modulo11($agenciaCedente) . substr($contaCedente, 0, 8) . modulo11(substr($contaCedente, 0, 8)) . substr($contaCedente, 8) . modulo11(substr($contaCedente, 8)) . str_pad($nossoNumero, 13, '0', STR_PAD_LEFT);

    $codigoBarras = $banco . $moeda . $fatorVencimento . $valor . $campoLivre . modulo11($banco . $moeda . $fatorVencimento . $valor . $campoLivre);

    echo json_encode(['success' => true]);
    return $codigoBarras;
  } else {
    echo json_encode(['success' => false, 'message' => 'Erro ao obter dados do usuário']);
  }
}

function GerandoBoleto($userId)
{
  $codigoBarras = "00199548000025998746373567892000001234567896";

  $html = '
      
  
      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
              <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                  <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                      <div class="sm:flex sm:items-start">
  
                          <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Boleto
                                  gerado</h3>
                              <h4>Codigo: ' . $codigoBarras  . '</h4>
                              <h3 class="text-base font-semibold leading-6 text-gray-900">Clique em continuar e você será redirecionado a pagina inicial.</h3>
                          </div>
                      </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                  <script type="module" src="controller/script/Finalizacao.js"></script>
                  <script type="module" src="../../controller/script/Finalizacao.js"></script>              
                  <form id="Confirm" method="post">
                  <input type="hidden" id="id" value="' . $userId . '">
                    <button id="Confirm1" type="submit" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Continuar</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  
      ';
  echo $html;
}

function FinalizandoCompra()
{

  $userId = $_POST['id'];

  global $conn;
  $conn = connection();

  $sql = 'DELETE FROM pedidos WHERE usuario_id = ?';
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    die("Erro ao preparar a declaração: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "s", $userId);

  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Falha ao apagar o pedido']);
  }
}
