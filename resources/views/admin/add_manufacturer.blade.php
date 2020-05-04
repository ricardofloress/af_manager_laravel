<?php

use App\tbl_manufacturer;
use App\tbl_store;
use Illuminate\Support\Facades\Session;
?>
@extends('admin.admin_layout')

@section('admin_content')

<div class="row-fluid sortable">
    <div class="col-md-12" style="padding: 40px;">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Página Inicial</a>
                <i style="margin: 0 5px;" class="fas fa-angle-right"></i>

            </li>
            <li>
                <i class="icon-edit"></i>
                <a href="#">Adicionar Marca</a>
            </li>
        </ul>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Adicionar Marca</h2>
        </div>
        <div class="box-content">
            <div class="col-md-6" style="padding-left: 0; ">
                @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <i style="padding: 5px;" class="icon fas fa-ban"></i>
                    {{Session::get('fail')}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style=" padding-left: 0;  margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                        <li style="list-style: none;">
                            <i style="padding: 5px;" class="icon fas fa-ban"></i>
                            {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <form role="form" action="{{url('/save-manufacturer')}}" method="post">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="date01">Nome da Marca</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="manufacturer_name">
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label class="control-label" for="textarea2">Descrição</label>
                        <div class="controls">
                            <textarea class="form-control" name="manufacturer_description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="selectError">Loja</label>
                        <div class="controls">
                            <select name="manufacturer_store" class="form-control" id="selectError" data-rel="chosen">
                                
                            <option value="">(Seleciona Uma Loja...)</option>
                                <?php
                                $all_published_stores = tbl_store::all();
                                foreach ($all_published_stores as $v_store) {
                                ?>
                                    <option value="{{$v_store->store_id}}">{{$v_store->store_name}}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label class="control-label" for="textarea2">Estado</label>
                        <div class="controls">
                            <input type='hidden' value='0' name='publication_status'>
                            <input type="checkbox" name="publication_status" value="1">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Adicionar Marca</button>
                        <button type="reset" class="btn"><a href="{{URL::to('/all-manufacturer')}}">Cancelar</a></button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->

@endsection