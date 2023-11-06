<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>product-pdf</title>
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
                <h2>All Product</h2>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                <thead>
                    <tr class="bg-primary">
                        <th>No</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Stock</th>
                       
                    </tr>
                </thead>
                <tbody>

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($data as $row)
                        
                   
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->productCode }}</td>
                        <td>{{ $row->productName }}</td>
                        <td>{{ $row->Category->categoryName }}</td>
                        <td>{{ $row->Supplier->supplierName }}</td>
                        <td>{{ $row->stock }}</td>


                        
                    </tr>

                    @endforeach
                   
                   
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>