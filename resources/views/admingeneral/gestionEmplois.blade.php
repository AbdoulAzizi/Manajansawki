@extends('layouts.model', ['title'=> 'AdministrationGénerale', 'service'=>'Administration Génerale / الحراسة العامة'])

@section('content')
@section('menu')
    <div style="text-align: left; margin-left: 10px; margin-top: 40px">
        <table>
            <tr>
                <td>
                    <div style=""><img src="/images/exam.png" alt="HTML5 Icon" style="width:80px;height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </td>
                 <td>
                  <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href="/emplois">
                            <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة جدول الأوقات/Planification des emplois </h2>
                        </a>
                  </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/rapport.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>

                 <td>
                  <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href="/salles">
                            <h2 style="color:#fff; text-align:center;" class="card-title center">Gestion des Salles/إدارة الغرفة</h2>
                        </a>
                  </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/attestation.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>

                 <td>
                  <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href="/creneau">
                            <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة الفترة والجدول الزمني/Gestion des périodes et horaires</h2>
                        </a>
                  </div>
                </td>
            </tr>

        </table>



    </div>
@endsection
@endsection
