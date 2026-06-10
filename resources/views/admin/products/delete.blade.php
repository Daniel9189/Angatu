<!-- Modal Structure -->
   <div id="delete-{{ $product->id }}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i>Tem certeza?</h4>
      <form class="col s12">
        <div class="row">

          <p>Tem certeza que quer excluir {{ $product->nome }}</p>          

        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cadastrar</a><br>
    </div>
    
  </form>
  </div>