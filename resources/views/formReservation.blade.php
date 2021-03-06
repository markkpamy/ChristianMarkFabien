@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'validerReservation', 'files' => true]) !!}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="Include/JS/jquery-ui-min.js"></script>


        <script type="text/javascript" >
            $(document).ready(function () {
                $("#date_reservation").datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            });

    </script>

    <div class="col-md-12 well well-sm">
        <center><h1>{{$titreVue or ''}}</h1></center>
        <div class="form-horizontal">
            <div class="form-group">

                <input type="hidden" name="id_oeuvre" value=" {{$oeuvre->titre or ''}} "/>
                <label class="col-md-3 control-label">Titre : </label>
                <label class="col-md-6 form-control-static">{{$oeuvre->titre or ''}}</label>

            <input type="hidden" name="id_oeuvre" value="{{$oeuvre->id_oeuvre or ''}} "/>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Date réservation : </label>
                <div class="col-md-3">
                    <input type="text" name="date_reservation" id="date_reservation" value="" class="form-control" placeholder="JJ-MM-AAAA" required />
                    <!--<input type="date" name="date_reservation" id="date_reservation" value="" class="form-control" placeholder="JJ-MM-AAAA" required/>-->
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Adhérent : </label>
                <div class="col-md-3">
                    <select class='form-control' name='cbAdherent' required>
                        <OPTION VALUE=0>Sélectionner un adhérent</option>
                        @foreach ($adherents as $adherent)
                            <option value="{{$adherent -> id_adherent}}">
                                {{$adherent->prenom_adherent}} {{$adherent->nom_adherent}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = '{{url('/')}}';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                @include('error')
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop