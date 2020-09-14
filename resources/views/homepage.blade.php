@extends('master')

@section('content')
    <h1 class="title">Contatos</h1>
        
    <div class="content container">
        <a href="/contacts/signup">
            <button class='buttons'>
                  Cadastrar
            </button>
        </a>
         <div>
            @foreach ($contacts as $contact)
            <div class='image-container'>
                <div class='img-width'>
                    <img src="/storage/{{$contact->image}}" alt="">
                </div>
                <div>
                    <p>{{$contact->name}}</p>
                </div>
                <div class='buttons-homepage'>
                    <a href="/contacts/{{$contact->id}}/edit">
                        <button class='buttons'>
                        Editar
                        </button>
                    </a>
                    <a href="/contacts/{{$contact->id}}">
                        <button class='buttons'>
                        Visualizar
                        </button>
                    </a>
                    <form action='{{ url('/contacts', ['id'=> $contact->id]) }}'  method='post'>
                        @csrf
                        <input type="hidden" name="_method" value="delete" />
                        <a href="">
                            <button class='buttons delete'>
                                <i class="fas fa-trash"></i>
                            </button>
                        </a>
                    </form>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pagination">
                <span>
                    {{$contacts->links()}}
                </span>
            </div>
    </div>


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