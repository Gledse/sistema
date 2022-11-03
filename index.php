<style>
    footer{
        margin-top: 70px;
        text-align: center;
        background-color: lightgray;
        /*position: relative;
        position: sticky;
        bottom: 20px;
        background-color: lightgray;*/
    }
    footer > p > a{
        color: black;
        text-decoration: underline;
    }
    /*table > thead > tr{
        position: sticky;
        top: -1px;
        background-color: white;
    }*/
</style>
<?php
// Conexão
include_once('php_action/db_connect.php');
// Header
include_once('includes/header.php');
// Mensagem
include_once('includes/mensagem.php');
?>

<div class="row">
    <div id="tamanho">
        <h3 class="light">Clientes</h3>
        <div id="responsivo">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nome:</th>
                        <th>Sobrenome:</th>
                        <th>Email:</th>
                        <th>Idade:</th>
                    </tr>
                </thead>
    
                <tbody>
                    <?php 

                    $sql = "SELECT * FROM clientes";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0): // se o resultado for maior do que 0

                        while($dados = mysqli_fetch_array($resultado)): // $dados recebendo os dados do banco de dados
                    ?>
                        <tr>
                            <td><?php echo $dados['nome'] ?></td>
                            <td><?php echo $dados['sobrenome'] ?></td>
                            <td><?php echo $dados['email'] ?></td>
                            <td><?php echo $dados['idade'] ?></td>
                            <td><a href="editar.php?id=<?php echo $dados['id']; ?>"class="btn-floating orange"><i class="material-icons">edit</i></a></td> <!-- chamando o id do banco de dados para poder editar-->

                            <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td> <!-- chamando o id do banco de dados para poder deletar-->

                            <!-- Modal Structure -->
                            <div id="modal<?php echo $dados['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Opa!</h4>
                                    <p>Tem certeza que deseja excluir esse cliente?</p>
                                </div>

                                <div class="modal-footer">
                                    <form action="php_action/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

                                        <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                        </tr>
                    <?php endwhile; endif; ?>
                </tbody>
            </table>
        </div>
        <br>
        <a href="adicionar.php" class="btn">Adicionar clientes</a>
        <br>
        <footer>
            <p> Sistema Desenvolvido por <a href="https://github.com/Gledse" target="_blank">Glédse Jamisse</a> para o GitHub</p>
        </footer>
    </div>
</div>
<?php
// Footer
include_once('includes/footer.php');


// php -S localhost:8000 >>> http://localhost/GitHub/Sistema/index.php
?>                                                            