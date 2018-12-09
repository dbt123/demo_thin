@extends('backend.layouts.default')


@section('content')
<style type="text/css">
    .note-editor .note-frame{
        /*border: 1px solid #a9a9a9 !important;*/
      }
      .note-editable{
        /*border: 1px solid #a9a9a9 !important;*/
      }
      .label-info{
        background-color: #5bc0de;
      }
      .bootstrap-tagsinput {
        width: 100%;
        
      }
      .bootstrap-tagsinput input {
        min-height: 2rem;
    }
    .label {
           font-size: 96%;
        }
        input{
          background-color: #F0F0F0 !important;
          font-size: 10pt !important;
          border: 1px solid #E7E7E7 !important;
        }
        textarea{
          background-color: #F0F0F0 !important;
          font-size: 10pt !important;
          border: 1px solid #E7E7E7 !important;
        }
        select{
          font-size: 10pt !important;
        }
        .select2-results__option{
          font-size: 10pt !important;
          padding-left: 14px !important;
        }
        .select2-selection__choice{
          font-size: 10pt !important;
        }
        .select2-dropdown{
          border-radius: 0px !important;
          border-bottom: 1px solid #E7E7E7 !important;
          border-top: 1px solid #E7E7E7 !important;
          border-left: 1px solid #E7E7E7 !important;
          border-right: 1px solid #E7E7E7 !important;
        }
        .bootstrap-tagsinput{
          background-color: #F0F0F0 !important;
        }
        .select2-selection{
          background-color: #F0F0F0 !important;
          color: #D1F5F1;
          border-radius: 0px !important; 
          border: 1px solid #E7E7E7 !important;
        }
        .select2-selection__choice{
          background-color: #0CC2AA !important;
          border: 1px solid #0CC2AA !important;
          color:#D1F5F1 !important;
        }
        .select2-search__field{
          background-color: #F0F0F0 !important;
          border: none !important;
        }
        .select2-selection__choice__remove{
          color:#D1F5F1 !important;
        }
        .select2-selection__rendered{
          padding-top: 5px !important;
          padding-bottom: 5px  !important;
          padding-left: 13px !important;
          border-radius: 0px !important; 
        }
        .select2-results__option--highlighted{
          background-color: #F0F0F0 !important;
          color: #404040 !important;
        }
        .select2-selection__clear{
          color:#BFBFBF !important;
        }
        .select2-search__field::-webkit-input-placeholder {
      color: #404040;
    }
    .select2-search__field::-moz-placeholder {
      color: #404040;
    }
    .select2-search__field:-ms-input-placeholder {
      color: #404040;
    }
    .select2-search__field:-moz-placeholder {
      color: #404040;
    }
    .select2-selection__choice{
      background-color: #ffffff;
      color:#111;
    }
    label{
      font-size: 10pt;
      color: #A6A6A6;
    }
    .nav-item a{
      background-color: #F2F2F2;
      margin-right: 10px;
    }
    .box-header{
      border-bottom: 1px solid #E7E7E7;
    }
    .note-toolbar{
      background-color: #fff;
    }
    .dropdown-toggle::after{
      display: none;
    }
    .note-popover{
      display: none;
    }
    .p-a-sm{
          box-shadow: none !important;
          padding: 0px !important;
    }
    .note-toolbar{
      padding: 0px !important;
    }
.note-editable{
    padding-right: 0px !important;
    padding-left: 0px !important;
}
@media (min-width: 991px){
    .title_form{
        margin-left: 207px;
        margin-top:16px;

    }
}
.title_form{
        margin-top:16px;
        font-size: 14pt;
}
.dd-content{
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}
.dd-item > button{
    height: 41px !important; 
}
.menu_name{
     font-size: 10.5pt;
}
.cate_name{
    font-size: 10.5pt;
}
.cate_edit a{
    background-color: #E7E7E7;
    padding:4px 12px;
    border-radius: 3px;
    color:#A6A6A6;
}
.menu_edit a{
    background-color: #E7E7E7;
    padding:4px 12px;
    border-radius: 3px;
    color:#A6A6A6;
}
.nav-item a{
    font-size: 10pt;
    color:#A6A6A6;
}
.note-editable{
    font-size: 10pt;
}
label[for="file_img_preview"]{
    line-height: 1.3;
}
label[for="file_img_preview"] a{
    padding-top: 4px !important; 
    padding-bottom: 4px !important; 
    min-width: 120px;
}
.alert{
    font-size: 10pt;
}
.title_form p{
    font-family: 'Roboto Black';
}
.nav-link {
    padding-right: 3px;
}
.nav-item span{
    padding-left: 8px;
    cursor: pointer;
}
    h2{
          font-family: "Roboto-Bold";
          font-size: 10.5pt !important;
    }
      @media (min-width: 991px){
        .title_form{
            margin-left: 10px !important;
            margin-top: 16px;
        }
      }
    .number-post{
      width: 80px;
      height: 44px;
      background-color: #fff;
      border: 1px solid #E7E7E7;
      float: left;
      color: #404040;
      font-size: 10pt;
    } 
    #filter{
      float: left;
    } 
    .box-body{
      position: relative;
    }
    .drop-cate{
      position: absolute;
      left: calc(100% - 150px);
      top: 28px;
      width: 20px !important;
      height: 20px !important;
      padding: 7px !important;
      background-color: rgba(1,1,1,0) !important;
      box-shadow:none !important;
    }
    .drop-cate:hover{
      background-color: rgba(1,1,1,0) !important;
      box-shadow:none !important;
    }
    .dropdown-menu{
      left: 16px !important;
      top: 58px !important;
      width: calc(100% - 132px);
      padding-top: 0px !important;
      padding-bottom: 0px !important;
      border-top:0px !important;
      border-top-left-radius: 0px !important;
      border-top-right-radius: 0px !important;
    }
    .dropdown-item{
      padding-top: 10px !important;
      padding-bottom: 10px !important;
      font-size: 10pt !important;
    }
    .dropdown-toggle::after{
      /*display: none !important;*/
      margin-left: -1px !important;
    }
    .pagination{
      float: right;
    }
    
    th{
      font-size: 10pt !important;
      font-family: "Roboto-Bold" !important;
    }
    td{
      font-size: 10pt !important;
    }
    .action-post a{
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 4px;
        padding-bottom: 4px;

    }
    .action-post a:hover{
       background-color: #bfbfbf;
       border-radius: 2px;
    }
    .pagination > li > a {
          padding: 0.4rem 0.75rem !important;
    }
    .footable{
      margin-bottom: 0px !important;
    }
    .dropdown-toggle::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-right: .25rem;
        margin-left: .25rem;
        vertical-align: middle;
        content: "";
        border-top: .3em solid;
        border-right: .3em solid transparent;
        border-left: .3em solid transparent;
            margin-top: -20px;
    }
   </style>

