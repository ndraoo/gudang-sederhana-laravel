@extends('barangs.layout')
 
@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
         
                
            </div>
           
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        
        <tr>
            <th >No</th>
            <th >Nama Barang</th>
            <th >Jumlah Barang</th>
            <th >Harga Barang</th> 
            <th width="280px">Action</th>
        </tr>
        @foreach ($barangs as $barang)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $barang->namabrg }}</td>
            <td>{{ $barang->jmlhbrg  }}</td>
            <td> @currency($barang->hrgbrg) </td>
            <td>
                <form action="{{ route('barangs.destroy',$barang->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('barangs.edit',$barang->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="row text-center">
        {!! $barangs->links() !!}
    </div>
      
@endsection