@extends('layouts.main')
<base href="/public">



@section('heading')
    <h3>Laporan Page</h3>
@endsection
@section('content')
    
<section class="section">

    <div class="card">
        <div class="card-header">
            <h5>Form Laporan OUT</h5>

        </div>



        <div class="card-body">
            <form action="{{ route('filterDataOUT') }}" method="GET">
                @csrf
                
                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="tgl_awal" class="form-label"><strong>Tanggal Awal</strong></label>
                        <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
                    </div>

                    <div class="col-4 mb-3">
                        <label for="tgl_akhir" class="form-label"><strong>Tanggal Akhir</strong></label>
                        <input type="date" class="form-control" name="tgl_akhir"  id="tgl_akhir" required >
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary mt-4 h-50">Search</button>
                    </div>
        
                </div> 
            </form>

        </div>
    </div>

    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <h5>Table Laporan OUT</h5>
            <div class="p-3">
                <button class="btn btn-secondary">Export PDF</button>
                <button class="btn btn-success">Export Excel</button>
            </div>
         
        </div>
        <div class="card-body">

          
            {{-- @if(!empty($tgl_awal) && !empty($tgl_akhir))
            <h5 class="mb-4">Data periode dari tanggal : {{ $tgl_awal }} sampai dengan {{ $tgl_akhir }}</h5>
            @endif --}}

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Transaksi OUT</th>
                        <th>productCode</th>
                        <th>Product Name </th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>PIC</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                  
                    @if(!empty($productOUT))
                     @foreach ($productOUT as $row)
                    <tr>      
                       
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nomorOUT }}</td>
                        <td>{{ $row->product->productCode }}</td>
                        <td>{{ $row->product->productName }}</td>
                        <td>{{ $row->supplier->supplierName }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>samantha</td>
                        <td>{{ $row->dateOUT }}</td>
                    </tr>
                       
                    @endforeach

                    @endif
                    
                  
                   
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





@endsection