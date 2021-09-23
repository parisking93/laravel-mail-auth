<div >
    <h1>Salve, Admin</h1>
    <p>Hai ricevuto una mail da</p>
    <p>Nome : {{ $lead->name }}</p>
    <p>Email : <a href="#">{{ $lead->email }}</a></p>
    <span>il {{$lead->created_at}}</span>
    <h5 class="my-2">Messaggio</h5>
    <p>{{ $lead->message }}</p>
</div>
