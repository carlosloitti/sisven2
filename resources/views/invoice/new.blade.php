<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add factura</title>
  </head>
  <body>
    <div class="container">
        <h1>Add factura</h1>
        <form method="POST" action="{{route('invoices.store')}}">
            @csrf
            <div class="mb-3">
              <label for="id" class="form-label">Code</label>
              <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                    disabled="disabled">
              <div id="idHelp" class="form-text">Factura Code</div>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Factura numero</label>
              <input type="text" class="form-control" id="id" aria-describedby="nameHelp" name="number"
             placeholder="Factura Nombre" >             
            </div>


            <label for="customer">customer</label>
            <select class="form-select" id="customer" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ( $customers as $customer )
                    <option value="{{ $customer->id }}">{{ $customer->last_name}}</option>                    
                @endforeach

            </select>


            <div class="mb-3">
                <label for="name" class="form-label">Factura Fecha</label>
                <input type="text" class="form-control" id="id" aria-describedby="nameHelp" name="date"
               placeholder="Fecha" >             
              </div> 

              
              <label for="pay_mode">pay_mode</label>
              <select class="form-select" id="pay_mode" name="code" required>
                  <option selected disabled value="">Choose one...</option>
                  @foreach ( $pay_mode as $pay_modes )
                      <option value="{{ $pay_modes->id }}">{{ $pay_modes->name}}</option>                    
                  @endforeach
                
              </select>
 

           
            <br>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('invoices.index') }}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
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