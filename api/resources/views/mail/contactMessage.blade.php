@component('mail::message')
    <h1>Olá!</h1>
    <h1>Alguém acabou de enviar uma dúvida pelo portal Apoie o Corpo.</h1>
    <h5>Nome: {{$name}}</h5>
    <h5>Email: {{$email}}</h5>
    <h5>Mensagem: {{$mensagem}}</h5>
@endcomponent