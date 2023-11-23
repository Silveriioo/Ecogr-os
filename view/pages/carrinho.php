<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userdata = array(
        'id' => $_SESSION['id'],
        'email' => $_SESSION['email']
    );
    $userId = $userdata['id'];
    $userEmail = $userdata['email'];
    $logado = true;

    include_once('../../controller/utils/functions/funtions.php');
    $userinfo = BuscaUsuarios($userEmail);
    if ($userinfo) {
        $nome = $userinfo['nome'];
        $data = $userinfo['data'];
        $cpf = $userinfo['cpf'];
        $email = $userinfo['email'];
        $celular = $userinfo['celular'];
        $rua = $userinfo['rua'];
        $cidade = $userinfo['cidade'];
        $estado = $userinfo['estado'];
        $cep = $userinfo['cep'];
        $adicionais = $userinfo['adicionais'];
    }
} else {
    $logado = false;
} ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="../../controller/script/responsive.js"></script>
    <script type="module" src="../../controller/script/boleto.js"></script>
    <title>EcoGrão</title>
    <!-- TailwindCss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../controller/tailwindcss/tailwindcss.js"></script>
    <link rel="stylesheet" href="../styles/tailwindcss.css" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- NavBar -->
    <div class="bg-white">
        <div class="relative z-40 lg:hidden hidden" id="MenuMobile" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black bg-opacity-25"></div>
        </div>

        <header class="relative bg-white">
            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex h-16 items-center">
                        <button onclick="window.history.back()" id="backPage1"
                            class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                <path
                                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                            </svg>
                        </button>

                        <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                            <div class="flex h-full space-x-8 p-6">
                                <button onclick="window.history.back()" id="backPage2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <path
                                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <!-- NavBar -->

    <section>
        <!-- Conteudo -->
        <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                aria-hidden="true">

            </div>
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Finalização
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Estamos quase la, preencha algumas informações para que possamos dar continuidade.
                </p>
            </div>
        </div>

        <form id="carrinhoBoleto" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <label for="nome" class="block text-sm font-semibold leading-6 text-gray-900">Nome
                        Completo</label>
                    <div class="mt-2.5">
                        <input type="text" name="nome" id="nome" placeholder="Fulano Ciclano"
                            value="<?php echo $nome; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="cpf" class="block text-sm font-semibold leading-6 text-gray-900">CPF</label>
                    <div class="mt-2.5">
                        <input type="text" name="cpf" id="cpf" placeholder="***.***.***-**" value="<?php echo $cpf; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                    <div class="mt-2.5">
                        <input type="email" name="email" id="email" placeholder="email@email.com"
                            value="<?php echo $email; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="celular" class="block text-sm font-semibold leading-6 text-gray-900">Celular</label>
                    <div class="relative mt-2.5">

                        <input type="tel" name="celular" id="celular" placeholder="(**)*****-****"
                            value="<?php echo $celular; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="rua" class="block text-sm font-semibold leading-6 text-gray-900">Rua</label>
                    <div class="mt-2.5">
                        <input type="text" name="rua" id="rua" placeholder="Rua Alberto" value="<?php echo $rua; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="cidade" class="block text-sm font-semibold leading-6 text-gray-900">Cidade</label>
                    <div class="mt-2.5">
                        <input type="text" name="cidade" id="cidade" placeholder="Santa Catarina"
                            value="<?php echo $cidade; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="estado" class="block text-sm font-semibold leading-6 text-gray-900">Estado</label>
                    <div class="mt-2.5">
                        <input type="text" name="estado" id="estado" placeholder="Minas Gerais"
                            value="<?php echo $estado; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="cep" class="block text-sm font-semibold leading-6 text-gray-900">CEP</label>
                    <div class="relative mt-2.5">

                        <input type="text" name="cep" id="cep" placeholder="******-***" value="<?php echo $cep; ?>"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="adicionais"
                        class="block text-sm font-semibold leading-6 text-gray-900">Adicionais</label>
                    <div class="mt-2.5">
                        <textarea name="adicionais" id="adicionais" rows="4"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo $adicionais; ?></textarea>
                    </div>
                </div>
                <div class="flex gap-x-4 sm:col-span-2">
                    <div class="flex h-6 items-center">
                        <input type="checkbox" name="pdp" id="pdp" required>
                    </div>
                    <label class="text-sm leading-6 text-gray-600" id="switch-1-label">
                        Ao selecionar isso, você concorda com nossa
                        <a href="#" class="font-semibold text-indigo-600">política de privacidade</a>.
                    </label>
                </div>
            </div>
            <div class="sm:col-span-2 p-6">
                <label for="adicionais" class="block text-sm font-semibold leading-6 text-gray-900">Carrinho</label>
                <div class="mt-2.5">
                    <textarea readonly name="adicionais" id="adicionais" rows="4"
                        class="block w-full h-96 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo FinalizarCarrinho($userId) ?></textarea>
                </div>
            </div>
            <input type="hidden" id="id" value="<?php echo $userId; ?>">
            <div class="mt-10">
                <button type="submit"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Finalizar
                </button>
            </div>
        </form>
        </div>

        <!-- Conteudo -->

        <!-- Modal -->

        <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
            id="ModelBoleto">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <?php echo GerandoBoleto($userId); ?>
        </div>
        <!-- Modal -->
    </section>

    <!-- Modal -->
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="ModelUser">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Usuario não
                                    encontrado, faça login com sua conta.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button onclick="location.reload();" id="Confirm" type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</body>

</html>