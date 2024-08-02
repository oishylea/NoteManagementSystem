<!DOCTYPE html>
<html>
<head>
    <title>Moving GIF</title>
    <style>
        @keyframes moveRightToLeft {
            0% { right: 0; }
            100% { right: calc(100% - 100px); }
        }

        img.moving-gif {
            position: absolute;
            bottom:0;
            animation: moveRightToLeft 3s linear infinite;

        }
    </style>
</head>
<body>
    <img src="herta.gif" alt="GIF Image Description" width="100" class="moving-gif">
</body>
</html>