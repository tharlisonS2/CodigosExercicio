<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade01</title>
    <style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap');
		body{
			font-family:Quicksand, sans-serif;
			font-size: 100%;
			background:white;
			color:black;
			
		}
	</style>
    <style>
    * {
        margin: 0 auto;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
    }
    #menu-h{
        background-color: rgb(37, 37, 39);
    }
    #menu-h ul {
        max-width: 800px;
        list-style: none;
        padding: 0;
    }
    #menu-h ul li {
        display: inline;
    }

    #menu-h ul li a {
        color: #FFF;
        padding: 20px;
        display: inline-block;
        text-decoration: none;
        transition: background .4s;
    }

    #menu-h ul li a:hover {
        background-color: rgb(24, 139, 233);
    }

    #menu-h ul li:last-child a {
        float: right;
        background-color: rgb(88, 88, 88);
    }
    </style>
    <style>
        .mainform{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            width: 800px;
            padding: 50px;
            border: 1px solid rgb(37, 37, 39);
            border-radius: 1em;
            margin-top:100px;
            
        }
        .mainform input{
            margin: 2px;
            margin-top: 8px;
            align-content: right;  
            border-radius: 3px;
            border: 1px solid;
            padding: 4px;
            border-color:#ccc;
        
        }
        .mainform input[name="Salvar"]{
		    margin-top: 0px;
		    padding: 0.6rem;
            padding-inline: 15px;
		    background-color:green;
		    cursor: pointer;
		    color: white;
		    font-size: 1rem;
		    font-weight: 4;
		    border-radius: 6px;
		    transition: all 0.3s ease;
	    }
        .mainform input[name="Cancelar"]{
            margin-left: 30px;
		    margin-top: 15px;
		    padding: 0.6rem;
		    background-color:red;
		    cursor: pointer;
		    color: white;
		    font-size: 1rem;
		    font-weight: 4;
		    border-radius: 6px;
		    transition: all 0.3s ease;
	    }
        .mainform a[name="Novo"]{
            text-decoration: none;
		    margin-top: 0px;
		    padding: 0.6rem;
            padding-inline: 15px;
		    background-color:rgb(24, 139, 233);
		    cursor: pointer;
		    color: white;
		    font-size: 1rem;
		    font-weight: 4;
		    border-radius: 6px;
		    transition: all 0.3s ease;
	    } 
        label{
            display: inline-block;
            width: 90px;
            text-align: right;
        }
        .tabela{
            text-align: center;
            border-color: black;
        }
        .tabelatr{
            background-color: rgb(37, 37, 39);
            font-weight: bold;
            color:white;
           
        }
        .tabela tbody tr:nth-child(2n){
            background:#ccc;
        }
        .tabela a{
            text-decoration: none;
        }
        th{
            min-width: 70px;
        }
        .excluirTabela button{
            color:white;
            background-color: tomato;
            border-radius: 2px;
            border:transparent;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <nav id="menu-h">
            <ul>
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
    
                
                <li><a href="#">Entrar</a></li>
            </ul>
        </nav>
        <form action='/cliente'method='POST' class="mainform">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$cliente->id}}"/>
            <div>
                <label>Nome:</label>
                <input type='text' name='nome' value="{{$cliente->nome}}"></input>
                <label>CPF:</label>
                <input type='text' name='cpf' value="{{$cliente->cpf}}"></input
            </div>
            <div>
                <label>Email:</label>
                <input type='text' name='email' value="{{$cliente->email}}"></input>
                <label>Telefone:</label>
                <input type='text'name ='telefone' value="{{$cliente->telefone}}"></input>
            </div>
            <div>
                <label>Data Nasc.:</label>
                <input type='date'name='data_nascimento' value="{{$cliente->data_nascimento}}"></input>
            </div>
            <div align="center">
                <input type='submit' name='Cancelar'value='Cancelar'></input>
                <input type='submit' name='Salvar'value='Salvar'></input>
                <a href="/cliente" name="Novo">Novo</a>
            </div>
        </form>
        <br><h1 align="center">Listagem</h1><br>
        <table  class="tabela">
            <thead>
                <tr class="tabelatr">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>
                        <a href="/cliente/{{$cliente->id}}/edit">Editar</a>
                    </td>
                    <td>
                        <form action="/cliente/{{$cliente->id}}" method="POST" class="excluirTabela">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>