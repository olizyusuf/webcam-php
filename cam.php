<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #webcam {
            border: 1px solid black;
            width: 480px;
            height: 480px;
            margin-bottom: 20px;
        }
    </style>
    <title>App Cam</title>
</head>

<body>

    <div id="webcam"></div>
    <div id="res"></div>
    <button onclick="takeSnapshot()">Take Snapshot</button>
    <button onclick="resetSnap()">Reset</button>
    <div id="res"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // Load webcam
        var video = document.querySelector("#webcam");

        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpg',
            gpeg_quality: 90
        });


        Webcam.attach("#webcam");

        function takeSnapshot() {
            Webcam.snap(function(data) {
                document.getElementById('webcam').style.display = 'none';
                is_hide = true;
                document.getElementById('res').innerHTML = `<img src="${data}" id="snapshot"></img>`;

                $.ajax({
                    url: "http://localhost/appcam/insertimage.php",
                    type: "post",
                    data: {
                        image: data
                    },
                });
            })
        }

        function resetSnap() {
            document.getElementById('webcam').style.display = 'block';
            is_hide = false;
            $("#snapshot").remove()
        };
    </script>
</body>

</html>