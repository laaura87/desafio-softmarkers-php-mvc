@extends('master')

@section('content')
  <div class="container">
    <h1 class="title">Cadastrar</h1>
    <div class="content">
      <div class="img-container">
       <img src="https://api.adorable.io/avatars/200/456498465465" alt="">
      </div>

      <form method="post" action='/contacts' enctype="multipart/form-data">
        @csrf
        <div class="input-file">
          <input type="file" name='image' required>
        </div>

        <div class="label-form">
          <div>
              <label>Nome:</label>
              <input type="text" name="name"  required/>
          </div>
          <div>
              <label>Sobrenome:</label>
              <input type="text" name="surname" required />
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>Telefone:</label>
              <input type="text" name="phone" id="phone" required/>
          </div>
          <div>
              <label>E-mail:</label>
              <input type="email" name="email" required/>
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>CEP:</label>
              <input type="text" name="cep" id="cep" maxLength=9 required/>
          </div>
          <div>
              <label>Estado:</label>
              <input type="text" name="state" required/>
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>Cidade:</label>
              <input type="text" name="city" required/>
          </div>
          <div>
              <label>Rua:</label>
              <input type="text" name="street"  required/>
          </div>
        </div>

        <div class="label-form">
          <div>
              <label>Bairro:</label>
              <input type="text" name="neighborhood" required/>
          </div>
          <div>
              <label>Número:</label>
              <input type="text" name="number" required placeholder="Caso não tenha coloque 'S/N'"/>
          </div>
        </div>

        <div class="buttons-container">
          <a href="/contacts">
            <i class="fas fa-arrow-left"></i>
            <span>Voltar para o início</span>
          </a>
          <a href="">
            <button class='buttons' type='submit'>
              Cadastrar
            </button>
          </a>
        </div>
      </form>
    </div>
  </div>

  <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
  <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
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