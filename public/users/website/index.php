<?php
require "../../../config/koneksi.php";
require "../../users/config/logic-daftar-pengguna.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-slate-700 shadow">
    <div class="mx-auto flex w-12/12 h-screen items-center">
        <div class="basis-1/4 flex justify-end">

            <div class="w-1/2">
                <header>
                    <span
                        class="font-infini text-3xl tracking-tight bg-gradient-to-r from-black to-orange-400 bg-clip-text text-transparent">
                        Infini Roleplay
                    </span>
                </header>
                <nav>
                    <a href="../../users/website/index.php" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                DevOps
                            </span>
                        </div>
                    </a>
                    <a href="#home" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                Home
                            </span>
                        </div>
                    </a>

                    <a href="#about" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                About
                            </span>
                        </div>
                    </a>
                    <a href="#daftar" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                Daftar
                            </span>
                        </div>
                    </a>
                    <a href="#login" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                Login
                            </span>
                        </div>
                    </a>
                </nav>
            </div>
        </div>

        <main
            class="basis-3/4 w-full h-full bg-gradient-to-br from-black via-slate-600 to-orange-300 flex justify-center items-center">
            <div class="halamanUtama  flex flex-col justify-center items-center gap-2 -mt-20">
                <div class="flex gap-2">
                    <div class="group relative">
                        <button onclick="window.location.href = 'https://github.com/AdrianAlfauzan';">
                            <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                fill="none" viewBox="0 0 24 24"
                                class="w-8 hover:scale-125 duration-200 hover:stroke-blue-500">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>
                        </button>
                        <span
                            class="absolute -top-14 left-[50%] -translate-x-[50%] z-20 origin-left scale-0 px-3 rounded-lg border border-gray-300 bg-white py-2 text-sm font-bold shadow-md transition-all duration-300 ease-in-out group-hover:scale-100">
                            GitHub
                        </span>
                    </div>

                    <div class="group relative">
                        <button onclick="window.location.href = 'https://www.youtube.com/@ThePyProgramming';">
                            <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                fill="none" viewBox="0 0 24 24"
                                class="w-8 hover:scale-125 duration-200 hover:stroke-red-600">
                                <path
                                    d="M21.8 8.001c-.2-1.4-.7-2.5-1.4-3.2-.8-.9-1.7-1.2-2.9-1.3C15.1 3.2 12 3.2 12 3.2s-3.1 0-5.5.3c-1.2.1-2.1.4-2.9 1.3-.8.7-1.2 1.8-1.4 3.2-.2 1.5-.2 5.4-.2 5.4s0 3.9.2 5.4c.2 1.4.7 2.5 1.4 3.2.8.9 1.7 1.2 2.9 1.3 2.4.2 5.5.2 5.5.2s3.1 0 5.5-.3c1.2-.1 2.1-.4 2.9-1.3.8-.7 1.2-1.8 1.4-3.2.2-1.5.2-5.4.2-5.4s0-3.9-.2-5.4zm-12.3 8.2v-7l6.2 3.5-6.2 3.5z">
                                </path>
                            </svg>
                        </button>
                        <span
                            class="absolute -top-14 left-[50%] -translate-x-[50%] z-20 origin-left scale-0 px-3 rounded-lg border border-gray-300 bg-white py-2 text-sm font-bold shadow-md transition-all duration-300 ease-in-out group-hover:scale-100">
                            YouTube
                        </span>
                    </div>

                    <div class="group relative">
                        <button onclick="window.location.href = 'https://www.instagram.com/';">
                            <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="1" stroke="currentColor"
                                fill="none" viewBox="0 0 24 24"
                                class="w-9 hover:scale-125 duration-200 hover:stroke-blue-500">
                                <path
                                    d="M17.75 3h-9.5A4.25 4.25 0 0 0 3 7.25v9.5A4.25 4.25 0 0 0 7.25 21h9.5A4.25 4.25 0 0 0 21 16.75v-9.5A4.25 4.25 0 0 0 16.75 3zM19.5 16.75c0 1.51-1.24 2.75-2.75 2.75h-9.5c-1.51 0-2.75-1.24-2.75-2.75v-9.5C4.5 5.74 5.74 4.5 7.25 4.5h9.5c1.51 0 2.75 1.24 2.75 2.75v9.5z">
                                </path>
                                <path
                                    d="M12 7.5a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9zm0 7.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6zM16.75 7a.75.75 0 1 1 0 1.5.75.75 0 0 1 0-1.5z">
                                </path>
                            </svg>
                        </button>
                        <span
                            class="absolute -top-14 left-[50%] -translate-x-[50%] z-20 origin-left scale-0 px-3 rounded-lg border border-gray-300 bg-white py-2 text-sm font-bold shadow-md transition-all duration-300 ease-in-out group-hover:scale-100">
                            Instagram
                        </span>
                    </div>


                </div>
                <div class="flex flex-col items-center">
                    <img class=" object-cover border-4 mb-5  border-slate-800 rounded-full shadow-[5px_5px_0_0_rgba(0,0,0,1)] shadow-orange-300 bg-indigo-50 text-indigo-600 h-48 w-48"
                        src="../assets/image/Profile.jpg" alt="">
                    <button onclick="window.location.href = 'https://github.com/AdrianAlfauzan';"
                        class="group relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-black via-slate-600 to-orange-300 hover:text-white dark:text-white ">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-200 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            I'M WEB DEVELOPER
                        </span>
                        <div
                            class="ease-in duration-300 opacity-0 group-hover:block group-hover:opacity-100 transition-all">
                            <div
                                class="ease-in-out duration-500 -translate-y-4 pointer-events-none transition-all group-hover:-translate-y-16 absolute left-1/2 z-50 flex -translate-x-1/2 flex-col items-center rounded-sm text-center text-sm text-slate-300 before:-top-2">
                                <div class="rounded-sm bg-black py-1 px-2">
                                    <p class="whitespace-nowrap">ADRIAN MUSA ALFAUZAN</p>
                                </div>
                                <div
                                    class="h-0 w-fit border-l-8 border-r-8 border-t-8 border-transparent border-t-black">
                                </div>
                            </div>
                        </div>
                    </button>

                </div>
                <div class=" h-10 flex items-center justify-center font-infini">WELCOME TO INFINI ROLEPLAY
                    WEB</div>
                <div class=" max-w-3xl text-center font-extralight h-20 flex items-center justify-center">
                    Our
                    Infini
                    Roleplay website
                    is
                    optimized for all devices, ensuring you get an immersive and seamless experience every time you
                    visit.</div>
                <div class="flex gap-2">
                    <a href="#daftar" class="button h-10 bg-gradient-to-br from-black via-slate-600 to-orange-300 ">
                        CREATE ACCOUNT
                    </a>
                    <button class="readme">
                        <a href="#about">Read More</a>
                    </button>
                </div>

            </div>
            <div id="home" class="
				group absolute h-full flex align-items-center scale-0 opacity-0
				transition ease-in-out duration-300 delay-0
				target:scale-100 target:opacity-100 
				">

                <div class="flex flex-col items-center bg-gradient-to-br from-black via-slate-600 to-orange-300">
                    <div class="kartu">
                        <div class="bingkai"></div>
                        <div class="konten">
                            <div class="logo">
                                <div class="logo1 text-white">
                                    INF
                                </div>
                                <div class="logo2">
                                    <h3 class="bg-gradient-to-r from-white to-orange-400 bg-clip-text text-transparent">
                                        INFINI</h3>
                                </div>
                                <span class="trail"></span>
                            </div>
                            <span class="logo-bottom-text">Roleplay</span>
                        </div>
                        <span class="bottom-text ">Infini Roleplay</span>
                    </div>
                    <div class="flex border-3 absolute top-1/2 left-1/2 transform -translate-x-1/2 translate-y-20 border-white rounded-md cursor-pointer button-icon"
                        onclick="window.location.href = 'https://discord.gg/infinirp'">
                        <div class=" p-3 icon-discord">
                            <img src="../assets/image/discord.png" width="30" alt="">
                        </div>
                        <div class="transition-all duration-400 transform transform-style-preserve-3d w-48 h-6 cube">
                            <span
                                class="absolute top-1 left-0  flex items-center justify-center uppercase font-bold text-xs side front">
                                Our Discord
                            </span>
                            <span
                                class="absolute top-0 left-0 w-full h-full flex items-center justify-center uppercase font-bold text-xs side top"
                                onclick="window.location.href = 'https://discord.gg/infinirp'">
                                Check it on our Discord
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <div id="about" class="
				group absolute h-full flex align-items-center scale-0 opacity-0
				transition ease-in-out duration-300 delay-0
				target:scale-100 target:opacity-100 
				">
                <div class="absolute w-full flex justify-center p-2 ">
                    <span
                        class="p-2 w-[500px] hover:scale-105  transition-all ease-in-out duration-500 cursor-pointer"><img
                            src="../assets/image/Polisi_Infini.png"
                            class="h-[272px] border border-orange-300 rounded-xl hover:shadow-amber-400 shadow-md"
                            alt=""></span>
                    <span
                        class="p-2 w-[500px] hover:scale-105  transition-all ease-in-out duration-500 cursor-pointer"><img
                            src="../assets/image/Ems_Infini.png"
                            class="border border-orange-300 rounded-xl hover:shadow-amber-400 shadow-md " alt=""></span>
                </div>
                <div class="flex items-center bg-gradient-to-br from-black via-slate-600 to-orange-300">
                    <div class="w-1/4 transition duration-300 delay-150 group-target:scale-100 scale-0">
                        <!-- container logo -->
                        <div cla ss="border-none rounded-lg overflow-hidden">
                            <img src="../assets/image/Gif.gif" alt="Logo_Infini">
                        </div>
                    </div>
                    <div class="w-3/5 transition duration-300 delay-300 group-target:scale-100 scale-0">
                        <p>Infini Roleplay adalah komunitas roleplay di GTA 5 yang menyuguhkan pengalaman bermain yang
                            mendalam dan realistis. Bergabunglah dengan kami dan rasakan serunya menjalani kehidupan
                            kedua di dunia virtual, di mana Anda bisa menjadi siapa saja dan melakukan apa saja.
                            Tingkatkan kemampuan roleplay-mu dan jadilah bagian dari cerita yang tak terlupakan di
                            Infini Roleplay!</p>
                        <!-- deskripsi -->
                    </div>
                </div>
                <div class="absolute bottom-0 w-full flex justify-center p-2 ">
                    <span
                        class="p-2 w-[500px] hover:scale-105  transition-all ease-in-out duration-500 cursor-pointer"><img
                            src="../assets/image/Pedagang_Infini.png"
                            class="border border-orange-300 rounded-xl hover:shadow-amber-400 shadow-md " alt=""></span>
                    <span
                        class="p-2 w-[500px] hover:scale-105  transition-all ease-in-out duration-500 cursor-pointer"><img
                            src="../assets/image/Mekanik_Infini.jpg"
                            class="border border-orange-300 rounded-xl hover:shadow-amber-400 shadow-md " alt=""></span>
                </div>
            </div>
            <div id="daftar" class="
				group absolute h-full flex align-items-center scale-0 opacity-0
				transition ease-in-out duration-300 delay-0
				target:scale-100 target:opacity-100 
				">

                <div
                    class="flex items-center justify-between  bg-gradient-to-br from-black via-slate-600 to-orange-300 ">
                    <div class=" w-1/4 transition duration-300 delay-150 group-target:scale-100 scale-0">
                        <!-- container logo -->
                        <div cla ss="border-none rounded-lg overflow-hidden">
                            <img src="../assets/image/Gif.gif" alt="Logo_Infini">
                        </div>
                    </div>
                    <div class="form-card1">
                        <div class="form-card2">
                        <form class="form" action="" method="POST" encrypt="multipart/form-data">
                            <p class="form-heading">DAFTAR</p>
                            <div class="form-field">
                                <input required placeholder="Nama IC" class="input-field" name="nama_pengguna" type="text" />
                            </div>
                            <div class="form-field">
                                <?php
                                $sql = "SELECT * FROM tabel_pekerjaan";
                                $result = $database->query($sql);
                                ?>
                                <select required class="input-field dropdown-field" name="id_pekerjaan">
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['ID_pekerjaan'] . "'>" . $row['nama_pekerjaan'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value='' disabled>Tidak ada data</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-field">
                                <input required placeholder="Jabatan Pengguna" class="input-field" name="jabatan_pengguna" type="text" />
                            </div>
                            <div class="form-field">
                                <input required placeholder="Username" class="input-field" name="username" type="text" autofocus />
                            </div>
                            <div class="form-field">
                                <input required placeholder="Password" class="input-field" name="password" type="password" />
                            </div>
                            <div class="form-field">
                                <input required placeholder="Confirm Password" class="input-field" name="confirm_password" type="password" />
                            </div>
                            <button class="sendMessage-btn" name="daftar" type="submit">DAFTAR</button>
                        </form>
                        </div>
                    </div>
                    <div class=" w-1/4 transition duration-300 delay-150 group-target:scale-100 scale-0">
                        <!-- container logo -->
                        <div cla ss="border-none rounded-lg overflow-hidden">
                            <img src="../assets/image/Gif.gif" alt="Logo_Infini">
                        </div>
                    </div>
                </div>
            </div>
            <div id="login" class="
				group absolute h-full flex align-items-center scale-0 opacity-0
				transition ease-in-out duration-300 delay-0
				target:scale-100 target:opacity-100 
				">
                <div
                    class="flex items-center justify-between  bg-gradient-to-br from-black via-slate-600 to-orange-300 ">
                    <div class=" w-1/4 transition duration-300 delay-150 group-target:scale-100 scale-0">
                        <!-- container logo -->
                        <div cla ss="border-none rounded-lg overflow-hidden">
                            <img src="../assets/image/Gif.gif" alt="Logo_Infini">
                        </div>
                    </div>
                    <div class="form-card1">
                        <div class="form-card2">
                            <form class="form" method="POST" action="../../users/website/page-absensi.php">
                                <p class="form-heading">LOGIN</p>
                                <?php
                                if (isset($_SESSION["error"])) {
                                    echo '<div class="alert alert-danger text-red-600">' . $_SESSION["error"] . '</div>';
                                    unset($_SESSION["error"]);
                                }

                                // if (isset($_SESSION["success"])) {
                                //     echo '<div class="alert alert-success">' . $_SESSION["success"] . '</div>';
                                //     unset($_SESSION["success"]);
                                // }
                                ?>

                                <div class="form-field">
                                    <input required="" placeholder="Username" class="input-field" name="username"
                                        type="text" autofocus />
                                </div>

                                <div class="form-field">
                                    <input required="" placeholder="Password" class="input-field" name="password"
                                        type="password" />
                                </div>

                                <button class="sendMessage-btn" type="submit" name="login_pengguna">LOGIN</button>
                                <h5 class="text-red-600">Belum Daftar ?</h5>
                                <a href="#daftar" class="sendMessage-btn-href">DAFTAR</a>
                            </form>
                        </div>
                    </div>

                    <div class=" w-1/4 transition duration-300 delay-150 group-target:scale-100 scale-0">
                        <!-- container logo -->
                        <div cla ss="border-none rounded-lg overflow-hidden">
                            <img src="../assets/image/Gif.gif" alt="Logo_Infini">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../assets/js/page-utama.js"></script>
</body>

</html>