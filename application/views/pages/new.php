<h2>Novo Usuário</h2>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<?php echo validation_errors(); ?>

<script>

    function validar(){

      var email  = newUser.body.value;

      if (email.indexOf('@') == -1 || email.indexOf('.') == -1 ){
          alert("Preencha o campo email");
          newUser.email.focus();
          return false;


          const input = document.getElementById("input");
          input.addEventListener('click', (event) =>{
              event.preventDefault();
          })
      }

    }

    function formaData(){

        var data = newUser.nascimento.value.split('/');

        var date = new Date();
        const dataReal = date.getFullYear();

        var dia = data[0];
        var mes = data[1];
        var ano = data[2]; 

        if (dia > 31){
            alert("Preencha o dia corretamente");
            newUser.nascimento.focus();
            
            return false;
        }
        
        if (mes > 12){
            alert("Preencha o mês correto");
            newUser.nascimento.focus();

            return false;
        }
        
        if (ano > dataReal){
            
            alert("Preencha o ano corretamente");
            newUser.nascimento.focus();
            
            return false;
        } 

        return true;
    }

    function enviar() {
        event.preventDefault();
        if(validar() == false){
            return false;
        }

        if(formaData() == false){
            return false;
        }

        $.ajax({
            url: "create",
            type: "POST",
            data: $("#form_new").serialize(),
            dataType: "html",
            success: function (response) {
                window.location.replace("./");
            }
        })
    }
    
</script>

<form name="newUser" id="form_new" method="post">

    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" name="title"  class="form-control" placeholder="Nome"/>
    </div>

    <div class="form-group">
        <label for="text">Email</label>
        <input name="body" class="form-control" placeholder="Email" id="email" ></input>
    </div>

    <div class="form-group">
        <label for="text">Data</label>
        <input name="nascimento" class="form-control" placeholder="Data de nascimento" id="nascimento" onchange="formaData()" required></input>
    </div>

    <input type="submit" name="submit" value="Criar novo Usuário" class="btn btn-primary" id="input" onclick="enviar()" />
    <a href="/pages/" class="btn btn-primary">Voltar</a>

</form>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js">  </script>

<script>
   $('#nascimento').mask('00/00/0000');
</script>