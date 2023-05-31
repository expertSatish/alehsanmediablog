
@extends('Admin.layout')
@section('container')

<body data-sidebar="dark" data-layout-mode="light">

          <a class="btn btn-success" style="float: right;" href="{{url('admin/artical')}}">Go To List</a>
    <!-- add artical -->                                  
    
    
      <div class="card">
       <div class="card-header">
        <h4 class="card-title p"> Add New Artical</h4>

       </div>
       <div class="card-header">
       <ul class="alert alert-warning d-none" id="save_errorList"></ul>
        <form action="{{url('admin/add_artical')}}" method="post" enctype="multipart/form-data" class="submitForm">
          @csrf
          <input type="hidden" name="id" value="{{  @$articl->id }}">
          <div class="row">
            <div class="col-lg-6">
             <div class="mb-3">
              <label for="category">Category</label>
              <input type="text" class="form-control" id="category" name="category" value="{{ @$articl->title_cat }}">
              </div>
              </div>
              
          </div>
          <div class="row">
            <div class="col-lg-6">
             <div class="mb-3">
              <label for="titleenglish">English</label>
              <input type="text" class="form-control" id="titleenglish" name="titleenglish" value="{{ @$articl->title_eng }}">
              </div>
              </div>
              <div class="col-lg-6">
              <div class="mb-3">
              <label for="titlehindi">Hindi</label>
              <input type="text" class="form-control" id="titlehindi" name="titlehindi" value="{{ @$articl->title_hin }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
             <div class="mb-3">
              <label for="titleurdu">Urdu</label>
              <input type="text" class="form-control" id="titleurdu" name="titleurdu" value="{{ @$articl->title_urd }}">
              </div>
              </div>
              <div class="col-lg-6">
              <div class="mb-3">
              <label for="titlearbic">Arbic</label>
              <input type="text" class="form-control" id="titlearbic" name="titlearbic" value="{{ @$articl->title_arb }}">
              </div>
            </div>
          </div>
            <div class="row">
            <div class="col-lg-6">
             <div class="mb-3">
              <label for="shortdescriptionenglish">ShortDescriptionEnglish</label>
              <textarea class="form-control" id="shortdescriptionenglish" name="shortdescriptionenglish" value="{{ @$articl->shortd_english }}">{{ @$articl->shortd_english }}</textarea>
              </div>
              </div>
              <div class="col-lg-6">
              <div class="mb-3">
              <label for="shortdescriptionhindi">ShortDescriptionHindi</label>
              <textarea  class="form-control" id="shortdescriptionhindi" name="shortdescriptionhindi" value="{{ @$articl->shortd_hindi }}">{{ @$articl->shortd_hindi }}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
             <div class="mb-3">
              <label for="shortdescriptionurdu">ShortDescriptionUrdu</label>
              <textarea class="form-control" id="shortdescriptionurdu" name="shortdescriptionurdu">{{ @$articl->shortd_urdu }}</textarea>
              </div>
              </div>
              <div class="col-lg-6">
              <div class="mb-3">
              <label for="shortdescriptionarbic">ShortDescriptionArbic</label>
              <textarea class="form-control" id="shortdescriptionarbic" name="shortdescriptionarbic">{{ @$articl->shortd_arbic }}</textarea>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
              <label for="descriptionhindi">DescriptionEnglish</label>
              <input type="text" class="form-control" id="descriptionhindi" name="descriptionhindi" value="{{ @$articl->d_english }}">
              </div>
            </div>
              <div class="col-lg-6">
              <div class="mb-3">
              <label for="descriptionenglish">DescriptionHindi</label>
              <input type="text" class="form-control" id="descriptionenglish" name="descriptionenglish" value="{{ @$articl->d_hindi }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
             <div class="mb-3">
              <label for="descriptionurdu">DescriptionUrdu</label>
              <input type="text" class="form-control" id="descriptionurdu" name="descriptionurdu"value="{{ @$articl->d_urdu }}">
              </div>
              </div>
              <div class="col-lg-6">
              <div class="mb-3">
              <label for="descriptionarbic">DescriptionArbic</label>
              <input type="text" class="form-control" id="descriptionarbic" name="descriptionarbic" value="{{ @$articl->d_arbic }}">
              </div>
            </div>
          </div>
        
                <div class="row">
                <div class="col-lg-6">                                          
                 <label for="image" class="col-form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                  
                  @if(!empty($articl->image))
                    <img src="{{ asset('uploads/banner/'.$articl->image) }}" width="50" height="50">
                  @endif
                </div>
              </div>
              <br>
                
                <button type="submit" class="btn btn-success beforeSubmit">Submit</button>
               
                </div>
                </form>
                </div>
            </div>
        </div> 
    
     <!--end add artical -->  


     @endsection       