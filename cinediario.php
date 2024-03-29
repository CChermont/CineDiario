<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>CineDiário</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        header{
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: cornflowerblue;
            color: white;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        section{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        form{
            font-family: arial;
        }
        form div {
            display: flex;
            flex-direction: column;
            margin-bottom: 30px;
        }
        form input, form textarea{
            outline: unset;
            padding: 20px;
            min-width: 300px;
            border: 1px solid cornflowerblue;
            border-radius: 20px;
        }

        form input:focus, form textarea:focus{
            background-color: rgb(197, 214, 247);
        }

        form label {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>CineDiário</h1>
        <p>Cadastre Filmes, Series e Animes que você já assitiu</p>
    </header>
    <section>
        <form action="" method="post">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <label for="genero">Genero</label>
                <select name="genero" id="genero">
                    <option value="default" disabled selected>Selecione uma Opção</option>
                    <option value="filme">Filme</option>
                    <option value="serie">Serie</option>
                    <option value="anime">Anime</option>
                </select>
            </div>
            <div>
                <label for="classificacao">Classificação</label>
                <select name="classificacao" id="classificacao">
                    <option value="default" disabled selected>Selecione uma Opção</option>
                    <option value="1">&#x2B50</option>
                    <option value="2">&#x2B50&#x2B50</option>
                    <option value="3">&#x2B50&#x2B50&#x2B50</option>
                    <option value="4">&#x2B50&#x2B50&#x2B50&#x2B50</option>
                    <option value="5">&#x2B50&#x2B50&#x2B50&#x2B50&#x2B50</option>
                </select>
            </div>
            <div>
                <label for="resumo">Resumo</label>
                <textarea name="resumo" id="resumo"></textarea>
            </div>
            <div>
                <label for="recomendacao">Recomendação</label>
                <select name="recomendacao" id="recomendacao">
                    <option value="default" disabled selected>Selecione uma Opção</option>
                    <option value="sim">Sim</option>
                    <option value="não">Nao</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Cadastrar">
            </div>
            <?php 
                include('conexao.php');
                //Coletar dados do formulário
                $nome = $_POST['nome'] ?? null;
                $genero = $_POST['genero'] ?? null;
                $classificacao = $_POST['classificacao'] ?? null;
                $resumo = $_POST['resumo'] ?? null ;
                $recomendacao = $_POST['recomendacao'] ?? null;

                $sql = "INSERT INTO cinediario.ConteudoAssistido(nome,genero,classificacao,resumo,recomendacao) values ('$nome','$genero','$classificacao','$resumo','$recomendacao')";
                $resultado = mysqli_query($mysqli, $sql);
            
            ?>
        </form>
    </section>
</body>
</html>