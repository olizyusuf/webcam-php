<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <video autoplay="true" id="video-webcam" weight="320px" height="240px">
            Browsermu tidak mendukung bro, upgrade donk!
        </video>
        <div id="res"></div>
        <button onclick="takeSnapshot()">Ambil Gambar</button>
    </div>
    

    <script type="text/javascript">
        // seleksi elemen video
        var video = document.querySelector("#video-webcam");

        // minta izin user
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

        // jika user memberikan izin
        if (navigator.getUserMedia) {
            // jalankan fungsi handleVideo, dan videoError jika izin ditolak
            navigator.getUserMedia({
                video: true
            }, handleVideo, videoError);
        }

        // fungsi ini akan dieksekusi jika  izin telah diberikan
        function handleVideo(stream) {
            video.srcObject = stream;
        }

        // fungsi ini akan dieksekusi kalau user menolak izin
        function videoError(e) {
            // do something
            alert("Izinkan menggunakan webcam untuk demo!")
        }


        function takeSnapshot() {
            // buat elemen img
            var img = document.createElement('img');
            var context;

            // ambil ukuran video
            var width = video.offsetWidth,
                height = video.offsetHeight;

            // buat elemen canvas
            canvas = document.createElement('canvas');
            canvas.width = width;
            canvas.height = height;

            // ambil gambar dari video dan masukan 
            // ke dalam canvas
            context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, width, height);

            // render hasil dari canvas ke elemen img
            img.src = canvas.toDataURL('image/png');
            img.id = 'snapshot';
            document.body.appendChild(img);
            console.log(img);
        }

        function simpan(){
            var image = $('#snapshot').attr('src')
        }
    </script>
</body>

</html>