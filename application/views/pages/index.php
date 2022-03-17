<table class="table table-hover">
    

    <thead>

        <tr>

            <th>#</th>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Email</th>
            <th class="text-right">Ações</th>

        </tr>

    </thead>

    <tbody>

        <?php
            $sql = 'SELECT * FROM pages ORDER BY title ASC';
            $result = $this->db->query($sql)->result_array();
        ?>

        <tr>

            <?php foreach ($result as $page) :

                echo "<td>" .$page['id']. "</td>";
                echo "<td>" .$page['title']. "</td>";
                echo "<td>" .$page['nascimento']. "</td>";
                echo "<td>" .$page['body']. "</td>";
            
            ?>

            <td class="text-right">
                <a href="/pages/view/<?php echo $page['id']; ?>" class="btn btn-xs btn-default">Ver</a>
                <a href="/pages/edit/<?php echo $page['id']; ?>" class="btn btn-xs btn-info">Editar</a>
                <form action="/pages/delete/<?php echo $page['id']; ?>" style="display: inline-block;" method="post">
                    <input type="submit" value="Remover" class="btn btn-xs btn-danger">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<a href="/pages/new" class="btn btn-xs btn-info">Criar Novo Usuário</a>