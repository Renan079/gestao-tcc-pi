<?php 

include("../Support/Config.php");

class UsuarioController extends Controller {

    public function registro() {

        $user = new usuario();
        
        if (
                isset($_POST['nome']) && !empty($_POST['nome']) &&
                isset($_POST['faculdade']) && !empty($_POST['faculdade']) &&
                isset($_POST['cargo']) && !empty($_POST['cargo']) &&
                isset($_POST['matricula']) && !empty($_POST['matricula']) &&
                isset($_POST['senha']) && !empty($_POST['senha']) 
            ) 
        {

            $nome = $_POST['nome'];
            $faculdade = $_POST['faculdade'];
            $cargo = $_POST['cargo'];
            $matricula = $_POST['matricula'];
            $senha = $_POST['senha'];


            $user->setCadastroAluno($nome, $faculdade, $cargo, $matricula, $senha);

            $_SESSION['msg'] = ['type' => 'success', 'message' => 'Usuário cadastrado com sucesso!'];

            return redirect(BASE_URL . 'cadastro');
        }

    }

    public function LoginAluno() {
       $usuario = new usuario();

       $matriculaDigitada =$_POST['Matricula'];
       $senha = $_POST['senha'];

       $result = $usuario->verificarLoginAluno($matriculaDigitada, $senha);
        if ($result) {
            echo "Entrada permitida";
        } else {
            echo "Entrada não permitida";

        }
    }

    public function LoginProfessor() {

        $usuario = new usuario();

        $emailDigitado = $_POST['emailProfessor'];
        $senha = $_POST['senhaProfessor'];

        $result = $usuario->verificarLoginProfessor( $emailDigitado, $senha);
        if ($result) {
            echo "Entrada permitida";
        } else {
            echo "Entrada não permitida";

        }

    }

    public function mudarSenhaAluno() {

        $usuario = new usuario();

        $matricula = $_POST['matriculaTrocarSenha'];
        $senhaAntiga = $_POST['senhaAntiga'];
        $novaSenha = $_POST['novaSenha'];

        $result = $usuario->trocarSenhaAluno($matricula, $senhaAntiga, $novaSenha);
        if ($result) {
            echo "Senha alterada com sucesso";

        }else {
            echo "Senha naão pode ser alterada";
            
        }
    }

    public function mudarSenhaProfessor() {

        $usuario = new usuario();

        $emailProfessor = $_POST['emailProfessor'];
        $senhaAntiga = $_POST['senhaAntiga'];
        $novaSenha = $_POST['novaSenha'];

        $result = $usuario->trocarSenhaProfessor($emailProfessor, $senhaAntiga, $novaSenha);
        if ($result) {
            echo "Senha alterada com sucesso";

        }else {
            echo "Senha naão pode ser alterada";
            
        }
    }
} 