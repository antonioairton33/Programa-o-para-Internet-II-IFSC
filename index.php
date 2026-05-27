<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <?php
        $a = 'Boa noite';
        $b = ' galera!';
        echo '<p>' . $a . $b '</p>';
    ?>
        <div id="box"
            style="width:200px;height:100px;padding:16px;border:1px solid #000;">
            Move mouse over this box
        </div>
        <script>
            const box = document.getElementById("box");
            box.addEventListener("mouseover", function () {
                box.innerHTML = "Mouse is over me!";
            });
            box.addEventListener("mouseout", function () {
                box.innerHTML = "Mouse is out!";
            });
            box.addEventListener("click", function (){
                box.innerHTML = "Mouse was clicked";
            });
            box.style.backgroundColor = "green";
            box.style.color = "white";
        </script>

    </body>
</html>