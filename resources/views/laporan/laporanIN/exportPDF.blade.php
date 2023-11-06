<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laporan IN-pdf</title>
    <style>
        thead{
            background-color: rgb(107, 107, 207);
            color: #fff;
            height: 40px;
        }
        th{
            height: 40px;
            border-bottom : 1px solid grey;
        }

        td{
            text-align: center;
            height: 35px;
            border-bottom : 1px solid grey;

        }

        .title{
           margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">

            <div class="title">
                <h2>Laporan Transaksi IN</h2>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                <thead>
                    <tr class="bg-primary">
                        <th>No</th>
                        <th>No.Transaksi IN</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>PIC</th>
                        <th>Date</th>
                       
                    </tr>
                </thead>
                <tbody>

                    @php
                        $no = 1;
                    @endphp

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
                                        
                   
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>