<div class="app-header white box-shadow">
<div class="navbar">
    <div style="float:left;" class="title_form">
    
          <p>Form {{$formtype->name}}</p>
      
        
    </div>
</div>
</div>
 

 <div class="app-body" id="view">
    <div class="padding">
      <div class="box">
        
        <div class="box-body" style="padding:0px;">
          
      
          <div style="clear:both"></div>
        </div>
        <div class="table-responsive">
        <style type="text/css">
          .edit{
            color:orange;
          }
          .edit i{
            font-size: 15pt !important;
          }
        </style>
         
          <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="10">
            <thead>
              <tr>
                <?php $note =explode(',', $formtype->note) ?>
                  @for($i=0; $i<$formtype->count; $i++)
                  @if($i==0)
                  <th data-toggle="true">
                      {{$note[$i]}}
                  </th>
                  @else
                  <th>
                       {{$note[$i]}}
                  </th>
                   @endif
                  @endfor
                  <th>Ngày liên hệ</th>
                  @if(session('admin')->can('xoa_lien_he'))
                  <th style="padding-left:26px">Xóa</th>
                  @endif
              </tr>
            </thead>
            <tbody>
              @foreach($formtype->getform_limit(500) as $key => $value)
              <tr>
                  @for($i=1; $i<=$formtype->count; $i++)
                  <td>{{$value['text_'.$i]}}</td>
                  @endfor
                  <td>{{$value->created_at}}</td>
                  @if(session('admin')->can('xoa_lien_he'))
                  <td class="action-post">
                    <a href="#" class="del-c" data-id="{{$value->id}}">
                      Xóa
                    </a>
                  </td>
                  @endif
              </tr>
              @endforeach
            </tbody>
            <tfoot class="hide-if-no-paging">
              <tr>
                  <td colspan="12" class="text-center">
                      <ul class="pagination"></ul>
                  </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js-footer')
  <script src="{{ asset('backend/libs/jquery/screenfull/dist/screenfull.min.js') }}"></script>
  <script src="{{ asset('backend/libs/jquery/footable/dist/footable.all.min.js') }}"></script>
  <script>
   jQuery(function($){
  $('.table').footable({
    "paging": {
      "enabled": true,
      "size": 7,
    }
  });
});
  function xacnhanxoa(msg){
  
      if(window.confirm(msg)){
        return true;
      }
      else
        return false;

     };
     @if(session('admin')->can('xoa_lien_he'))
      $(document).on('click','.action-post .del-c',function(){
       
         event.preventDefault();
           if(xacnhanxoa('Bạn có chắc xóa bài viết hiện tại hay không?')===false){

           }
           else{
             id  = $(this).attr("data-id");
             console.log(id);
             $.ajax({
                 type: 'post',
                 url:  '{{ route("form.del.ajax") }}',
                 data: {'id': id},
                 dataType:'json',
                 success: function(data){
                   console.log(data);
                    if(data.status == true){
                      location.reload();
                    }
                    else{
                      alert('có lỗi xảy ra');
                    }
                 }
             })
           }
      });
      @endif
     $(document).ready(function(){
        // $('a[data-page="first"]').text('Đầu tiên');
        $('a[data-page="first"]').remove();
        $('a[data-page="prev"]').text('Trước');
        $('a[data-page="next"]').text('Tiếp');
        // $('a[data-page="last"]').text('Cuối cùng');
        $('a[data-page="last"]').remove();
     });
  </script>
@endsection