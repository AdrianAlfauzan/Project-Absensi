<?php
require "../../../config/koneksi.php";
include '../../users/config/logic-login-pengguna.php';
include '../../users/config/logic-profile-pengguna.php';
include '../../users/config/logic-absensi-pengguna.php';
// include '../../users/config/logic-daftar-pengguna.php';
if (!isset($_SESSION["login_pengguna"])) {
    header("Location: ../../users/website/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Absensi</title>
    <link rel="stylesheet" href="../../users/assets/css/style.css">
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
                    <a href="" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                DevOps
                            </span>
                        </div>
                    </a>
                    <a href="#Absensi" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                Absensi
                            </span>
                        </div>
                    </a>
                    <a href="#Profile" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-24 group-hover:font-normal">
                                Your Profile
                            </span>
                        </div>
                    </a>
                    <a href="../../users/config/logic-logout.php" class="group w-full cursor-pointer" onclick="toggleNavClicked()">
                        <div
                            class="transition ease-in-out duration-300 rounded-full group-hover:bg-slate-600 group-hover:rounded-full">
                            <span
                                class="font-serif transition ease-in-out duration-300 block font-extralight group-hover:translate-x-32 group-hover:font-normal">
                                Logout
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
            </div>

            <div id="Absensi" class="
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
                            <form class="form" id="absensiForm" action="../../users/config/logic-absensi-pengguna.php" method="POST">
                                <p class="form-heading">Absensi</p>
                                <div class="form-field">
                                    <input required="" placeholder="Tanggal" class="input-field" name="tanggal" type="date" />
                                </div>
                                <div class="form-field">
                                    <input required="" placeholder="Jam Masuk" class="input-field" name="jam_masuk" type="time" />
                                </div>
                                <div class="form-field">
                                    <input required="" placeholder="Jam Keluar" class="input-field" name="jam_keluar" type="time" />
                                </div>
                                <div class="form-field">
                                    <textarea required="" placeholder="Keterangan" class="input-field" name="keterangan"></textarea>
                                </div>
                                <button class="sendMessage-btn" type="submit" name="simpan">Absen</button>
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
            <div id="Profile" class="
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
                    <script>
                        // script alert login berhasil.
                        document.addEventListener("DOMContentLoaded", function () {
                            var successMessage = "<?php echo isset($_SESSION["success"]) ? $_SESSION["success"] : "" ?>";
                            var errorMessage = "<?php echo isset($_SESSION["error"]) ? $_SESSION["error"] : "" ?>";

                            if (successMessage !== "") {
                                alert(successMessage);
                                <?php unset($_SESSION["success"]); ?>
                            }

                            if (errorMessage !== "") {
                                alert(errorMessage);
                                <?php unset($_SESSION["error"]); ?>
                            }
                        });
                    </script>
                    <form class="form" method="post" action="">
                        <!-- <img class=" mx-auto object-cover border-4 mb-5  border-slate-800 rounded-full shadow-[5px_5px_0_0_rgba(0,0,0,1)] shadow-orange-300 bg-indigo-50 text-indigo-600 h-48 w-48"
                            src="" alt=""> -->

                        <p class="form-heading">YOUR PROFILE</p>
                        <div class="form-field">
                            <input required="" placeholder="Nama IC" class="input-field" name="nama_pengguna" type="text"
                            value="<?php echo $_SESSION['Nama_Pengguna'];?>" />
                        </div>
                        <div class="form-field">
                            <select required="" class="input-field" name="nama_pekerjaan">
                                <?php
                                $jobs = array(
                                    '1' => 'Pemerintahan',
                                    '2' => 'Polisi',
                                    '3' => 'EMS',
                                    '4' => 'Pedagang',
                                    '5' => 'Mekanik'
                                );
                                
                                // Check if the user's job is known
                                if(array_key_exists($_SESSION['Nama_Pekerjaan'], $jobs)) {
                                    echo '<option value="' . $_SESSION['Nama_Pekerjaan'] . '" selected>' . $jobs[$_SESSION['Nama_Pekerjaan']] . '</option>';
                                } else {
                                    echo '<option value="" selected>Tidak Diketahui</option>';
                                }

                                // Generate options for changing the job
                                foreach($jobs as $jobId => $jobName) {
                                    if($jobId != $_SESSION['Nama_Pekerjaan']) {
                                        echo '<option value="' . $jobId . '">' . $jobName . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-field">
                            <input required="" placeholder="Jabatan Pengguna" class="input-field" name="jabatan_pengguna" type="text"
                            value="<?php echo $_SESSION['Jabatan_Pengguna']; ?>" />
                        </div>

                        <div class="form-field">
                            <input required="" placeholder="Username" class="input-field" name="username" type="text"
                            value="<?php echo $_SESSION['Username']; ?>" readonly />
                        </div>

                        <div class="form-field">
                            <input required="" placeholder="Your Password" class="input-field" name="password" type="text" 
                            value="<?php echo $_SESSION['Confirm_Password']; ?>"/>
                        </div>

                        <div class="form-field">
                            <input required="" placeholder="Confirm Password" class="input-field" name="confirm_password"
                                type="text" 
                                value="<?php echo $_SESSION['Confirm_Password']; ?>"/>
                        </div>

                        <button class="sendMessage-btn" type="submit" name="change_profile">Change Profile</button>
                    </form>
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
</body>

</html>