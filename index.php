<?php
include 'backend.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Substitusi Tools</title>
</head>

<body>
    <div class="flex flex-col w-full max-h-screen min-h-screen bg-gray-100 ">

        <!-- navbar -->

        <div class="sticky top-0 flex flex-row items-center justify-between w-full px-12 py-2 bg-white border-b border-b-gray-300">
            <div>
                <h1 class="font-semibold text-orange-600">Cryptography</h1>
                <span class="text-sm text-gray-600">Substitution Tools</span>
            </div>
            <a href="https://github.com/wahyuhidayattz/" target="_blank" class="border-b-4  border-b-orange-600 flex px-3 py-1.5 text-sm text-black bg-gray-100 hover:bg-orange-500 hover:text-white transition duration-200">By Wahyu.H</a>
        </div>

        <!-- end navbar -->
        <?php if ($error == true) : ?>
            <div class="flex flex-col px-4 pt-4 text-sm">
                <span class="flex flex-row items-center w-full gap-2 px-4 py-2 text-white bg-red-500 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <?= $error_message; ?></span>
            </div>
        <?php endif; ?>

        <div class="flex flex-col flex-grow max-h-full gap-4 p-4 overflow-auto md:grid md:grid-cols-10">

            <!-- input text -->
            <form action="" method="POST" class="flex flex-col max-h-full col-span-3 text-sm text-gray-800 bg-white border border-gray-300 shadow-lg">

                <textarea name="input_plaint_text" id="" cols="30" class="flex-grow w-full h-full px-4 py-3 transition duration-200 bg-white outline-none focus:ring focus:ring-orange-300" placeholder="Input Plaint Text"><?= $plaint_text; ?></textarea>

                <div class="w-full border-b border-b-gray-300"></div>

                <div class="flex flex-row flex-wrap items-center justify-end w-full gap-4 px-6 py-4 text-sm md:justify-end md:items-end md:flex-col">
                    <div class="flex flex-row items-center gap-2 ">
                        <span>A = </span>
                        <input type="text" name="input_char" class="px-3 py-1.5 bg-gray-100 text-gray-700 border border-gray-300 outline-none" size="1" value="<?= $char; ?>">
                    </div>
                    <div class="flex flex-row flex-wrap items-center justify-end gap-4">
                        <button name="input_encrypt" class="px-3 py-1.5 bg-orange-600 text-white hover:bg-orange-500 transition duration-200 flex flex-row gap-2">Encrypt Text</button>
                        <button name="input_decrypt" class="px-3 py-1.5 bg-green-600 text-white hover:bg-green-500 transition duration-200 flex flex-row gap-2">Decrypt Text</button>
                    </div>
                </div>
            </form>

            <!-- end input text -->

            <!-- output -->

            <div class="flex flex-col max-h-full col-span-7 overflow-auto text-sm text-gray-700 bg-white border border-gray-300 shadow-lg">
                <div class="flex flex-row items-center justify-between w-full max-h-full px-6 py-2 border-b border-b-gray-300">
                    <span class="font-semibold">Outputs :</span>
                    <button class="flex p-1 rounded-full hover:bg-gray-200" onclick="clipboard()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                            <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                        </svg>
                    </button>
                </div>
                <?php if (isset($display_char) && $jenis == 'encrypt') : ?>
                    <span class="px-6 py-4 leading-relaxed" id="result-text">
                        <?= $display_char; ?>
                    </span>
                <?php endif; ?>

                <?php if ($jenis == 'decrypt') : ?>
                    <div class="flex flex-col w-full h-full max-h-full gap-4 px-6 py-4 overflow-auto leading-relaxed">
                        <?php foreach ($result_text as $key => $data) : ?>
                            <div class="flex flex-col items-start justify-start" id="result-text">
                                <span class="px-2 text-gray-900 bg-yellow-300 text-semibold "><?= $key; ?></span>
                                <span><?= $data[0]; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>

            <!-- end output -->

        </div>

        <div class="flex flex-row items-center justify-center px-12 py-8 text-sm font-medium text-orange-600 bg-white border border-t border-t-gray-300">
            Copyright 2022 - Wahyu Hidayat
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>