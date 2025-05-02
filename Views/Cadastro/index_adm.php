<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/css/add.adm.css">
    <title>Document</title>
</head>
<body>
    <header>
        <section class="add_usuario">
            <div class="img_add_usuario">
                <img src="/Assets/img/img/img2.png" alt="">
            </div>
            <h1>
                Adicionar Usuario
            </h1>
        </section>
        <section class="icone_seta">
            <img src="/Assets/img/img/seta.png" alt="">
        </section>
    </header>

    <main class="content_main">

    <?php  echo $_SESSION['msg'] ?>
       <form class="formulario" method="POST" action="<?= BASE_URL . 'UsuarioController/registro'?> ">
            <section class="secao_informacoes">
                <div class="campo_infor">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digitar nome do Usuário">
                </div>
                
                <div class="campo_infor">
                    <label for="faculdade">Faculdade</label>
                    <input type="text" id="faculdade" name="faculdade" placeholder="Digitar nome da Faculdade">
                </div>

                <div class="campo_infor">
                    <label for="curso">Curso</label>
                    <input type="text" id="curso" name="curso" placeholder="Digitar nome do Curso">
                </div>
                
            </section>

            <section class="secao_tipo_grupo">
                <div class="coluna">
                    <h2>Tipo do Usuario</h2>
                    <p>*Selecionar o tipo do usuario</p>

                    <div class="opcoes_tipo">
                        <div class="opcoes">
                            <input type="radio" id="tipo_orientando" name="tipo_usuario" value="orientando">
                            <label for="tipo_orientando">Orientando</label>
                        </div>
    
                        <div class="opcoes">
                            <input type="radio" id="tipo_orientador" name="tipo_usuario" value="orientador">
                            <label for="tipo_orientador">Orientador</label>
                        </div>
    
                        <div class="opcoes">
                            <input type="radio" id="tipo_coordenador" name="tipo_usuario" value="coordenador">
                            <label for="tipo_coordenador">Coordenador</label>
                        </div>
                </div>


                </div>

                <div class="coluna">
                    <h2>Grupo do Usuário</h2>
                    <p>*Selecionar grupo do usuário</p>

                    <select id="grupo_usuario">
                        <option value="" selected disabled>Selecione o Grupo</option>
                        <option value="grupo1">Grupo de Pesquisa 1</option>
                        <option value="grupo2">Grupo de Pesquisa 2</option>
                        <option value="grupo3">Grupo de Extensão</option>
                    </select>
                </div>
            </section>
            <button type="submit" class="botao_criar">Criar novo Usuário</button>
       </> 
    </main>
</body>
</html>