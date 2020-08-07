<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassWord Hash</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="center-center">
        <label for="pass">Entrer le mot de passe a hasher ou:</label>
        <button id="generer" >Generer un mot de pass</button>
        <input type="text" name="pass" placeholder="entrer votre mdp ici" id="pass">
        <button id="hasher" >Hasher</button>

        <p id="passRes"></p>


    <script>
        window.addEventListener('DOMContentLoaded',()=>{
            let pass = document.querySelector('#pass')
            let passRes = document.querySelector('#passRes')
            let btn = document.querySelector('#generer')
            let hasher = document.querySelector('#hasher')
            hasher.addEventListener('click',()=>{
                let content = pass.value;
                    fetch('/hash.php?pass=' + content)
                    .then(data => data.json())
                    .then(res => passRes.innerHTML = res.password)
                    .catch(err => console.log(err))

                
            })

            btn.addEventListener('click', ()=>{
                fetch("/hash.php?generer")
                .then(data => data.json())
                .then(res => {
                    pass.value = res.password
                    fetch('/hash.php?pass=' + res.password)
                    .then(data => data.json())
                    .then(res => passRes.innerHTML = res.password)
                    .catch(err => console.log(err))
                    })
                .catch(err => console.log(err))
            })
            
            

        })
    
    
    
    </script>
</body>
</html>