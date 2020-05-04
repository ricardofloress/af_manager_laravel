<?php

use Illuminate\Support\Facades\Session;
?>
@extends('admin.admin_layout')

@section('admin_content')

<div class="row-fluid sortable">
    <div class="col-md-12" style="padding: 40px;">
        <ul class="breadcrumb">
            <li>
            <a href="{{URL::to('/add-store')}}">
                    <i style="padding: 5px;" class="icon fas fa-plus"></i>
                    Adicionar Loja
                </a>
            </li>
        </ul>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>LOJAS</h2>
        </div>
        <div class="col-md-6">
            @if(Session::has('fail'))
            <div class="alert alert-danger">
                <i style="padding: 5px;" class="icon fas fa-ban"></i>
                {{Session::get('fail')}}
            </div>
            @endif
        </div>
        <?php
        $message = Session::get('message');
        if ($message) {
        ?>
            <div class="col-md-6">
                <p class="alert alert-success" style="padding: 1rem;">
                    <i style="padding: 5px;" class="icon fas fa-check"></i>
                    <?php
                    echo $message;
                    Session::put('message', null);
                    ?>
                </p>
            </div>
        <?php
        }
        ?>
        <div class="box-content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Todos as Lojas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>NIF</th>
                                        <th>Estado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                @foreach( $all_store_info as $v_store)
                                <tbody>
                                    <tr>
                                        <td class="center">{{ $v_store->store_name }}</td>
                                        <td class="center">{{ $v_store->store_vat }}</td>
                                        <td class="center">
                                            @if($v_store->publication_status == 1)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Unactive</span>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-info" href="{{URL::to('/edit-store/'.$v_store->store_id)}}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{URL::to('/delete-store/'.$v_store->store_id)}}" id="delete">
                                                <i style=" width: 18px;" class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
</div>

<!--/row-->
@endsection