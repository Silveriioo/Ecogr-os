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
    BuscaUsuarios($userId);
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
    <!-- TailwindCss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../controller/tailwindcss/tailwindcss.js"></script>
    <link rel="stylesheet" href="../styles/tailwindcss.css" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- <script type="module" src="../../controller/script/responsive.js"></script> -->
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
                        <button onclick="backPage()" id="backPage1" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                            </svg>
                        </button>

                        <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                            <div class="flex h-full space-x-8 p-6">
                                <button onclick="backPage()" id="backPage2">
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
                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
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
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nome Completo</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="nome" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Data de Nascimento</label>
                            <div class="mt-2">
                                <input id="date" name="date" type="date" autocomplete="date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="cpf" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                            <div class="mt-2">
                                <input id="cpf" name="cpf" type="text" autocomplete="cpf" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Endereço de Email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="celular" class="block text-sm font-medium leading-6 text-gray-900">Número de Celular</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">DDD</span>
                                    <input type="tel" name="celular" id="celular" autocomplete="celular" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="(**) *****-****">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">País</label>
                            <div class="mt-2">
                                <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Brasil</option>
                                    <option>USA</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Endereço da Rua</label>
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

                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Adicional<span class="text-xs select-none items-center pl-3 text-gray-500 ">(Opcional)</span></label>

                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Escreva algo importante para que seja util.</p>
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

    <script>
        document.getElementById("backPage2").addEventListener("click", function() {
            backPage();
        });

        function backPage() {
            console.error(error);
            window.history.back();
        }
    </script>
</body>

</html>