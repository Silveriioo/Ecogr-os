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
    <script type="module" src="../../controller/script/functions/functions.js"></script>
    <title>EcoGrão</title>
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

                    <div class="mt-2">
                        <div class="border-b border-gray-200">
                            <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                                <button id="buttonMenuMobile1" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">
                                    Women
                                </button>
                                <button id="buttonMenuMobile2" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">
                                    Men
                                </button>
                            </div>
                        </div>

                        <div id="MenuMobile1" class="space-y-10 px-4 pb-8 pt-10 hidden" aria-labelledby="buttonMenuMobile1" role="tabpanel" tabindex="0">
                            <div class="grid grid-cols-2 gap-x-4">
                                <div class="group relative text-sm">
                                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center" />
                                    </div>
                                    <a href="#" class="mt-6 block font-medium text-gray-900">
                                        <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                        New Arrivals
                                    </a>
                                    <p aria-hidden="true" class="mt-1">Shop now</p>
                                </div>
                                <div class="group relative text-sm">
                                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-cover object-center" />
                                    </div>
                                    <a href="#" class="mt-6 block font-medium text-gray-900">
                                        <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                        Basic Tees
                                    </a>
                                    <p aria-hidden="true" class="mt-1">Shop now</p>
                                </div>
                            </div>
                            <div>
                                <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">
                                    Clothing
                                </p>
                                <ul role="list" aria-labelledby="women-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Dresses</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Denim</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p id="women-accessories-heading-mobile" class="font-medium text-gray-900">
                                    Accessories
                                </p>
                                <ul role="list" aria-labelledby="women-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p id="women-brands-heading-mobile" class="font-medium text-gray-900">
                                    Brands
                                </p>
                                <ul role="list" aria-labelledby="women-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Significant Other</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="MenuMobile2" class="space-y-10 px-4 pb-8 pt-10 hidden" aria-labelledby="buttonMenuMobile2" role="tabpanel" tabindex="0">
                            <div class="grid grid-cols-2 gap-x-4">
                                <div class="group relative text-sm">
                                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-cover object-center" />
                                    </div>
                                    <a href="#" class="mt-6 block font-medium text-gray-900">
                                        <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                        New Arrivals
                                    </a>
                                    <p aria-hidden="true" class="mt-1">Shop now</p>
                                </div>
                                <div class="group relative text-sm">
                                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="object-cover object-center" />
                                    </div>
                                    <a href="#" class="mt-6 block font-medium text-gray-900">
                                        <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                        Artwork Tees
                                    </a>
                                    <p aria-hidden="true" class="mt-1">Shop now</p>
                                </div>
                            </div>
                            <div>
                                <p id="men-clothing-heading-mobile" class="font-medium text-gray-900">
                                    Clothing
                                </p>
                                <ul role="list" aria-labelledby="men-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p id="men-accessories-heading-mobile" class="font-medium text-gray-900">
                                    Accessories
                                </p>
                                <ul role="list" aria-labelledby="men-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p id="men-brands-heading-mobile" class="font-medium text-gray-900">
                                    Brands
                                </p>
                                <ul role="list" aria-labelledby="men-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                                    </li>
                                    <li class="flow-root">
                                        <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
                        <button type="button" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden" id="buttonOpenMenu">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                        <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                            <div class="flex h-full space-x-8 p-6">
                                <button id="backPage" onclick="backPage()">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                </svg>
                                </button>
                            </div>
                        </div>


                        <?php
                        if ($logado == true) {
                        ?>
                            <div class="ml-auto flex items-center">
                                <div class="flex -space-x-2 overflow-hidden">
                                    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white " src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </div>
                            <?php
                        }
                            ?>
                            </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <!-- NavBar -->

    <!-- CONTEUDO -->
    <div class="p-12 w-full h-full flex justify-center items-center ">
        <form>
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Seu Perfil</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Essas informações serão exibidas somente para fins de pagamento e entrega.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Nome de usuário</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">ecograos.com/</span>
                                    <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Nome de Usuário">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Sobre<span class="text-xs select-none items-center pl-3 text-gray-500 ">(Opcional)</span></label>

                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Escreva algo importante para que seja util.</p>
                        </div>

                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                </svg>
                                <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Carregar</button>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Foto de capa</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Enviar um arquivo</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">ou arraste e solte</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF de até 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Informações pessoais</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use um endereço permanente onde você possa receber notificações e acompanhar seus pedidos.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Primeiro nome</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Sobrenome</label>
                            <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Endereço de email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="celular" class="block text-sm font-medium leading-6 text-gray-900">Número de celular</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">DDD</span>
                                    <input type="tel" name="celular" id="celular" autocomplete="celular" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="(**) *****-****">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">País</label>
                            <div class="mt-2">
                                <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Brasil</option>
                                    <option>USA</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">endereço da Rua</label>
                            <div class="mt-2">
                                <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Cidade</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Estado / Província</label>
                            <div class="mt-2">
                                <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">CEP / Código Postal</label>
                            <div class="mt-2">
                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Notificações</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Sempre avisaremos você sobre mudanças importantes, mas você escolhe o que mais deseja ouvir.</p>

                    <div class="mt-10 space-y-10">
                        <fieldset>
                            <legend class="text-sm font-semibold leading-6 text-gray-900">Por email</legend>
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="comments" class="font-medium text-gray-900">Comentarios</label>
                                        <p class="text-gray-500">Seja notificado quando alguém postar um comentário em um produto favorito.</p>
                                    </div>
                                </div>
                                <div class="relative flex gap-x-3">
                                    <!-- <div class="flex h-6 items-center">
                         <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                         <div class="text-sm leading-6">
                          <label for="candidates" class="font-medium text-gray-900">Candidates</label>
                          <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                        </div> 
                      </div>-->
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="offers" class="font-medium text-gray-900">Ofertas</label>
                                            <p class="text-gray-500">Seja notificado quando um novo produto ou oferta for anunciado.</p>
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset>
                            <legend class="text-sm font-semibold leading-6 text-gray-900">Notificações via SMS</legend>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Estes são entregues via SMS para o seu celular.</p>
                            <div class="mt-6 space-y-6">
                                <div class="flex items-center gap-x-3">
                                    <input id="push-everything" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Tudo</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="push-email" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">O mesmo que o email</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900">Não enviar por SMS</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </form>
    </div>

    <!-- CONTEUDO -->

</body>

</html>