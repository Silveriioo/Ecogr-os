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
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script type="module" src="controller/script/responsive.js"></script>
  <title>EcoGrão</title>
  <!-- TailwindCss -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="controller/tailwindcss/tailwindcss.js"></script>
  <link rel="stylesheet" href="view/styles/tailwindcss.css" />
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
              <a href="view/pages/conta" class="-m-2 block p-2 font-medium text-gray-900">Conta</a>
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
      <p class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
        Obtenha entrega gratuita em pedidos acima de R$100
      </p>

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

            <!-- <div class="ml-4 flex lg:ml-0">
              <a href="#">
                <span class="sr-only">Logo Compania</span>
                <img class="h-8 w-auto" src="" alt="" />
              </a>
            </div> -->

            <div class="hidden lg:ml-8 lg:block lg:self-stretch">
              <div class="flex h-full space-x-8">
                <div class="flex">
                  <div class="relative flex">
                    <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false" id="button1">
                      Women
                    </button>
                  </div>


                  <div class="absolute inset-x-0 top-full text-sm text-gray-500 hidden" id="menu1">
                    <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                    <div class="relative bg-white">
                      <div class="mx-auto max-w-7xl px-8">
                        <div class="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                          <div class="col-start-2 grid grid-cols-2 gap-x-8">
                            <div class="group relative text-base sm:text-sm">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center" />
                              </div>
                              <a href="#" class="mt-6 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                New Arrivals
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative text-base sm:text-sm">
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
                          <div class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                            <div>
                              <p id="Clothing-heading" class="font-medium text-gray-900">
                                Clothing
                              </p>
                              <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Tops</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Dresses</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Pants</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Denim</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Sweaters</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">T-Shirts</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Jackets</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Activewear</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Browse All</a>
                                </li>
                              </ul>
                            </div>
                            <div>
                              <p id="Accessories-heading" class="font-medium text-gray-900">
                                Accessories
                              </p>
                              <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Watches</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Wallets</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Bags</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Sunglasses</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Hats</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Belts</a>
                                </li>
                              </ul>
                            </div>
                            <div>
                              <p id="Brands-heading" class="font-medium text-gray-900">
                                Brands
                              </p>
                              <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Full Nelson</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">My Way</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Re-Arranged</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Counterfeit</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Significant Other</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex">
                  <div class="relative flex">
                    <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false" id="button2">
                      Men
                    </button>
                  </div>


                  <div class="absolute inset-x-0 top-full text-sm text-gray-500 hidden" id="menu2">
                    <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                    <div class="relative bg-white">
                      <div class="mx-auto max-w-7xl px-8">
                        <div class="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                          <div class="col-start-2 grid grid-cols-2 gap-x-8">
                            <div class="group relative text-base sm:text-sm">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-cover object-center" />
                              </div>
                              <a href="#" class="mt-6 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                New Arrivals
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative text-base sm:text-sm">
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
                          <div class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                            <div>
                              <p id="Clothing-heading" class="font-medium text-gray-900">
                                Clothing
                              </p>
                              <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Tops</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Pants</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Sweaters</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">T-Shirts</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Jackets</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Activewear</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Browse All</a>
                                </li>
                              </ul>
                            </div>
                            <div>
                              <p id="Accessories-heading" class="font-medium text-gray-900">
                                Accessories
                              </p>
                              <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Watches</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Wallets</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Bags</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Sunglasses</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Hats</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Belts</a>
                                </li>
                              </ul>
                            </div>
                            <div>
                              <p id="Brands-heading" class="font-medium text-gray-900">
                                Brands
                              </p>
                              <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Re-Arranged</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Counterfeit</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Full Nelson</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">My Way</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <a href="view/pages/conta" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Conta</a>
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

              <?php
              if ($logado == false) {
              ?>
                <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                  <button id="buttonLoginModal2"><a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Entrar</a></button>

                  <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                  <button id="buttonRegModal2"><a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Criar uma conta</a></button>
                </div>
              <?php
              }
              ?>

              <div class="ml-4 flow-root lg:ml-6">
                <button id="buttonOpenMenuCarrinho">
                  <a href="#" class="group -m-2 flex items-center p-2">
                    <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                    <span class="sr-only">items in cart, view bag</span>
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
                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                      <li class="flex py-6">
                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                          <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center" />
                        </div>

                        <div class="ml-4 flex flex-1 flex-col">
                          <div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                              <h3>
                                <a href="#">Nome</a>
                              </h3>
                              <p class="ml-4">Valor</p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Marca</p>
                          </div>
                          <div class="flex flex-1 items-end justify-between text-sm">
                            <p class="text-gray-500">Quantidade</p>

                            <div class="flex">
                              <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Remover
                              </button>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-900">
                  <p>Valor Total</p>
                  <p>Valor</p>
                </div>
                <p class="mt-0.5 text-sm text-gray-500">
                  Frete e impostos calculados na finalização da compra.
                </p>
                <p class="mt-0.5 text-sm text-gray-500">
                  Valor acima de R$100 frete adicionado gratuitamente.
                </p>
                <div class="mt-6">
                  <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Confirmar</a>
                </div>
                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                  <p>
                    ou
                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
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
  <!-- SideBar -->

  <section>
    <!-- Conteudo -->
    <div class="bg-gray-100">
      <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
        <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
          <div class="sm:max-w-lg">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
              Cultive um Futuro Sustentável
            </h1>
            <p class="mt-4 text-xl text-gray-500">
              Descubra nossas Sementes e Alimentos Ecológicos
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Conteudo -->

    <hr class="w-full h-0.5" />

    <!-- Produtos -->
    <div class="bg-white">
      <div>

        <div id="menuLateral" class="relative z-40 lg:hidden hidden" role="dialog" aria-modal="true">

          <div class="fixed inset-0 bg-black bg-opacity-25"></div>

          <div class="fixed inset-0 z-40 flex">

            <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
              <div class="flex items-center justify-between px-4">
                <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                <button id="closeMenuLateral" type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                  <span class="sr-only">Close menu</span>
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>


            </div>
          </div>
        </div>

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900">Novidades</h1>

            <div class="flex items-center">
              <div class="relative inline-block text-left ">
                <div class="flex ">
                  <div class="">
                    <button id="buttonMenuFiltro" type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" aria-expanded="false" aria-haspopup="true">
                      Filtro
                      <svg id="setaFechada" class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512" class="">
                        <path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                      </svg>
                      <svg id="setaAberto" class="rotate-180 -mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500 hidden" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                        <path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                      </svg>
                    </button>
                    <button id="buttonMenuLateral" type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                      <span class="sr-only">Filters</span>
                      <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
                      </svg>
                    </button>
                  </div>

                </div>

                <div id="menuFiltro" class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                  <div class="py-1" role="none">
                    <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>
                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</a>
                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Newest</a>
                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</a>
                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</a>
                  </div>
                </div>
              </div>



            </div>
          </div>

          <section aria-labelledby="products-heading" class="pb-24 pt-6">
            <h2 id="products-heading" class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-3">
              <!-- Lista de Produto -->
              <div class="lg:col-span-3">
                <div class="bg-white">
                  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                      <?php
                      include_once("./controller/utils/functions/funtions.php");
                      ListaProdutos();
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>
    <!-- Produtos -->
  </section>

  <!-- ModalLogin -->
  <div class="relative z-10 hidden" id="modalLogin" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <?php
          include_once('./controller/utils/functions/funtions.php');

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