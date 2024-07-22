@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">PDF Manage</h6>
                </div>
                
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          
            <div style="padding:0 40px; border: 2px solid #000">
               <form action="{{route('postPdfDocument', 'directory')}}" method="POST" enctype="multipart/form-data">
                @csrf()
                District Directory {{env('lion_year')}} | <a href="">View Current File</a>
                <input type="file" class="form-control" name="directory">
                <input type="submit" class="form-control btn btn-primary" value="Replace District Directory">
               </form>
            </div>
            <br />
            <div style="padding:0 40px; border: 2px solid #000">
                <form action="{{route('postPdfDocument', 'bloodbank')}}" method="POST" enctype="multipart/form-data">
                    @csrf()
                 Blood Bank Contribution List | <a href="">View Current File</a>
                 <input type="file" class="form-control" name="bloodbank">
                 <input type="submit" class="form-control btn btn-primary" value="Upload Latest Blood Bank Contribution List">
                </form>
             </div>
             <div style="padding:0 40px; border: 2px solid #000">
                <form action="{{route('postPdfDocument', 'padhauabhiyan')}}" method="POST" enctype="multipart/form-data">
                    @csrf()
                 Padhau Abhiyan List | <a href="">View Current File</a>
                 <input type="file" class="form-control" name="padhauabhiyan">
                 <input type="submit" class="form-control btn btn-primary" value="Upload Latest Padhau Abhiyan List">
                </form>
             </div>
         
        </div>
      </div>
    </div>
  </div>
  
@stop