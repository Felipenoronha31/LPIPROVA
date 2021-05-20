
<h3 class="container text-center">Usuários</h3>
        <p>
        <div class="container">
        <table class="table table-striped table-bordered">
        <tr class="bg-warning">
                <th scope="col">
                        Id
                    </th>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                    Email
                    </th>
                    <th scope="col">
                    Perfil
                    </th>
                    <th scope="col">
                    Editar
                    </th> 
                    <th scope="col">
                    Apagar
                    </th>
                
                </th>

        <tbody>

            <?php
                $sq= "
                select * from cadastros as c
                INNER JOIN perfil as p on p.id_perfil = c.fk_idProfile 
                ";
                $qu=mysqli_query($con,$sq);
                while($f=  mysqli_fetch_assoc($qu)){
            ?>
            <tr>
            <td>
                    <?php echo $f['id_cadastros']?>
                </td>
                <td>
                    <?php echo $f['nome_cadastros']?>
                </td>
                <td>
                    <?php echo $f['email_cadastros']?>
                </td>
                <td>
                    <?php echo $f['nome_perfil']?>
                </td>
                <td>
                    <a href="edit_cadastro.php?id_cadastros=<?php echo $f['id_cadastros']?>">Editar</a>
                </td>
                <td>
                    <a href="delete_cadastro.php?id_cadastros=<?php echo $f['id_cadastros']?>">Apagar</a>
                </td>
        
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
        </div>
        </p>
