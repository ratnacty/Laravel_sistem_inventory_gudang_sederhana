@extends('layouts.main')
<base href="/public">



@section('heading')
    <h3>Laporan Page</h3>
@endsection
@section('content')
    
<section class="section">

    <div class="card">
        <div class="card-header">
            <h5>Form Laporan IN</h5>

        </div>



        <div class="card-body">
            <form action="{{ route('filterData') }}" method="GET">
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

            @if(!empty($productIN))
            <h5>Table Laporan IN</h5>
            <div class="p-3">
                <a href="{{ route('laporanIN_PDF') }}" class="btn btn-secondary" >Download PDF</a>
                {{-- <a href="" class="btn btn-success" >Excel</a> --}}
               
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
                        <th>No.Transaksi IN</th>
                        <th>productCode</th>
                        <th>Product Name </th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>PIC</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                  
                    
         @foreach ($productIN as $row)
                    <tr>      
                       
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nomorIN }}</td>
                        <td>{{ $row->product->productCode }}</td>
                        <td>{{ $row->product->productName }}</td>
                        <td>{{ $row->supplier->supplierName }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->dateIN }}</td>
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