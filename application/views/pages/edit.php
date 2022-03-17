<h2>Edição de usuário</h2>

<?php echo validation_errors(); ?>

<form action="/pages/update/<?php echo $page[0]['id'];?>" method="post">

    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" name="title" class="form-control" placeholder="Seu Nome" value="<?php echo $page[0]['title'];?>"/>
    </div>

    <div class="form-group">
        <label for="text">Email</label>
        <textarea name="body" class="form-control" placeholder="Email"><?php echo $page[0]['body'];?></textarea>
    </div>

    <div class="form-group">
        <label for="text">Data de nascimento</label>
        <input name="nascimento" class="form-control" placeholder="Data de Nascimento" id="nascimento" value="<?php echo $page[0]['nascimento'];?>">  
    </div>

    <input type="submit" name="submit" value="Atualizar esta página" class="btn btn-primary" />

</form>

<hr>
<a href="/pages" class="btn btn-success">Voltar</a>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js">  </script>
<script>
   $('#nascimento').mask('00/00/0000');

</script>