<!DOCTYPE html>
<html>
    <body>

    <h1>Produtos</h1>

    <form action="adiciona_carrinho.php">
        <label for="livros">Selecione seus livros:</label><br/>
        <select name="livros[]" id="livros" multiple>
            <!--option value="sofia">Mundo de Sofia</option>
            <option value="lazaro">Na Minha Pele</option>
            <option value="maquiavel">Principe</option>
            <option value="chimamanda">O Perigo de uma História Única</option-->
            <?php 
                include 'lista_livros.php';
                foreach ($results as $value) {
                    echo '<option value="' . $value['id'] . '|' . 
                                             $value['titulo'] . '|' . 
                                             $value['preco'] . '">';
                    echo $value['titulo'] . ', ' . 
                         $value['autor'] . 
                         ' (R$ ' . $value['preco'] .')';
                    echo '</option>';
                }
            ?>
        </select>
        <br/><br/>
        <input type="submit" value="Comprar">
    </form>

    <p>
        Para acessar o carrinho, <a href="adiciona_carrinho.php">clique aqui</a>.
    </p>

    </body>
</html>