@extends('master')

@section('content')
  <div class='container'>
    <div class="content container-contact">
      <div class="left-section">
        <a href="/contacts">
          <i class="fas fa-arrow-left"></i>
          <span>Voltar para o início</span>
        </a>
        <div>
          <img src="" alt="{{$findContact->name}}">
        </div>
      </div>

      <div class="right-section">
        <div class="information">
          <div>
              <h4>Nome: </h4>
              <p>{{$findContact->name}}</p>
              <h4>Sobrenome: </h4>
              <p>{{$findContact->surname}}</p>
              <h4>Telefone: </h4>
              <p>{{$findContact->phone}}</p>
              <h4>E-mail: </h4>
              <p>{{$findContact->email}}</p>
            </div>
            <div>
              <h4>Estado: </h4>
              <p>{{$findContact->state}}</p>
              <h4>Cidade: </h4>
              <p>{{$findContact->city}}</p>
              <h4>Endereço: </h4>
              <p>{{$findContact->street}}</p>
              <h4>Número: </h4>
              <p>{{$findContact->number}}</p>
              <h4>CEP: </h4>
              <p>{{$findContact->cep}}</p>
            </div>
        </div>
        <div class="buttons-group">
          <a href="/contacts/{{$findContact->id}}/edit">
            <button class='buttons'>
              <i class="fas fa-user-edit"></i>
            </button>
          </a>
          
          <form action='{{ url('/contacts/{id}', ['id'=> $findContact->id]) }}'  method='post'>
              <input type="hidden" name="_method" value="delete" />
              @csrf
                <a href="">
                  <button class='buttons delete'>
                      <i class="fas fa-trash"></i>
                  </button>
                </a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/6b50c4bfd1.js" crossorigin="anonymous"></script>
  <script>
    const formDelete = document.querySelector("#form-delete");
    formDelete.addEventListener("submit", (event) => {
      const confirm = confirm("Confirma as alterações?");
      if (!confirm) {
      event.preventDefault();
      }
    });
  </script>
@endsection