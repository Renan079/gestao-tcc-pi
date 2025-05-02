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


            $user->setCadastro($nome, $faculdade, $cargo, $matricula, $senha);

            $_SESSION['msg'] = ['type' => 'success', 'message' => 'Usuário cadastrado com sucesso!'];

            return redirect(BASE_URL . 'cadastro');
        }

    }

    public function verificarLogin() {

        $usuario = new usuario();

        $sql = $this->db->prepare("SELECT matricula, senha from usuario");
        $sql->execute();

        $matriculaDigitada = $_POST['matricula'];
        $senhaDigitada = $_POST['senha'];
            if ($sql->rowCount () > 0) {
                $usuario = $sql->fetch(PDO::FETCH_ASSOC);

                if ($matriculaDigitada == $usuario['matricula'] and password_verify($senhaDigitada, $usuario['senha'])) {
                    echo 'Entrada permitida';
                }
                else{
                    echo 'Entrada não permitida';
                }

            }else {
                echo 'usuario não encontrado';
        }
    }

    public function trocarSenha() {
        $matricula = $_POST['matriculaSetSenha'];
        $senhaAntiga = $_POST['senhaAntiga'];
        $novaSenha = $_POST['novaSenha'];

        $sql = $this->db->prepare('SELECT senha FROM usuario WHERE matricula = :matricula');
        $sql->bindValue(':matricula', $matricula);
        $sql->execute();
    
        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    
            if (password_verify($senhaAntiga, $usuario['senha'])) {
            
                $senhaCriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);
    
                $update = $this->db->prepare("UPDATE usuario SET senha = :novaSenha WHERE matricula = :matricula");
                $update->bindValue(':novaSenha', $senhaCriptografada);
                $update->bindValue(':matricula', $matricula);
                $update->execute();
    
                echo "Senha alterada com sucesso!";
            } else {
                echo "Senha antiga incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }
    

    


}
    
		