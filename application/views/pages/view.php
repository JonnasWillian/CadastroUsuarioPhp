<h2>Visualizando página</h2>


<div class="row">
    <div class="col-md-6">
        Nome: <?php echo $page[0]['title']; ?><br>
        Nascimento: <?php echo $page[0]['nascimento']; ?>
        <pre><code><?php echo html_escape($page[0]['body']); ?></code></pre>
    </div>
    <div class="col-md-6">
        <p>visualização:</p>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $page[0]['body']; ?>
            </div>
        </div>
    </div>
</div>

<hr>
<a href="/pages" class="btn btn-success">Voltar</a>
