@extends('layouts.main')
<base href="/public">



@section('heading')
    <h3>Transaksi Page</h3>
@endsection
@section('content')
    
<section class="section">

    <div class="card">
        <div class="card-header">
            <h5>Form IN</h5>


            @if(session('success'))
            <div class="alert alert-light-primary color-primary alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
            @endif
        </div>



        <div class="card-body">
            <form action="{{ route('transaksi_IN.store') }}" method="post">
                @csrf
                
                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="product_id"><strong>Product</strong></label>
                        <select name="product_id" id="product_id" class="inputBox form-control " required @error ('barang_id') is-invalid @enderror >

                            <option value=""> select product </option>
                            @foreach ($product as $item)
                                @if(('product_id') == $item->id)
                                     <option value="{{ $item->id }}"  selected> {{ $item->productName}}</option>  
                                    
                                @else
                                     <option value="{{ $item->id }}" > {{ $item->productName}}</option> 
                                
                                @endif
                                {{-- <option value="{{ $item->id }}"> {{ $item->productName }} </option> --}}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mb-3">
                        <label for="productCode"><strong>Product Code</strong></label>
                       <input class="form-control" id="productCode" readonly required>
                    </div>

                    <div class="col-4 mb-3">
                        <label for="nomorIN"><strong>Nomor transaksi IN</strong></label>
                       <input type="text" value ="{{'NTI'.date("Y"). $kd  }}" class="form-control" id="nomorIN" name="nomorIN" readonly required>
                    </div>
        
                </div>


                <div class="row">

                    <div class="col-4 mb-3">
                        <label for="quantity"><strong>Quantity</strong></label>
                       <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>

                       <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" readonly required>

                    </div>


                    <div class="col-4 mb-3">
                        <label for="stock"><strong>Product Stock</strong></label>
                       <input class="form-control" id="stock" readonly required>
                    </div>


                    <div class="col-4 mb-3 mt-4">
                        <button type="submit" class="btn btn-primary w-100 h-75 mb-3"> Save </button>
                    </div>

                </div>
            
               
            </form>

        </div>
    </div>

    <div class="card ">
        <div class="card-header">
            <h5>Table Product IN</h5>
         
        </div>
        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-light-primary color-primary alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
            @endif

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Transaksi IN</th>
                        <th>Supplier</th>
                        <th>Product </th>
                        <th>Quantity</th>
                        <th>User</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($data as $row)
                        
                   
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nomorIN }}</td>
                        <td>{{ $row->Supplier->supplierName }}</td>
                        <td>{{ $row->Product->productName }}</td>
                        <td>{{ $row->quantity}}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->dateIN}}</td>
                        
                        <td class="the-icon">
                          
                            <div class="mx-3">
                                <form action="{{ route('transaksi_IN.destroy',$row->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf
    
                                        <button type="submit" class="btn icon icon-left btn-outline-danger" onclick="return confirm('Are You Sure want to Delete This ?')">
                                            <span class="fa-fw select-all fas"></span>
                                        </button>
                                  
    
                                </form>
                            </div>

                        </td>


                        
                    </tr>

                    @endforeach
                   
                   
                </tbody>
            </table>
        </div>
    </div>





    

</section>
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="http://127.0.0.1:8000//jquery.min.js"><\/script>')
    </script>
<script src="assets/vendors/jquery/jquery.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.inputBox').select2();
  });
  </script>

<script type="text/javascript">
$(document).ready(function(){
  $('#product_id').on('change',function(){
    var product_id = $(this).val();
    $.post( '/getProduct' ,{product_id:product_id,_token:'{{csrf_token()}}'},function(res){
      var data = JSON.parse(res);

      $('#productCode').val(data.productCode);
      $('#stock').val(data.stock);
      $('#supplier_id').val(data.supplier_id);

    });
});
});
</script>



@endsection