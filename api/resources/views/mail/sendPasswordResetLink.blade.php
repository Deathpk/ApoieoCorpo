@component('mail::message')
    <h1>Olá!</h1>
    <h1>Recebemos a sua solicitação de reset de senha.</h1>
    <h5>Para continuar , clique no botão abaixo , e preencha sua nova senha.</h5>
    @component('mail::button', ['url' => ''])
        Resetar Senha
    @endcomponent
@endcomponent