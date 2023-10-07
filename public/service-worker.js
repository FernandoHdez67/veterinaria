if (!self.define) {
    let e,
        s = {};
    const r = (r, i) => (
        (r = new URL(r + ".js", i).href),
        s[r] ||
            new Promise((s) => {
                if ("document" in self) {
                    const e = document.createElement("script");
                    (e.src = r), (e.onload = s), document.head.appendChild(e);
                } else (e = r), importScripts(r), s();
            }).then(() => {
                let e = s[r];
                if (!e)
                    throw new Error(`Module ${r} didn’t register its module`);
                return e;
            })
    );
    self.define = (i, a) => {
        const o =
            e ||
            ("document" in self ? document.currentScript.src : "") ||
            location.href;
        if (s[o]) return;
        let c = {};
        const d = (e) => r(e, o),
            b = { module: { uri: o }, exports: c, require: d };
        s[o] = Promise.all(i.map((e) => b[e] || d(e))).then(
            (e) => (a(...e), c)
        );
    };
}
define(["./workbox-1210ea81"], function (e) {
    "use strict";
    self.addEventListener("message", (e) => {
        e.data && "SKIP_WAITING" === e.data.type && self.skipWaiting();
    }),
        e.precacheAndRoute(
            [
                {
                    url: "build/assets/app-328dfbad.js",
                    revision: "946089eb02ca45c5d24a92f0c620ee98",
                },
                {
                    url: "build/assets/app-6246d51b.css",
                    revision: "aed887334382116c57aca7d20dcf840a",
                },
                {
                    url: "build/assets/ApplicationLogo-0c62e0e0.js",
                    revision: "35867116acdeb478daa3050865e4c2cd",
                },
                {
                    url: "build/assets/AuthenticatedLayout-e52ea646.js",
                    revision: "9614f356c284ac88da99d4c40714b4c9",
                },
                {
                    url: "build/assets/ConfirmPassword-d35eda57.js",
                    revision: "02d75f805c0ece4d03fea90eaf76affa",
                },
                {
                    url: "build/assets/Dashboard-7c8911d3.js",
                    revision: "2159a174dbe1f6c4f0889b9395416f57",
                },
                {
                    url: "build/assets/DeleteUserForm-1c039553.js",
                    revision: "f4d13195c780f9708e51b67278323784",
                },
                {
                    url: "build/assets/Edit-4ab7fd17.js",
                    revision: "a4bf982e20a5cf4ea83b0e59c1c50470",
                },
                {
                    url: "build/assets/ForgotPassword-755e02aa.js",
                    revision: "e4491e316e30f3741bb34c8cf42a2430",
                },
                {
                    url: "build/assets/GuestLayout-6fabbfc6.js",
                    revision: "489f08fd204471cfd43f621057fe4169",
                },
                {
                    url: "build/assets/InputLabel-3366b71c.js",
                    revision: "dfd68c51f1927dbe19ef9f43ba12190e",
                },
                {
                    url: "build/assets/Login-01b6a167.js",
                    revision: "5e909eb232bb9b7862b6f4cc0d82a714",
                },
                {
                    url: "build/assets/PrimaryButton-98c0aa69.js",
                    revision: "fd02efbca7a1e8f10724b2ee084554a4",
                },
                {
                    url: "build/assets/Register-fd1e8eeb.js",
                    revision: "4f59feec6e589822a8e4831187f30c98",
                },
                {
                    url: "build/assets/ResetPassword-e65b4e58.js",
                    revision: "81af9ca27d3b4c2b567096200e1011ac",
                },
                {
                    url: "build/assets/TextInput-96d6c06f.js",
                    revision: "eafd404f6e802b152a6f95e520f5d5b5",
                },
                {
                    url: "build/assets/transition-589f0d65.js",
                    revision: "d16b611741656fe33a9720cd1c5672c6",
                },
                {
                    url: "build/assets/UpdatePasswordForm-6e1c8a86.js",
                    revision: "1cdf4af295267ae5067dee6f064096cc",
                },
                {
                    url: "build/assets/UpdateProfileInformationForm-fba9ee00.js",
                    revision: "8201ef49ddaa91f90475121e113da6a1",
                },
                {
                    url: "build/assets/VerifyEmail-d8299c92.js",
                    revision: "d0cd2edc9f59f2545a7a391d2529f105",
                },
                {
                    url: "build/assets/Welcome-14bf6e8d.js",
                    revision: "0b025b07bf706ef199adfdd204215805",
                },
                {
                    url: "css/bootstrap-grid.css",
                    revision: "353d47f44f831533360e29397cf0ad57",
                },
                {
                    url: "css/bootstrap-grid.min.css",
                    revision: "0f7dcb635caf79597a3346faa5a5029c",
                },
                {
                    url: "css/bootstrap-grid.rtl.css",
                    revision: "3c6f9bb1adeab2a300c2d71f4752b84f",
                },
                {
                    url: "css/bootstrap-grid.rtl.min.css",
                    revision: "72f5efa75d656c348a0fc10e89fb054f",
                },
                {
                    url: "css/bootstrap-reboot.css",
                    revision: "17a27d62460f94f2787a8c8736bc54a9",
                },
                {
                    url: "css/bootstrap-reboot.min.css",
                    revision: "b1f132471dd1294dce58f310c4c90241",
                },
                {
                    url: "css/bootstrap-reboot.rtl.css",
                    revision: "41ea3a7eb3c1e98f030a1835d036425d",
                },
                {
                    url: "css/bootstrap-reboot.rtl.min.css",
                    revision: "9425f0359384c71212d8abd81c46001c",
                },
                {
                    url: "css/bootstrap-utilities.css",
                    revision: "bb3336c5ad3cd39873e8e684ceb6cc1b",
                },
                {
                    url: "css/bootstrap-utilities.min.css",
                    revision: "a51dffd37621837a307e3456f41c8783",
                },
                {
                    url: "css/bootstrap-utilities.rtl.css",
                    revision: "c24c942e939a322e941e8753648a6e24",
                },
                {
                    url: "css/bootstrap-utilities.rtl.min.css",
                    revision: "9214d46724f8f55de7a49399c432a20c",
                },
                {
                    url: "css/bootstrap.css",
                    revision: "f653159976ec335ae5a24156e83ad7a3",
                },
                {
                    url: "css/bootstrap.min.css",
                    revision: "895f70da94cefec79348d8aaa9649cd2",
                },
                {
                    url: "css/bootstrap.rtl.css",
                    revision: "5c7731ca3b2d4eeba44be1d57028916e",
                },
                {
                    url: "css/bootstrap.rtl.min.css",
                    revision: "a7b6b023ae1a107b0e2f56c59ead2062",
                },
                {
                    url: "fullcalendar/locale/es.js",
                    revision: "75c78464904dba416229f6da2630d941",
                },
                {
                    url: "hover/demo-page.css",
                    revision: "72ebe69ed031efa6e75f046661ff9fa9",
                },
                {
                    url: "hover/hover-min.css",
                    revision: "18dbda57a1625af63301fe76d6ca382d",
                },
                {
                    url: "hover/hover.css",
                    revision: "80dfcc8806147a9ccc9d7556caf72d56",
                },
                {
                    url: "images/icons/icon-128x128.png",
                    revision: "6450ddadc1a82e3be0d6fa12fdc25740",
                },
                {
                    url: "images/icons/icon-144x144.png",
                    revision: "f16a682d388c59fb7f62933a9271cfb8",
                },
                {
                    url: "images/icons/icon-152x152.png",
                    revision: "f73b8ada4a3a0e801826531884b728c2",
                },
                {
                    url: "images/icons/icon-192x192.png",
                    revision: "c55a2749cf6e9837e4be5e735caca3df",
                },
                {
                    url: "images/icons/icon-384x384.png",
                    revision: "3b5d80ffba2bea66eb99d55ccd74b08c",
                },
                {
                    url: "images/icons/icon-512x512.png",
                    revision: "74f1c7477464fd4b0fa8b876845e2746",
                },
                {
                    url: "images/icons/icon-72x72.png",
                    revision: "3a55c81e57ea2bb8354d5150a72bfee6",
                },
                {
                    url: "images/icons/icon-96x96.png",
                    revision: "eaece47e5d521cc34220cb58ef309d71",
                },
                {
                    url: "images/icons/splash-1125x2436.png",
                    revision: "892e4f31ca475a731d55618802991380",
                },
                {
                    url: "images/icons/splash-1242x2208.png",
                    revision: "0869b6409db6c2fb1e0c151bf0e1c073",
                },
                {
                    url: "images/icons/splash-1242x2688.png",
                    revision: "14c6c012f0f598a63ce5111a2ca898d7",
                },
                {
                    url: "images/icons/splash-1536x2048.png",
                    revision: "b13e5bd6900ba89a580b93bff5f5de4a",
                },
                {
                    url: "images/icons/splash-1668x2224.png",
                    revision: "fba6def5f246caa5e4032f33f6536134",
                },
                {
                    url: "images/icons/splash-1668x2388.png",
                    revision: "15b132a9183b1be156c62de225b04574",
                },
                {
                    url: "images/icons/splash-2048x2732.png",
                    revision: "f255ecc62f63d63c648e1170a7b3e619",
                },
                {
                    url: "images/icons/splash-640x1136.png",
                    revision: "6037a71c634fe19767e7f224404298af",
                },
                {
                    url: "images/icons/splash-750x1334.png",
                    revision: "a398f4f8224f69822eb14676ac7b9bde",
                },
                {
                    url: "images/icons/splash-828x1792.png",
                    revision: "510685667bfb8b504eb6312fa035d3d3",
                },
                {
                    url: "img/carrito.png",
                    revision: "6e86cedb67940f5b26c5e56f01c3537f",
                },
                {
                    url: "img/carrito2.png",
                    revision: "0f56d44d8b57356d2ffbf2a7841a89bf",
                },
                {
                    url: "img/eye.png",
                    revision: "5d21d71d8dd67161fb90bfbddfad3aa5",
                },
                {
                    url: "img/imagen1.jpg",
                    revision: "1a09e3a87877c1da4cb8cb4cbccf5f66",
                },
                {
                    url: "img/imagen2.jpg",
                    revision: "b5b6c356ae8eee7a771d93c50810a462",
                },
                {
                    url: "img/imagen3.jpg",
                    revision: "28b4ba8a0550b562edaf6fb0bd217da8",
                },
                {
                    url: "img/imagen4.jpg",
                    revision: "271525e0003adcafb77ceb579e36c40a",
                },
                {
                    url: "img/logocach.jpg",
                    revision: "ac80a107c70de4b4c4040efb5faf9889",
                },
                {
                    url: "img/logocirculo.png",
                    revision: "a267e7a62e381bc435dfcdcbc187a6ba",
                },
                {
                    url: "img/perrito.jpg",
                    revision: "f4150158f3afdd5bc98395604d7dd1b0",
                },
                {
                    url: "img/perro.jpg",
                    revision: "d7360ed3b056244eea1bf38dda0eb354",
                },
                {
                    url: "img/plus-solid.svg",
                    revision: "7e95d89fe752d6b5dabe23fab87f236d",
                },
                {
                    url: "img/servidor.png",
                    revision: "16eca372aad5df4170928afe2f98e09b",
                },
                {
                    url: "img/user.png",
                    revision: "c3631c652abe1185b1874da24af0b7c7",
                },
                {
                    url: "imgcarrucel/6457cfb263ffe.png",
                    revision: "2d9d1993c10fa8448f18ad211b8569a4",
                },
                {
                    url: "imgcarrucel/64580a9c3ed0a.png",
                    revision: "07a10e01438ce2fd763460f6b0ffe6cd",
                },
                {
                    url: "imgcarrucel/64580ae781d94.png",
                    revision: "d793d32d8bf67e71218f50ad8a0b231c",
                },
                {
                    url: "imgcarrucel/64580b06c4ef2.png",
                    revision: "7d8bc4b6e57281cea73e776c3756a960",
                },
                {
                    url: "imgconfig/1679903463.jpg",
                    revision: "ac80a107c70de4b4c4040efb5faf9889",
                },
                {
                    url: "imgconfig/logo.jpg",
                    revision: "ac80a107c70de4b4c4040efb5faf9889",
                },
                {
                    url: "imgproductos/1679768686.jpg",
                    revision: "fd94b493d48114cb7fbd96352ecaea96",
                },
                {
                    url: "imgproductos/1680840224.jpg",
                    revision: "776956fb50bfb88b154e9554efcda9e9",
                },
                {
                    url: "imgproductos/641f40eef2981.jpg",
                    revision: "40a93ec7535edc81d44aadea43f23cf1",
                },
                {
                    url: "imgproductos/641f496a9effd.jpg",
                    revision: "8becede751275159d695313bb02d0931",
                },
                {
                    url: "imgproductos/64309b8a51c85.jpg",
                    revision: "1007caff11567bc8a1078a2742e3c46e",
                },
                {
                    url: "imgproductos/64309be523171.jpg",
                    revision: "1007caff11567bc8a1078a2742e3c46e",
                },
                {
                    url: "imgproductos/64309c4d814d2.jpg",
                    revision: "1007caff11567bc8a1078a2742e3c46e",
                },
                {
                    url: "imgproductos/6430ad70b420e.jpg",
                    revision: "3dd93b1987d1545e93aa2ba5cb369b73",
                },
                {
                    url: "imgproductos/643656098a08c.jpg",
                    revision: "4a64a888181f3ad8f6300d9e73afe84c",
                },
                {
                    url: "imgproductos/643657fd0b7b5.jpg",
                    revision: "8e996aa1a3746d106ebd5f5b82833e42",
                },
                {
                    url: "imgproductos/6458665c8220b.jpg",
                    revision: "c87c3daf93e0d624def27325c9283308",
                },
                {
                    url: "imgproductos/64586952506e4.jpg",
                    revision: "c87c3daf93e0d624def27325c9283308",
                },
                {
                    url: "imgproductos/antipulgas.jpg",
                    revision: "f9ce42653b846cad702193094aa44b10",
                },
                {
                    url: "imgproductos/boyo-y-gato.png",
                    revision: "d8c7f09b3ddfe1f555abfbc2c89086aa",
                },
                {
                    url: "imgproductos/collar.jpg",
                    revision: "c2f35a556c1dd7a288158ea4188dd397",
                },
                {
                    url: "imgproductos/croqueta.jpg",
                    revision: "713d88cab0b8b483fbec6b53a29851a3",
                },
                {
                    url: "imgproductos/hotel-perros-gatos.png",
                    revision: "bebd3e35f257fb21bca04435f2be7f08",
                },
                {
                    url: "imgproductos/jarabe.jpg",
                    revision: "4db96c5626358d38ed91f1c4f0a6602c",
                },
                {
                    url: "imgproductos/llavero.jpg",
                    revision: "16e7a1e839ce1c7049f5e23458fe4987",
                },
                {
                    url: "imgproductos/shampoo.jpg",
                    revision: "35cbd08000170bff93e944549fd43497",
                },
                {
                    url: "imgproductos/vitamina.jpg",
                    revision: "c87c3daf93e0d624def27325c9283308",
                },
                {
                    url: "imgservicios/1679862527.png",
                    revision: "d8c7f09b3ddfe1f555abfbc2c89086aa",
                },
                {
                    url: "imgservicios/1681510720.jpg",
                    revision: "637bb23d8db591a08a3b5a6499faf47d",
                },
                {
                    url: "imgservicios/642075edcabaa.jpg",
                    revision: "8becede751275159d695313bb02d0931",
                },
                {
                    url: "imgservicios/6439cf730f3dc.jpg",
                    revision: "446b65e2a75b306be5ff9b78ff9e6e7c",
                },
                {
                    url: "imgservicios/6439d08bce8f6.jpg",
                    revision: "2e3d987b7b38d609042fb02f4b3f4689",
                },
                {
                    url: "imgservicios/cirugia.jpg",
                    revision: "13f5857471e10bfb61fc160b632b8917",
                },
                {
                    url: "imgservicios/estetica.jpg",
                    revision: "60b168805245ef349d3d9239d0105ed5",
                },
                {
                    url: "imgservicios/ultrasonido.jpg",
                    revision: "0b607a90c9acf32280ee3693e2edd0c8",
                },
                {
                    url: "js/ajax.js",
                    revision: "9c5b17833cb6b581ce22251ec2796ab7",
                },
                {
                    url: "js/archivo.js",
                    revision: "fbbe1251ba88617c031aec80482e9da8",
                },
                {
                    url: "js/bootstrap.bundle.js",
                    revision: "045b9581fdbe133d3b7e252b067e22e2",
                },
                {
                    url: "js/bootstrap.bundle.min.js",
                    revision: "189f332ecdd3d42e781939666518e92f",
                },
                {
                    url: "js/bootstrap.esm.js",
                    revision: "4ca9b48a13d9457aaa1e002f9ce779d5",
                },
                {
                    url: "js/bootstrap.esm.min.js",
                    revision: "9315b8d450880a7a55425e256d29ed86",
                },
                {
                    url: "js/bootstrap.js",
                    revision: "ac710063a8fe2b31b94392acdb2a6b82",
                },
                {
                    url: "js/bootstrap.min.js",
                    revision: "c44ec562e9a9f1e839ea004ad4ec517d",
                },
                {
                    url: "js/desactivarclickderecho.js",
                    revision: "8c518d2b755967c92a9c705a4b3d7320",
                },
                {
                    url: "js/GoogleMaps/googlemaps.js",
                    revision: "0a98b56d47dc2ea8312086704399f6de",
                },
                {
                    url: "mystyle/googlemaps.css",
                    revision: "2752fb7bb6c9673e9cb9655bac7e1635",
                },
                {
                    url: "mystyle/mystyle.css",
                    revision: "5ebc348a95d1b1e1d5dcaa5a1cbc7180",
                },
                {
                    url: "serviceworker.js",
                    revision: "826473f1bc35429a94ed647b97f6df72",
                },
                {
                    url: "vendor/adminlte/dist/css/adminlte.css",
                    revision: "8d2c08a8f4526421a4704eb7923fb011",
                },
                {
                    url: "vendor/adminlte/dist/css/adminlte.min.css",
                    revision: "dc9c43b0809cb8607d6e9e38817be283",
                },
                {
                    url: "vendor/adminlte/dist/img/AdminLTELogo.png",
                    revision: "a267e7a62e381bc435dfcdcbc187a6ba",
                },
                {
                    url: "vendor/adminlte/dist/js/adminlte.js",
                    revision: "6068b9dc433107eb750810d7360882d7",
                },
                {
                    url: "vendor/adminlte/dist/js/adminlte.min.js",
                    revision: "e1a669d78fa247cf7f6b04626238f263",
                },
                {
                    url: "vendor/bootstrap/js/bootstrap.bundle.js",
                    revision: "fe6571c219658ce30cea2f1d321c730c",
                },
                {
                    url: "vendor/bootstrap/js/bootstrap.bundle.min.js",
                    revision: "ea04eabe4060fed0265c1519c764f41e",
                },
                {
                    url: "vendor/bootstrap/js/bootstrap.js",
                    revision: "04801c92d5b03fdf9a9d00f1b50957f7",
                },
                {
                    url: "vendor/bootstrap/js/bootstrap.min.js",
                    revision: "55d39b6bff845a12b1f838acb73c444c",
                },
                {
                    url: "vendor/fontawesome-free/css/all.css",
                    revision: "fdfed703d289b9aaaa26704982ce4839",
                },
                {
                    url: "vendor/fontawesome-free/css/all.min.css",
                    revision: "3720bbee0ca1964cbaed0258264f680c",
                },
                {
                    url: "vendor/fontawesome-free/css/brands.css",
                    revision: "92cb74129e1ae679d4f3466ea2dd3dbe",
                },
                {
                    url: "vendor/fontawesome-free/css/brands.min.css",
                    revision: "f5b21b08065d91971c3797a8734f2287",
                },
                {
                    url: "vendor/fontawesome-free/css/fontawesome.css",
                    revision: "0d32adb6dbc0eeb96dd993331cefd9c0",
                },
                {
                    url: "vendor/fontawesome-free/css/fontawesome.min.css",
                    revision: "830201cda42feed64ecaa68a79504f0f",
                },
                {
                    url: "vendor/fontawesome-free/css/regular.css",
                    revision: "3591624c760296e570ee9c26679639be",
                },
                {
                    url: "vendor/fontawesome-free/css/regular.min.css",
                    revision: "ed1c99bf57b4f8c8087c8a119424ea6e",
                },
                {
                    url: "vendor/fontawesome-free/css/solid.css",
                    revision: "8916341f7cbf0eaf19fe68ebf6f16ec9",
                },
                {
                    url: "vendor/fontawesome-free/css/solid.min.css",
                    revision: "b0eaa658c29f2ff5cd6b9a7cfc509e37",
                },
                {
                    url: "vendor/fontawesome-free/css/svg-with-js.css",
                    revision: "fa88ed65185bd7eb9f297d68b3a613c5",
                },
                {
                    url: "vendor/fontawesome-free/css/svg-with-js.min.css",
                    revision: "d649efffc2e150e486843355b21faced",
                },
                {
                    url: "vendor/fontawesome-free/css/v4-shims.css",
                    revision: "de0407e9f43d9032f73d8f4ee12da95e",
                },
                {
                    url: "vendor/fontawesome-free/css/v4-shims.min.css",
                    revision: "eee78d5db46bd4731a549a66ed48e484",
                },
                {
                    url: "vendor/fontawesome-free/webfonts/fa-brands-400.svg",
                    revision: "0c12ff655da379ab518f8afe0b3ffe15",
                },
                {
                    url: "vendor/fontawesome-free/webfonts/fa-regular-400.svg",
                    revision: "7b18e1bf54898a45b78a1a36806a4bc8",
                },
                {
                    url: "vendor/fontawesome-free/webfonts/fa-solid-900.svg",
                    revision: "b45a634efe8a9e0a3938a86c5e216417",
                },
                {
                    url: "vendor/jquery/jquery.js",
                    revision: "8a750b5e10f34fe9be3d2b152dd12aa4",
                },
                {
                    url: "vendor/jquery/jquery.min.js",
                    revision: "0732e3eabbf8aa7ce7f69eedbd07dfdd",
                },
                {
                    url: "vendor/overlayScrollbars/css/OverlayScrollbars.css",
                    revision: "528ac126f313b4307a18dc20485fd7a8",
                },
                {
                    url: "vendor/overlayScrollbars/css/OverlayScrollbars.min.css",
                    revision: "84d2d24e7ca3b710cd48145b0099da70",
                },
                {
                    url: "vendor/overlayScrollbars/js/jquery.overlayScrollbars.js",
                    revision: "37b57db7870a217effb5543999a958c6",
                },
                {
                    url: "vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
                    revision: "bc16ae2b903284c4ceac6125b97a42eb",
                },
                {
                    url: "vendor/overlayScrollbars/js/OverlayScrollbars.js",
                    revision: "1d7aee9dc2b7f8b8a30d3c00e6a514c6",
                },
                {
                    url: "vendor/overlayScrollbars/js/OverlayScrollbars.min.js",
                    revision: "8589fa62a463e7f80bac354b561b499c",
                },
                {
                    url: "vendor/popper/esm/popper-utils.js",
                    revision: "53a2a827114d665e0f2176ed58b5592f",
                },
                {
                    url: "vendor/popper/esm/popper-utils.min.js",
                    revision: "3a272f95640a683188ca9de2f53c9645",
                },
                {
                    url: "vendor/popper/esm/popper.js",
                    revision: "0037eae019975be4c74716b879cfe29a",
                },
                {
                    url: "vendor/popper/esm/popper.min.js",
                    revision: "70d452caca7d5a79a11abbc477b32d0d",
                },
                {
                    url: "vendor/popper/popper-utils.js",
                    revision: "846b1780e9a1d8fbde360163c6030237",
                },
                {
                    url: "vendor/popper/popper-utils.min.js",
                    revision: "c5e0b705b2e6751e2953f651057df309",
                },
                {
                    url: "vendor/popper/popper.js",
                    revision: "221afb263e2662bbfe961bf847d238c5",
                },
                {
                    url: "vendor/popper/popper.min.js",
                    revision: "436159921fbe7c2fbb290c81504a9b75",
                },
                {
                    url: "vendor/popper/umd/popper-utils.js",
                    revision: "3b53956d4e2911d6cb9d1d7ac57724ae",
                },
                {
                    url: "vendor/popper/umd/popper-utils.min.js",
                    revision: "a614977b4a10a8a8323165e9ccf4d612",
                },
                {
                    url: "vendor/popper/umd/popper.js",
                    revision: "701c1c4a6731e30b7b41a6425f4fc35a",
                },
                {
                    url: "vendor/popper/umd/popper.min.js",
                    revision: "0dd1c14014c608e71a095403f77bb633",
                },
            ],
            {}
        ),
        e.registerRoute(/\.(?:png|jpg|jpeg|svg)$/, new e.CacheFirst(), "GET"),
        e.registerRoute(/\.(?:css|js)$/, new e.StaleWhileRevalidate(), "GET");
});
//# sourceMappingURL=service-worker.js.map