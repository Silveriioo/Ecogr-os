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
    } else {
        echo "<br>Falha na busca por email $userEmail";
    }
} else {
    $logado = false;
    include_once('../../controller/utils/functions/funtions.php');
    RedefineModal();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EcoGrão</title>
    <script type="module" src="../../controller/script/redefineUser.js"></script>
    <!-- TailwindCss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../controller/tailwindcss/tailwindcss.js"></script>
    <link rel="stylesheet" href="../styles/tailwindcss.css" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- NavBar -->
    <div class="bg-white">
        <div class="relative z-40 lg:hidden hidden" id="MenuMobile" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black bg-opacity-25"></div>
            <div class="fixed inset-0 z-40 flex">
                <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">


                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Conta</a>
                        </div>
                    </div>

                    <?php
                    if ($logado == false) {
                    ?>
                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <button id="buttonLoginModal1"><a href="#" class="-m-2 block p-2 font-medium text-gray-900">Entrar</a></button>

                            </div>
                            <div class="flow-root">
                                <button id="buttonRegModal1"><a href="#" class="-m-2 block p-2 font-medium text-gray-900">Criar uma conta</a></button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

        <header class="relative bg-white">


            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex h-16 items-center">
                        <button onclick="window.history.back()" id="backPage1" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                            </svg>
                        </button>

                        <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                            <div class="flex h-full space-x-8 p-6">
                                <button onclick="window.history.back()" id="backPage2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <!-- <?php
                        if ($logado == true) {
                        ?>
                            <div class="ml-auto flex items-center">
                                <div class="flex -space-x-2 overflow-hidden">
                                    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white " src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </div>
                            <?php
                        }
                            ?> -->
                            </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <!-- NavBar -->

    <!-- CONTEUDO -->
    <div class="p-12 w-full h-full flex justify-center items-center ">
        <form method="POST" id="redefinir">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Seu Perfil</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Essas informações serão exibidas somente para fins de pagamento e entrega.</p>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Informações pessoais</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use um endereço permanente onde você possa receber notificações e acompanhar seus pedidos.</p>

                    <input type="hidden" id="id" name="id" value="<?php echo $userId; ?>">

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nome Completo</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="nome" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $nome; ?>">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Data de Nascimento</label>
                            <div class="mt-2">
                                <input id="date" name="date" type="date" autocomplete="date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $data; ?>">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="cpf" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                            <div class="mt-2">
                                <input id="cpf" name="cpf" type="text" autocomplete="cpf" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $cpf; ?>">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Endereço de Email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="celular" class="block text-sm font-medium leading-6 text-gray-900">Número de Celular</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="tel" name="celular" id="celular" autocomplete="celular" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="(**) *****-****" value="<?php echo $celular; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Endereço da Rua</label>
                            <div class="mt-2">
                                <input type="text" name="street-address" id="rua" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $rua; ?>">
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Cidade</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="cidade" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $cidade; ?>">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Estado / Província</label>
                            <div class="mt-2">
                                <input type="text" name="region" id="regiao" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $estado; ?>">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">CEP / Código Postal</label>
                            <div class="mt-2">
                                <input type="text" name="postal-code" id="cep" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $cep; ?>">
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Adicional<span class="text-xs select-none items-center pl-3 text-gray-500 ">(Opcional)</span></label>

                            <div class="mt-2">
                                <textarea id="adicional" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo $adicionais; ?></textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Escreva algo importante para que seja util.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <input type="button" value="Cancelar" class="text-sm font-semibold leading-6 text-gray-900 cursor-pointer" />
                <input type="submit" value="Salvar" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer" />
            </div>
        </form>
    </div>

    <!-- CONTEUDO -->



</html>