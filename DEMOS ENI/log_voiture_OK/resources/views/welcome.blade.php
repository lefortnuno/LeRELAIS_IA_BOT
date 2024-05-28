@extends('layout')
@section('title', 'Accueil')

@section('content')
    <div class="content">
            <div class="starter-template">
                <div class="alert alert-primary" role="alert">BIENVENU SUR CAMERA_IA DU RELAIS !</div>
            </div>

    <section class="container">
        <div class="row">
            <div class="boite col-md-6">
            <section class="card cardAcc">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3">Visite au Relais : </h1>
                    </div>
                <img src="http://assets.locomotivehosting.com/sites/50659442bcd7ac584b000004/theme/images/img/madagascar.jpg?9d1e48eae4848f5d3f33f240f3eb0e48" alt="#" class="card-img-top rounded"/>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <th data-sortable="false">Date et Heure</th>
                        <th data-sortable="false">Sens</th>
                        <th data-sortable="false">Voiture</th>
                        <th data-sortable="false">Chauffeur</th>
                    </thead>
                </table>
                <div class="myTable_liste">
                    <table id="example" class="table table-striped table-bordered">
                        <tbody>
                            @foreach ($tsidika as $t)
                                <tr> 
                                    <td>{{ $t->dateheure->format('d/m/Y H:i') }}</td>
                                    <td>{{ $t->mouvement }}</td>
                                    <td>{{ $t->voiture->numero }}</td>
                                    <td>{{ $t->chauffeur->nom }}</td>
                                </tr>	                
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </section>

            </div>
            
            <div class="boite col-md-3">
                        <section class="card cardAcc">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3">Flotte : </h1>
                    </div>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Karenjy_Mazana01.jpg" alt="#" class="card-img-top rounded"/>

                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <td style="width: 50px;"> Matricule </td>
                                        
                                        <td class="nomTableColomne"> Chauffeur </td>
                                    </tr>
                            </thead>
                        </table>
                        <div class="myTable_liste">
                            <table class="table table-striped">
                                <tbody class="">
                                    @foreach ($floatte as $fl)
                                        <tr> 
                                            <th>{{ $fl->numero }}</th>
                                            <th>{{ $fl->chauffeur->nom }}</th>
                                        </tr>							    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        </section>
            </div>
            
            <div class="boite col-md-3">
                <section class="card cardAcc">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3">Parking : </h1>
                    </div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfDFA2hfykiMiG5eCv7tSaw1gWOZyVHi6D8YO8QkQZK2PAuSEjIVcl6akje7p1UONdNLY&usqp=CAU" alt="#" class="card-img-top rounded"/>
                    
                    <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <td style="width: 50px;"> Matricule </td>
                            <td class="nomTableColomne"> Chauffeur </td>
                            
                        </tr>
                    </thead>
                </table>

                    <div class="myTable_liste">
                        <table class="table table-striped">
                            <tbody class="">
                                @foreach ($bolide as $b)
                                    <tr> 
                                        <th>{{ $b->numero }}</th>
                                        <th>{{ $b->chauffeur->nom }}</th>
                                        
                                    </tr>							    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
@endsection
