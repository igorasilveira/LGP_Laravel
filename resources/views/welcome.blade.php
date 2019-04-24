@extends('layouts.app')

@section('content')
<div class="content">
    
    @if (auth()->user())
    
    <div class="title m-b-md">
        
        You are a
        {{-- mostra apenas se o role é de admin --}}
        @role('admin')
        <p>ADMIN</p>
        @endrole
        
        {{-- mostra apenas se o role é de editor --}}
        @role('editor')
        <p>EDITOR</p>
        @endrole
        
        {{-- mostra apenas se o role é de monitor --}}
        @role('monitor')
        <p>MONITOR</p>
        @endrole
    </div>
    
    <h3>Blade Directives</h3>
    {{-- mostra apenas se tem permissoes de create-experiences --}}
    @permission('create-experiences')
    <p>Create Experiences</p>
    @endpermission

    {{-- mostra apenas se tem permissoes de create-categories --}}
    @permission('create-categories')
    <p>Create Categories</p>
    @endpermission

    <h3>Boolean Checks</h3>
    {{-- See PagesController.php to see the can() method in use --}}
    @foreach ($permissions as $name => $value)
        <p>Can {{$name}} ? {{$value}}</p>
    @endforeach
    
    <h3>Api Test (Normal Users Only)</h3>
    <button id="button">Test API</button>
    <p id="response">Click the Button</p>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            
            function httpGetAsync(theUrl, callback)
            {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function() { 
                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                    callback(xmlHttp.responseText);
                }
                xmlHttp.open("GET", theUrl, true); // true for asynchronous 
                xmlHttp.send(null);
            }
            
            document.getElementById("button").addEventListener("click", () => {
                
                httpGetAsync("/api/user?api_token=" + Laravel.apiToken, (data) => {
                    try {
                        var parsed = JSON.stringify(JSON.parse(data), null, 2);
                        console.log(parsed);
                        document.getElementById("response").innerHTML = data;
                    }
                    catch {
                        document.getElementById("response").innerHTML = "Request Error";
                    }
                });
            })
        });
    </script>
    @else
    <h4>Log In to see stats</h4>
    @endif
</div>
@endsection