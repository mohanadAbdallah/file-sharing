<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>File Sharing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"

          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

@include('layouts.partials.navbar')

<div class="container">

    <div class="row">
        <div class="col-md-8" style="margin: 237px -30px auto 208px;">

            <div class="container "  style=" margin-top: 90px">
                <div class="row  d-flex justify-content-center align-items-center">

                    <div class="col-md-8"  >
                        <div class="copy-box border rounded p-3 d-flex justify-content-between align-items-center w-100">
                            <div class="box-content">
                                <small class="fw-bold" >{{ $url }}</small>
                            </div>
                            <button class="copy-button btn text-white " style="background-color: #617fa9"
                                    onclick="copyText()">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function copyText() {
        const boxContent = document.querySelector('.box-content');
        const text = boxContent.textContent;

        // Create a temporary textarea to copy the text to clipboard
        const textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);

        // Update the button content to indicate successful copy with the copy icon
        const copyButton = document.querySelector('.copy-button');
        copyButton.innerHTML = '<i class="bi bi-clipboard-check"></i>';

        // Reset button content after 2 seconds
        setTimeout(() => {
            copyButton.innerHTML = '<i class="bi bi-clipboard"></i>';
        }, 2000);
    }

</script>
</html>
