<div class="container">
    <div class="row">
        <div class="col s12 l12">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-symbols-outlined">
                        person
                    </i>
                    Pessoa 1
                </div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-symbols-outlined">person</i> Pessoa 2</div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-symbols-outlined">person</i>Pessoa</div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
        </ul>
        </div>
    </div>
</div>


<!-- Importando jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Materializa -->                        
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- Inicialização de váriaveis -->
<script src="/assets/js/inits.js"></script>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/functions.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Inicialize o componente Collapsible
  var elems = document.querySelectorAll('.collapsible');
  var instances = M.Collapsible.init(elems, {});
});
</script>