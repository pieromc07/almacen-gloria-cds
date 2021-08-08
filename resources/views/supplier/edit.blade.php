@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('supplier.update', $supplier) }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ruc">RUC de la Empresa</label>
                            <input class="form-control" id="ruc" type="text" placeholder="RUC" name="ruc" value="{{$supplier->ruc}}">
                        </div>
                        <div class="form-group">
                            <label for="business_name">Razón Social</label>
                            <input class="form-control" id="business_name" type="text" placeholder="Razón Social"
                                name="business_name" value="{{$supplier->business_name}}">
                        </div>
                        <div class="form-group">
                            <label for="contact_name">Nombre del Contacto</label>
                            <input class="form-control" id="contact_name" type="text" placeholder="Nombre del Contacto"
                                name="contact_name" value="{{$supplier->contact_name}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email de la empresa</label>
                            <input class="form-control" id="email" type="email" placeholder="Enter email" name="email" value="{{$supplier->email}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input class="form-control" id="phone" type="text" placeholder="Telefono" name="phone" value="{{$supplier->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <textarea class="form-control" id="address" rows="3" name="address">{{$supplier->address}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6">
                        <div class="tile-footer d-flex justify-content-around">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>
                            <a class="btn btn-danger" href="#"><i class="fas fa-arrow-left"></i>Atras</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
