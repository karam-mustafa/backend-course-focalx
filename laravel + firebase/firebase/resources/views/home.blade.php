@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{ __('You are logged in!') }}


                    <div class="row">
                    <input class="form-control title" placeholder="title" />
                    <input class="form-control message" placeholder="message" />

                        <button class="btn btn-primary send">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        const btn = document.querySelector('.send');
        const title = document.querySelector('.title')
        const message = document.querySelector('.message')
        btn.addEventListener('click', function (e){
            axios.post("{{ route('send-notification') }}",{
                _method:"POST",
                title:title.value,
                message: message.value
            }).then(({data})=>{
                console.log(data)
            }).catch(({response:{data}})=>{
                console.error(data)
            })
        })
    </script>
@endsection
