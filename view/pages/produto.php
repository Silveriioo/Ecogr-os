<?php
session_start();

if (isset($_GET['id'])) {
    include_once("../../controller/utils/functions/funtions.php");
    $produtos = Produto();

    if (!empty($produtos)) {
        $produto = $produtos[0];

        $id = $produto["id"];
        $categoria = $produto["categoria"];
        $imagem = $produto["imagens"];
        $descricao = $produto["descricao"];
        $valor = $produto["valor"];
        $nome = $produto["nome"];
        $detalhes = $produto["detalhes"];
    }
}
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userdata = array(
        'id' => $_SESSION['id'],
        'email' => $_SESSION['email']
    );
    $userId = $userdata['id'];
    $userEmail = $userdata['email'];
    $logado = true;
} else {
    $logado = false;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="../../controller/script/responsive.js"></script>
    <script type="module" src="../../controller/script/carrinho.js"></script>
    <title><?php echo $nome ?></title>
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
                    <div class="flex px-4 pb-2 pt-5">
                        <button type="button" class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400" id="buttonCloseMenuMobile">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <?php
                    if ($logado == true) {
                    ?>
                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <a href="./conta" class="-m-2 block p-2 font-medium text-gray-900">Conta</a>
                            </div>
                            <div class="flow-root">
                                <a href="../../controller/utils/logout" class="-m-2 block p-2 font-medium text-gray-900">Sair</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($logado == false) {
                    ?>
                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <button id="buttonLoginModal1">
                                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Entrar</a>
                                </button>
                            </div>
                            <div class="flow-root">
                                <button id="buttonRegModal1">
                                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Criar uma conta</a>
                                </button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <header class="relative bg-white">
            <p class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
                Obtenha entrega gratuita em pedidos acima de R$100
            </p>

            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex justify-between h-16 items-center">
                        <button type="button" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden" id="buttonOpenMenu">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                        <?php
                        if ($logado == true) {
                        ?>
                            <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                                <div class="flex h-full space-x-8">
                                    <a href="./conta" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Conta</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($logado == true) {
                        ?>
                            <div class="ml-auto flex items-center">
                                <div class="relative flex max-lg:hidden">
                                    <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false" id="">
                                        <a href="../../controller/utils/logout" class="-m-2 block p-2 font-medium text-gray-900">Sair</a>
                                    </button>
                                </div>
                            <?php
                        }
                            ?>

                            <?php
                            if ($logado == false) {
                            ?>
                                <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                    <button id="buttonLoginModal2">
                                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Entrar</a>
                                    </button>

                                    <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                    <button id="buttonRegModal2">
                                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Criar uma
                                            conta</a>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="hidden ml-4 flow-root lg:ml-6"></div>
                            <div class="ml-4 flow-root lg:ml-6">
                                <button id="buttonOpenMenuCarrinho">
                                    <a href="#" class="group -m-2 flex items-center p-2">
                                        <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </a>
                                </button>
                            </div>
                            </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <!-- NavBar -->

    <!-- SideBar -->
    <div class="relative z-10 hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" id="MenuCarrinho">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                        Carrinho de compras
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500" id="buttonCloseMenuCarrinho">
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">

                                        <?php
                                        if ($logado == true) {
                                            Carrinho($userId);
                                        } else { ?>
                                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Entre com sua conta para pode dar continuidade.</h3>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Valor Total</p>
                                    <p>
                                        <?php
                                        if ($logado == true) {
                                            echo "R$" . ValorPorUsuario($userId);
                                        } else {
                                        ?>
                                            R$
                                        <?php } ?>
                                    </p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">
                                    Frete e impostos calculados na finalização da compra.
                                </p>
                                <p class="mt-0.5 text-sm text-gray-500">
                                    Valor acima de R$100 frete adicionado gratuitamente.
                                </p>
                                <div class="mt-6">
                                    <a href="./carrinho" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Confirmar</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        ou
                                        <button onclick="$('#MenuCarrinho').hide();" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Continue comprando
                                            <span aria-hidden="true"> &rarr;</span>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="ModelRemove">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Seu produto
                                    foi removido com sucesso.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button onclick="location.reload();" id="Confirm" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- SideBar -->

    <!-- Conteudo -->
    <div class="bg-white">
        <div class="pt-6">
            <nav aria-label="Breadcrumb">
                <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <li>
                        <div class="flex items-center">
                            <a href="../../index" class="mr-2 text-sm font-medium text-gray-900">Home</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <p class="mr-2 text-sm font-medium text-gray-900"><?php echo $nome; ?></p>
                            </svg>
                        </div>
                    </li>


                </ol>
            </nav>
            <!-- Imagem -->
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                </div>
                <div class="flex aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                    <img src="<?php echo $imagem; ?>" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center" />
                </div>
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                </div>
            </div>
        </div>

        <!-- Informaçoes -->
        <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    <?php echo $nome ?>
                </h1>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Informações do Produto</h2>
                <p class="text-3xl tracking-tight text-gray-900">R$<?php echo $valor; ?></p>
                <br>

                <form method="POST" id="CarrinhoForm" class="mt-10">
                    <input type="hidden" name="IDusuario" id="IdUsuario" value="<?php if ($logado === true) {
                                                                                    echo $userId;
                                                                                } ?>">
                    <div>
                        <label for="produto" class="block text-sm font-medium leading-6 text-gray-900">Quantidade</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="number" name="produto" id="produto" min="1" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0">
                        </div>
                    </div>

                    <button type="submit" id="idProduto" value="<?php echo $id; ?>" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Adicionar
                        ao Carrinho</button>

                </form>
            </div>

            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                <!-- Descrição e Detalhes -->
                <div>
                    <h3 class="sr-only">Descrição</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900">
                            <?php echo $descricao; ?>
                        </p>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900">Detalhes</h2>

                    <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">
                            <?php echo $detalhes; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Conteudo -->

    <!-- Modal -->
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="ModelSuccess">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Seu produto
                                    foi adicionado com sucesso.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button onclick="location.reload();" id="Confirm" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="ModelUser">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Usuario não
                                    encontrado, faça login com sua conta.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button onclick="location.reload();" id="Confirm" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="Modelquanti">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Coloque a
                                    quantidade que deseja do profuto.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button onclick="location.reload();" id="Confirm" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="ModelProduto">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Produto não
                                    encontrado, contate o administrador.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button onclick="location.reload();" id="Confirm" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- ModalLogin -->
    <div class="relative z-10 hidden" id="modalLogin" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <?php

                    LoginModal();
                    ?>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">

                        <button type="button" id="buttonCloseModalLogin" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ModalLogin -->

    <!-- ModalReg -->
    <div class="relative z-10 hidden" id="modalReg" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <?php
                    include_once('./controller/utils/functions/funtions.php');

                    RegModal();
                    ?>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">

                        <button type="button" id="buttonCloseModalReg" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ModalReg -->
</body>

</html>