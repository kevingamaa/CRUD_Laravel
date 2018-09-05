<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-3">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <li @if($current=='home') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>

      <li @if($current=='produtos') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos">Produtos</a>
      </li>

      <li @if($current=='categorias') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/categorias">Categorias</a>
      </li>

    </ul>
  </div>

</nav>

<script type="text/javascript">

</script>