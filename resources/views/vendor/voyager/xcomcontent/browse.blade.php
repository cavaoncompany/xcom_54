@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->display_name_plural)

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> Xcom Contents
        </h1>
        {{-- @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan --}}
    
        @foreach(Voyager::actions() as $action)
            @if (method_exists($action, 'massAction'))
                @include('voyager::bread.partials.actions', ['action' => $action, 'data' => null])
            @endif
        @endforeach
        @include('voyager::multilingual.language-selector')
    </div>
@stop

<style>

.tab-content .card{
    padding:15px;
}
.tab-content .card-header{
    color: black;
    font-weight: bold;
    padding-bottom: 15px;
}

.tab-content .itemStyle{
    margin:20px 0;
}
.tab-content{
    margin-left:-10px;
}
.voyager{
    background-color:#f9f9f9 !important;
}
@media only screen and (min-width: 500px) {
.xcomnavs{
    padding:10px; 
    margin-left:70px !important;
}}
@media only screen and (max-width: 500px) {
    .xcomnavs{
        margin-left:0;
    }
}
.itemStyle h5{
    color:black;
}
</style>

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
          
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills xcomnavs" role="tablist" id="tabMenu">
    <li class="nav-item active">
      <a class="nav-link " data-toggle="pill" href="#home">GENERAL CONTENTS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#service">SERVICE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#about">ABOUT</a>
    </li>
  </ul>
 

                          
  <?php  
        define('info', "XCOM INFORMATION");
        define('service', "SERVICE");
        define('about', "ABOUT");
        $headerdata = array();
        $herodata = array();
        $servicetitledata = array();
        $aboutdata = array();
        $footerdata = array();
        $firstservicedata = array();
        $secondservicedata = array();
        $thirdservicedata = array();
        $forthservicedata = array();
        $emaildata = array();
        $seodata = array();
                         
     foreach($dataTypeContent as $data){
        if ($data->part =="Header"){
            array_push($headerdata, $data); 
        }
        if ($data->part =="servicetitle"){
            array_push($servicetitledata, $data); 
        }
        if ($data->part =="01"){
            array_push($firstservicedata, $data); 
        }
        if ($data->part =="02"){
            array_push($secondservicedata, $data); 
        }
        if ($data->part =="03"){
            array_push($thirdservicedata, $data); 
        }
        if ($data->part =="04"){
            array_push($forthservicedata, $data); 
        }
        if ($data->part =="about"){
            array_push($aboutdata, $data);
        }     
        if ($data->part =="HeroBanner"){
            array_push($herodata, $data);
        }
        if ($data->part =="Footer"){
            array_push($footerdata, $data);
        }   
        if ($data->part == "toemail"){
            array_push($emaildata, $data);
        }
        if ($data->part == "seo"){
            array_push($seodata, $data);
        }        
     }
   ?>   
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <div class="row">

            <div class="col-md-12 card">
                    <h4 class="col-md-12 card-header">SEO Search</h4>
                    <?php $id=array() ?>
                    @foreach ($seodata as $data)
                    <div class="col-md-6 itemStyle">
                        <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                        <p class="valueStyle"> {{$data->content}} </p>
                    </div>
                    <?php array_push($id, $data->id); ?>
                    @endforeach
                    <div class="text-left col-md-12">
                            <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
                    </div>
            </div>
        
        <div class="col-md-12 card">
            <h4 class="col-md-12 card-header">Header</h4>
            <?php $id=array() ?>
            @foreach ($headerdata as $data)
            <div class="col-md-6 itemStyle">
                <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                <p class="valueStyle"> {{$data->content}} </p> 
            </div>
            <?php array_push($id, $data->id); ?>
            @endforeach
            <div class="col-md-12 text-left">
                <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
            </div>
        </div>
        <div class="col-md-12 card">
            <h4 class="col-md-12 card-header">Hero Banner</h4>
            <?php $id=array() ?>
            @foreach ($herodata as $data)
            <div class="col-md-6 itemStyle">
                <h5 style="color:#000">{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                <p class="valueStyle"> {{$data->content}} </p>  
            </div>
            <?php array_push($id, $data->id); ?>
            @endforeach
            <div class="col-md-12 text-left">
                <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
            </div>
        </div>

        <div class="col-md-12 card">
            <h4 class="col-md-12 card-header">Footer</h4>
            <?php $id=array() ?>
            @foreach ($footerdata as $data)
            <div class="col-md-6 itemStyle">
                <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                <p class="valueStyle"> {{$data->content}} </p>
            </div>
            <?php array_push($id, $data->id); ?>
            @endforeach
            <div class="text-left col-md-12">
                    <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
            </div>
        </div>

        <div class="col-md-12 card">
            <h4 class="col-md-12 card-header">To Email</h4>
            <?php $id=array() ?>
            @foreach ($emaildata as $data)
            <div class="col-md-6 itemStyle">
                <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                <p class="valueStyle"> {{$data->content}} </p>
            </div>
            <?php array_push($id, $data->id); ?>
            @endforeach
            <div class="text-left col-md-12">
                    <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
            </div>
        </div>
        
     
      </div>
    </div>
    <div id="service" class="container tab-pane fade"><br>
        <div class="row">

           @foreach ($servicetitledata as $data)
           <div class="col-md-12 card">
                <h4 class="col-md-12 card-header">{{$data->part}}</h4>
                <?php $id=array() ?>
                <div class="col-md-6 itemStyle">
                    <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                    <p class="valueStyle"> {{$data->content}} </p>
                </div>
                <?php array_push($id, $data->id); ?>
                @endforeach
                <div class="col-md-12 text-left">
                    <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
                </div>
            </div>
            
            <div class="col-md-12 card">
                <h4 class="col-md-12 card-header">01</h4>
                <br>
                <?php $id=array() ?>
                @foreach ($firstservicedata as $data)
                <div class="col-md-6 itemStyle">
                    <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                    <p class="valueStyle" style="min-height:88px;"> {{$data->content}} </p>
                </div>
                <?php array_push($id, $data->id); ?>
                @endforeach
                <div class="col-md-12 text-left">
                    <a href="http://staging.xcomit.com.au/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
                </div>
            </div>

            <div class="col-md-12 card">
                <h4 class="col-md-12 card-header">02</h4>
                <br>
                <?php $id=array() ?>
                @foreach ($secondservicedata as $data)
                <div class="col-md-6 itemStyle">
                    <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                    <p class="valueStyle" style="min-height:88px;"> {{$data->content}} </p>
                </div>
                <?php array_push($id, $data->id); ?>
                @endforeach
                <div class="col-md-12 text-left">
                    <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
                </div>
            </div>

            <div class="col-md-12 card">
                <h4 class="col-md-12 card-header">03</h4>
                <br>
                <?php $id=array() ?>
                @foreach ($thirdservicedata as $data)
                <div class="col-md-6 itemStyle">
                    <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                    <p class="valueStyle" style="min-height:88px;"> {{$data->content}} </p>
                </div>
                <?php array_push($id, $data->id); ?>
                @endforeach
                <div class="col-md-12 text-left">
                    <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
                </div>
            </div>

            <div class="col-md-12 card">
                <h4 class="col-md-12 card-header">04</h4>
                <br>
                <?php $id=array() ?>
                @foreach ($forthservicedata as $data)
                <div class="col-md-6 itemStyle">
                    <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                    <p class="valueStyle" style="min-height:88px;"> {{$data->content}} </p>
                </div>
                <?php array_push($id, $data->id); ?>
                @endforeach
                <div class="col-md-12 text-left">
                    <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div id="about" class="container tab-pane fade">
        <div class="row">
            <div class="col-md-12 card">
                <h4 class="col-md-12 card-header">About</h4>
                <br>
                <?php $id=array() ?>
                @foreach ($aboutdata as $data)
                <div class="col-md-6 itemStyle">
                    <h5>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', $data->category)}}</h5>
                    <p class="valueStyle" style="min-height:154px;"> {{$data->content}} </p>
                </div>
                <?php array_push($id, $data->id); ?>
                @endforeach
                <div class="col-md-12 text-left">
                    <a href="http://staging.xcomit.com.au/admin/xcomcontent/{{implode("|",$id)}}/edit" class="card-link btn btn-warning" type="button" >Edit</a>
                </div>
            </div>
        </div>
    </div>
  </div>
            
    </div><!-- /.modal -->
     {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" style="margin-top:15px;" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop


@section('javascript')
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
         $(document).ready(function () {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


        var deleteFormAction;
        $('.delete').on('click', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>
@stop