<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Facturas</title>
  </head> 
 

  <body>

    <h1>Listado de Facturas</h1>
 
    <a href="{{ route('invoices.create') }}" class="btn btn-success">Add</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Code</th>
            <th scope="col">numero</th> 
            <th scope="col">customer</th>             
            <th scope="col">fecha</th> 
            <th scope="col">modo de pago</th> 
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
          <tr>
                <th scope="row">{{ $invoice->id}}</th>
                <td>{{ $invoice->number}}</td>
                <td>{{ $invoice->last_name}}</td>
                <td>{{ $invoice->date}}</td>  
                <td>{{ $invoice->name}}</td>  
                
                <td>

                  <span>actions</span>

                  </td>
                   
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>