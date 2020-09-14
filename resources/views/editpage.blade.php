@extends('master')

@section('content')

  <div class="container">
    <h1 class="title">Editar Contato</h1>
    <div class="content">
      <div class="img-container">
       <img src="/images/{{$contact->image}}" alt="">
      </div>

      <form method="post"  enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="input-file">
          <input type="file" name="image" accept="image/*" required>
        </div>

        <div class="label-form">
          <div>
              <label>Nome:</label>
              <input type="text" name="name" value="{{$contact->name}}" required/>
          </div>
          <div>
              <label>Sobrenome:</label>
              <input type="text" name="surname" value="{{$contact->surname}}" required/>
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>Telefone:</label>
              <input type="text" name="phone" value="{{$contact->phone}}" id='phone'required/>
          </div>
          <div>
              <label>E-mail:</label>
              <input type="email" name="email" value="{{$contact->email}}" required/>
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>CEP:</label>
              <input type="text" name="cep" value="{{$contact->cep}}" maxLength=9 required/>
          </div>
          <div>
              <label>Estado:</label>
              <input type="text" name="state" value="{{$contact->state}}" required/>
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>Cidade:</label>
              <input type="text" name="city" value="{{$contact->city}}" required/>
          </div>
          <div>
              <label>Rua:</label>
              <input type="text" name="street" value="{{$contact->street}}" required/>
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>Bairro:</label>
              <input type="text" name="neighborhood" value="{{$contact->neighborhood}}" required/>
          </div>
          <div>
              <label>Número:</label>
              <input type="text" name="number" value="{{$contact->number}}" required placeholder="Caso não tenha coloque 'S/N'"/>
          </div>
        </div>

        <div class="buttons-container">
          <a href="/contacts">
            <i class="fas fa-arrow-left"></i>
            <span>Voltar para o início</span>
          </a>
          <a href="">
            <button class='buttons' type='submit'>
              Editar
            </button>
          </a>
        </div>
      </form>
    </div>
  </div>

  <script src="{{ URL::asset('scripts/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/cep-promise/dist/cep-promise.min.js"></script>
  <script src="https://kit.fontawesome.com/6b50c4bfd1.js" crossorigin="anonymous"></script>

  <script>
    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };
    $("#phone").mask(SPMaskBehavior, spOptions);
    $("#cep").mask("00000-000");
    $("#cep").keyup(event => {
      if(event.target.value.length == 9) {
        cep(event.target.value).then(data => {
          $('[name=street]').val(data.street);
          $('[name=neighborhood]').val(data.neighborhood);
          $('[name=state]').val(data.state);
          $('[name=city]').val(data.city);
        }).catch(()=> {});
      }
    });
    
  </script>
@endsection